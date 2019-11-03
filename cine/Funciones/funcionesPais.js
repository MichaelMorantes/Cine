var dt;

function pais(){  
    $("#contenido").on("click","button.btncerrar",function(){
        $("#contenido").html('')
        $("#titulo").removeClass("show");
        $("#titulo").addClass("hide");
        $("#abrir").collapse("hide");
    })

    $("#contenido").on("click","button#nuevo",function(){
        $('.country').val('');
        $("#modalnuevo" ).modal('show'); 
        //console.log("nuevo")
    })

    $("#contenido").on("click","button#btnnuevo",function(){
      var datos=$("#nuevopais").serialize();
    //   console.log(datos);
       $.ajax({
            type:"get",
            url:"./Controlador/controlador_pais.php",
            data: datos,
            dataType:"json"
          }).done(function( resultado ) {
            //   console.log(datos);
              if(resultado.respuesta){
                $('#nuevopais')[0].reset();
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
       $.ajax({
           type:"get",
           url:"./Controlador/controlador_pais.php",
           data: {codigo: codigo, accion:'consultar'},
           dataType:"json"
        }).done(function(pais) {
            // console.log(ciudad);
                if(pais.respuesta === "no existe"){
                    alertify.error("El país no existe");  
                } else {
                    $(".country_id").val(pais.codigo);                   
                    $(".country").val(pais.pais);   
                }
            });
        $('#modaleditar').modal('show');   
    })

    $("#contenido").on("click","button#btnactualizar",function(){
        var datos=$("#editarpais").serialize();
        // console.log(datos);
        $.ajax({
           type:"get",
           url:"./Controlador/controlador_pais.php",
           data: datos,
           dataType:"json"
         }).done(function( resultado ) {
             if(resultado.respuesta){
               alertify.success("El país ha sido actualizado!");  
               dt.ajax.reload();
               $("#titulo").html("Listado de países");
            } else {
               alertify.error("Error al actualizar");  
           }
       });
   })

   $("#contenido").on("click","a.borrar",function(){
    //Recupera datos del formulario
    var codigo = $(this).data("codigo");
    alertify.confirm('Eliminar país', '¿Seguro que quieres eliminar este país?',function(){
                var request = $.ajax({
                method: "get",
                url: "./Controlador/controlador_pais.php",
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
    $("#titulo").html("Listado de Países");
    dt = $("#tabla").DataTable({
        "ajax": "Controlador/controlador_pais.php?accion=listar",
        "columns": [
            { "data": "country_id"},
            { "data": "country" },
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
            { "data": "country_id",
                render: function (data) {
                        return '<a href="#" data-codigo="'+ data + 
                                '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
                }
            },
            { "data": "country_id",
                render: function (data) {
                        return '<a href="#" data-codigo="'+ data + 
                                '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';           
                }
            }
        ]
  });
  pais();
});