function Inicio(){
	$("#opciones a").click(function(e){
     	e.preventDefault();
        var url = $(this).attr("href");
        $.post( url,function(resultado) {
				if(url!="#")
					$("#abrir").collapse("show");
					$("#contenido").html(resultado);	
        });
	});
}

