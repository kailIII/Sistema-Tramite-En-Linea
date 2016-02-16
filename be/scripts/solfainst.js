var entities = [];
var urls = [];
$(document).ready(function(){



	$('input[type="submit"]').click(function(e){
	
    	if($("#duplicado").val() == "duplicado")
    	{
    		e.preventDefault();
    		alert("Ya existe una Franquicia Automotor para el cuit ingresado.");
    		return;
    	}

		if ($('input[type="text"]').val().length == 0 ){
			e.preventDefault();
			alert("Revisar Campos");
		}
	
		if ($('input[type="checkbox"]').not(':checked').length > 0){
			e.preventDefault();
			alert("Revisar CheckList");
		}
	});

})