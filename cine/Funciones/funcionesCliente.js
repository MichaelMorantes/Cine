var dt;

function cliente(){  
    $("#contenido").on("click","button.btncerrar",function(){
        $("#contenido").html('')
        $("#titulo").removeClass("show");
        $("#titulo").addClass("hide");
        $("#abrir").collapse("hide");
    })

    $("#contenido").on("click","button#nuevo",function(){
        $('.customer_id').val();
        $.ajax({
            type:"get",
            url:"./Controlador/controlador_cliente.php",
            data: {accion:'listadireccion'},
            dataType:"json"
            }).done(function(resultado) { 
                $(".address_id option").remove();
                $(".address_id").append("<option value disabled selected=''>Seleccione prestamo</option>")
                //console.log("nuevo")
                $.each(resultado.data, function (index, value) { 
                    //console.log(value.pais_codi);
                $(".address_id").append("<option value='" + value.address_id + "'>" + value.address + "</option>")
            });
        });
        $.ajax({
            type:"get",
            url:"./Controlador/controlador_cliente.php",
            data: {accion:'listatienda'},
            dataType:"json"
            }).done(function(resultado) { 
                $(".store_id option").remove();
                $(".store_id").append("<option value disabled selected=''>Seleccione tienda</option>")
                //console.log("nuevo")
                $.each(resultado.data, function (index, value) { 
                    //console.log(value.pais_codi);
                $(".store_id").append("<option value='" + value.store_id + "'>" + value.store_id + "</option>")
            });
        });
        $('.datetimepicker-input').val('');
        // $('.f_return_nuevo').datetimepicker('maxDate', null);
        // $('.f_rental_nuevo').datetimepicker('minDate', null);
        $('.f_crea_nuevo').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
        });
        $("#modalnuevo" ).modal('show'); 
    })

    $("#contenido").on("click","button#btnnuevo",function(){
      var datos=$("#nuevoform").serialize();
    //   console.log(datos);
       $.ajax({
            type:"get",
            url:"./Controlador/controlador_cliente.php",
            data: datos,
            dataType:"json"
          }).done(function( resultado ) {
            //   console.log(datos);
              if(resultado.respuesta){
                $('#nuevoform')[0].reset();
                $('.datetimepicker-input').val('');
                dt.ajax.reload();
                alertify.success('El cliente se grabó correctamente');
             } else {
                alertify.error("Error al grabar");  
            }
        });
    });

    $("#contenido").on("click","a.editar",function(){
       //Recupera datos del fromulario
       var codigo = $(this).data("codigo");
       var tienda; 
       var direccion; 
       $.ajax({
           type:"get",
           url:"./Controlador/controlador_cliente.php",
           data: {codigo: codigo, accion:'consultar'},
           dataType:"json"
        }).done(function(cliente) {
            // console.log(pago);
                if(cliente.respuesta === "no existe"){
                    alertify.error("El cliente no existe");  
                } else {
                    $(".customer_id").val(cliente.codigo);   
                    $(".first_name").val(cliente.nombre);   
                    $(".last_name").val(cliente.apellido);   
                    $(".email").val(cliente.email);   
                    direccion = cliente.direccion;   
                    tienda = cliente.tienda;
                }
            });
           $.ajax({
             type:"get",
             url:"./Controlador/controlador_cliente.php",
             data: {accion:'listadireccion'},
             dataType:"json"
            }).done(function( resultado ) {    
            // console.log(resultado.data);       
              $(".staff_id option").remove();
              $.each(resultado.data, function (index, value) { 
                if(direccion === value.staff_id){
                  $(".address_id").append("<option selected value='" + value.address_id + "'>" + value.address + "</option>")
                }else {
                  $(".address_id").append("<option value='" + value.address_id + "'>" + value.address + "</option>")
                }
            });
        }); 
            $.ajax({
                type:"get",
                url:"./Controlador/controlador_cliente.php",
                data: {accion:'listatienda'},
                dataType:"json"
            }).done(function( resultado ) {    
            // console.log(resultado.data);       
                $(".store_id option").remove();
                $.each(resultado.data, function (index, value) { 
                if(tienda === value.store_id){
                    $(".store_id").append("<option selected value='" + value.store_id + "'>" + value.store_id + "</option>")
                }else {
                    $(".store_id").append("<option value='" + value.store_id + "'>" + value.store_id + "</option>")
                }
            });
        }); 
        $('.datetimepicker-input').val('');
        // $('.f_return_editar').datetimepicker('minDate', null);
        // $('.f_rental_editar').datetimepicker('maxDate', null);
        $('.f_crea_editar').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
        $('#modaleditar').modal('show');   
    })

    $("#contenido").on("click","button#btnactualizar",function(){
        var datos=$("#editarform").serialize();
        // console.log(datos);
        $.ajax({
           type:"get",
           url:"./Controlador/controlador_cliente.php",
           data: datos,
           dataType:"json"
         }).done(function( resultado ) {
             if(resultado.respuesta){
               alertify.success("El cliente ha sido actualizado!");  
               dt.ajax.reload();
               $("#titulo").html("Listado de clientes");
            } else {
               alertify.error("Error al actualizar");  
           }
       });
   })

   $("#contenido").on("click","a.borrar",function(){
    //Recupera datos del formulario
    var codigo = $(this).data("codigo");
    alertify.confirm('Eliminar cliente', '¿Seguro que quieres eliminar este cliente?',function(){
                var request = $.ajax({
                method: "get",
                url: "./Controlador/controlador_cliente.php",
                data: {codigo: codigo, accion:'borrar'},
                dataType: "json"
            })
            request.done(function( resultado ) {
                // console.log(resultado);
                if(resultado.respuesta == 'correcto'){
                    alertify.success("Eliminado con exito!");   
                    dt.ajax.reload();                            
                } else {
                    alertify.error("Error al eliminar",console.log(textStatus)); 
                }
            });
            request.fail(function( jqXHR, textStatus ) {
                alertify.error("Error al eliminar",console.log(textStatus));  
            });
        }
        , function(){
    });
});
}

$(document).ready(() => { 
    $("#contenido").off("click", "a.editar"); 
    $("#contenido").off("click", "button#btnactualizar");
    $("#contenido").off("click","a.borrar");
    $("#contenido").off("click","button#nuevo");
    $("#contenido").off("click","button#btnnuevo");
    $("#titulo").html("Listado de clientes");
    dt = $("#tabla").DataTable({
        "ajax": "Controlador/controlador_cliente.php?accion=listar",
        "columns": [
            { "data": "customer_id"},
            { "data": "store_id" },
            { "data": "cliente" },
            { "data": "email" },
            { "data": "address" },
            { "data": "create_date" },
            { "data": "last_update" },
            // { "data": "estado",
            //     render: function (data){
            //             if (data==1) {
            //                 return "Eliminado"
            //             } else {
            //                 return "Disponible"
            //             }
            //     }
            // },
            { "data": "customer_id",
                render: function (data) {
                        return '<a href="#" data-codigo="'+ data + 
                                '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
                }
            },
            { "data": "customer_id",
                render: function (data) {
                        return '<a href="#" data-codigo="'+ data + 
                                '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';           
                }
            }
        ]
  });
  cliente();
});