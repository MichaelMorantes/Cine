var dt;

function inventario(){  
    $("#contenido").on("click","button.btncerrar",function(){
        $("#contenido").html('')
        $("#titulo").removeClass("show");
        $("#titulo").addClass("hide");
        $("#abrir").collapse("hide");
    })

    $("#contenido").on("click","button#nuevo",function(){
        $.ajax({
            type:"get",
            url:"./Controlador/controlador_inventario.php",
            data: {accion:'listartienda'},
            dataType:"json"
            }).done(function(resultado) { 
                $('.inventory_id').val();
                $(".store_id option").remove();
                $(".store_id").append("<option value disabled selected=''>Seleccione una tienda</option>")
                //console.log("nuevo")
                $.each(resultado.data, function (index, value) { 
                    //console.log(value.pais_codi);
                $(".store_id").append("<option value='" + value.store_id + "'>" + value.store_id + "</option>")
                
            });
        })
        $.ajax({
            type:"get",
            url:"./Controlador/controlador_inventario.php",
            data: {accion:'listarpelicula'},
            dataType:"json"
            }).done(function(resultado) { 
                $(".film_id option").remove();
                $(".film_id").append("<option value disabled selected=''>Seleccione una pelicula</option>")
                //console.log("nuevo")
                $.each(resultado.data, function (index, value) { 
                    //console.log(value.pais_codi);
                $(".film_id").append("<option value='" + value.film_id + "'>" + value.title + "</option>")
                $("#modalnuevo" ).modal('show'); 
            });
        });
    })

    $("#contenido").on("click","button#btnnuevo",function(){
      var datos=$("#nuevoinventario").serialize();
    //   console.log(datos);
       $.ajax({
            type:"get",
            url:"./Controlador/controlador_inventario.php",
            data: datos,
            dataType:"json"
          }).done(function( resultado ) {
            //   console.log(datos);
              if(resultado.respuesta){
                $('#nuevoinventario')[0].reset();
                dt.ajax.reload();
                alertify.success('El registro se grabó correctamente');
             } else {
                alertify.error("Error al grabar");  
            }
        });
    });

    $("#contenido").on("click","a.editar",function(){
       //Recupera datos del fromulario
       var codigo = $(this).data("codigo");
       var tienda; 
       var pelicula; 
       $.ajax({
           type:"get",
           url:"./Controlador/controlador_inventario.php",
           data: {codigo: codigo, accion:'consultar'},
           dataType:"json"
        }).done(function(registro) {
            // console.log(registro);
                if(registro.respuesta === "no existe"){
                    alertify.error("El registro no existe");  
                } else {
                    $(".inventory_id").val(registro.codigo);   
                    pelicula = registro.pelicula;   
                    tienda = registro.tienda;
                }
            });

           $.ajax({
             type:"get",
             url:"./Controlador/controlador_inventario.php",
             data: {accion:'listarpelicula'},
             dataType:"json"
           }).done(function( resultado ) {    
            // console.log(resultado.data);       
              $(".film_id option").remove();
              $.each(resultado.data, function (index, value) { 
                if(pelicula === value.film_id){
                  $(".film_id").append("<option selected value='" + value.film_id + "'>" + value.title + "</option>")
                }else {
                  $(".film_id").append("<option value='" + value.film_id + "'>" + value.title + "</option>")
                }
            });
        }); 
            $.ajax({
                type:"get",
                url:"./Controlador/controlador_inventario.php",
                data: {accion:'listartienda'},
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
        $('#modaleditar').modal('show');   
    })

    $("#contenido").on("click","button#btnactualizar",function(){
        var datos=$("#editarinventario").serialize();
        // console.log(datos);
        $.ajax({
           type:"get",
           url:"./Controlador/controlador_inventario.php",
           data: datos,
           dataType:"json"
         }).done(function( resultado ) {
             if(resultado.respuesta){
               alertify.success("El registro ha sido actualizado!");  
               dt.ajax.reload();
               $("#titulo").html("Inventario");
            } else {
               alertify.error("Error al actualizar");  
           }
       });
   })

   $("#contenido").on("click","a.borrar",function(){
    //Recupera datos del formulario
    var codigo = $(this).data("codigo");
    alertify.confirm('Eliminar registro', '¿Seguro que quieres eliminar este registro?',function(){
                var request = $.ajax({
                method: "get",
                url: "./Controlador/controlador_inventario.php",
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
    $("#titulo").html("Inventario");
    dt = $("#tabla").DataTable({
        "ajax": "Controlador/controlador_inventario.php?accion=listar",
        "columns": [
            { "data": "inventory_id"},
            { "data": "title" },
            { "data": "store_id" },
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
            { "data": "inventory_id",
                render: function (data) {
                        return '<a href="#" data-codigo="'+ data + 
                                '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
                }
            },
            { "data": "inventory_id",
                render: function (data) {
                        return '<a href="#" data-codigo="'+ data + 
                                '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';           
                }
            }
        ]
  });
  inventario();
});