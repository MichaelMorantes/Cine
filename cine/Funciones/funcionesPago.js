var dt;

function pago(){  
    $("#contenido").on("click","button.btncerrar",function(){
        $("#contenido").html('')
        $("#titulo").removeClass("show");
        $("#titulo").addClass("hide");
        $("#abrir").collapse("hide");
    })

    $("#contenido").on("click","button#nuevo",function(){
        $.ajax({
            type:"get",
            url:"./Controlador/controlador_pago.php",
            data: {accion:'listacliente'},
            dataType:"json"
            }).done(function(resultado) { 
                $('.payment_id').val();
                $(".customer_id option").remove();
                $(".customer_id").append("<option value disabled selected=''>Seleccione cliente</option>")
                //console.log("nuevo")
                $.each(resultado.data, function (index, value) { 
                    //console.log(value.pais_codi);
                $(".customer_id").append("<option value='" + value.customer_id + "'>" + value.nombre + "</option>")
                
            });
        })
        $.ajax({
            type:"get",
            url:"./Controlador/controlador_pago.php",
            data: {accion:'listaempleado'},
            dataType:"json"
            }).done(function(resultado) { 
                $(".staff_id option").remove();
                $(".staff_id").append("<option value disabled selected=''>Seleccione un empleado</option>")
                //console.log("nuevo")
                $.each(resultado.data, function (index, value) { 
                    //console.log(value.pais_codi);
                $(".staff_id").append("<option value='" + value.staff_id + "'>" + value.nombre + "</option>")
            });
        });
        $.ajax({
            type:"get",
            url:"./Controlador/controlador_pago.php",
            data: {accion:'listarental'},
            dataType:"json"
            }).done(function(resultado) { 
                $(".rental_id option").remove();
                $(".rental_id").append("<option value disabled selected=''>Seleccione prestamo</option>")
                //console.log("nuevo")
                $.each(resultado.data, function (index, value) { 
                    //console.log(value.pais_codi);
                $(".rental_id").append("<option value='" + value.rental_id + "'>" + value.rental_id + "</option>")
            });
        });
        $('.datetimepicker-input').val('');
        // $('.f_return_nuevo').datetimepicker('maxDate', null);
        // $('.f_rental_nuevo').datetimepicker('minDate', null);
        $('.f_pago_nuevo').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
        });
        $("#modalnuevo" ).modal('show'); 
    })

    $("#contenido").on("click","button#btnnuevo",function(){
      var datos=$("#nuevoform").serialize();
    //   console.log(datos);
       $.ajax({
            type:"get",
            url:"./Controlador/controlador_pago.php",
            data: datos,
            dataType:"json"
          }).done(function( resultado ) {
            //   console.log(datos);
              if(resultado.respuesta){
                $('#nuevoform')[0].reset();
                $('.datetimepicker-input').val('');
                dt.ajax.reload();
                alertify.success('El pago se grabó correctamente');
             } else {
                alertify.error("Error al grabar");  
            }
        });
    });

    $("#contenido").on("click","a.editar",function(){
       //Recupera datos del fromulario
       var codigo = $(this).data("codigo");
       var cliente; 
       var empleado; 
       var prestamo;
       $.ajax({
           type:"get",
           url:"./Controlador/controlador_pago.php",
           data: {codigo: codigo, accion:'consultar'},
           dataType:"json"
        }).done(function(pago) {
            // console.log(pago);
                if(pago.respuesta === "no existe"){
                    alertify.error("El pago no existe");  
                } else {
                    $(".payment_id").val(pago.codigo);   
                    empleado = pago.empleado;   
                    cliente = pago.cliente;
                    prestamo=pago.prestamo;
                }
            });

           $.ajax({
             type:"get",
             url:"./Controlador/controlador_pago.php",
             data: {accion:'listaempleado'},
             dataType:"json"
            }).done(function( resultado ) {    
            // console.log(resultado.data);       
              $(".staff_id option").remove();
              $.each(resultado.data, function (index, value) { 
                if(empleado === value.staff_id){
                  $(".staff_id").append("<option selected value='" + value.staff_id + "'>" + value.nombre + "</option>")
                }else {
                  $(".staff_id").append("<option value='" + value.staff_id + "'>" + value.nombre + "</option>")
                }
            });
        }); 
            $.ajax({
                type:"get",
                url:"./Controlador/controlador_pago.php",
                data: {accion:'listacliente'},
                dataType:"json"
            }).done(function( resultado ) {    
            // console.log(resultado.data);       
                $(".store_id option").remove();
                $.each(resultado.data, function (index, value) { 
                if(cliente === value.customer_id){
                    $(".customer_id").append("<option selected value='" + value.customer_id + "'>" + value.nombre + "</option>")
                }else {
                    $(".customer_id").append("<option value='" + value.customer_id + "'>" + value.nombre + "</option>")
                }
            });
        }); 
            $.ajax({
                type:"get",
                url:"./Controlador/controlador_pago.php",
                data: {accion:'listarental'},
                dataType:"json"
            }).done(function( resultado ) {    
            // console.log(resultado.data);       
                $(".rental_id option").remove();
                $.each(resultado.data, function (index, value) { 
                if(prestamo === value.rental_id){
                    $(".rental_id").append("<option selected value='" + value.rental_id + "'>" + value.rental_id + "</option>")
                }else {
                    $(".rental_id").append("<option value='" + value.rental_id + "'>" + value.rental_id + "</option>")
                }
            });
        }); 
        $('.datetimepicker-input').val('');
        // $('.f_return_editar').datetimepicker('minDate', null);
        // $('.f_rental_editar').datetimepicker('maxDate', null);
        $('.f_pago_editar').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
        $('#modaleditar').modal('show');   
    })

    $("#contenido").on("click","button#btnactualizar",function(){
        var datos=$("#editarform").serialize();
        // console.log(datos);
        $.ajax({
           type:"get",
           url:"./Controlador/controlador_pago.php",
           data: datos,
           dataType:"json"
         }).done(function( resultado ) {
             if(resultado.respuesta){
               alertify.success("El pago ha sido actualizado!");  
               dt.ajax.reload();
               $("#titulo").html("Listado de pagos");
            } else {
               alertify.error("Error al actualizar");  
           }
       });
   })

   $("#contenido").on("click","a.borrar",function(){
    //Recupera datos del formulario
    var codigo = $(this).data("codigo");
    alertify.confirm('Eliminar pago', '¿Seguro que quieres eliminar este pago?',function(){
                var request = $.ajax({
                method: "get",
                url: "./Controlador/controlador_pago.php",
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
    $("#titulo").html("Listado de pago");
    dt = $("#tabla").DataTable({
        "ajax": "Controlador/controlador_pago.php?accion=listar",
        "columns": [
            { "data": "payment_id"},
            { "data": "cliente" },
            { "data": "empleado" },
            { "data": "rental_id" },
            { "data": "amount" },
            { "data": "payment_date" },
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
            { "data": "payment_id",
                render: function (data) {
                        return '<a href="#" data-codigo="'+ data + 
                                '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
                }
            },
            { "data": "payment_id",
                render: function (data) {
                        return '<a href="#" data-codigo="'+ data + 
                                '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';           
                }
            }
        ]
  });
  pago();
});