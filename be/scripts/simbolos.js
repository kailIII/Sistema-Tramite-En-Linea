var entities = [];
var urls = [];
$(document).ready(function(){



	$('input[type="submit"]').click(function(e){
	
    	if($("#duplicado").val() == "duplicado")
    	{
    		e.preventDefault();
    		alert("Ya existen Simbolos para el documento ingresado.");
    		return;
    	}

		if ($('input[type="text"]').val().length == 0 ){
			e.preventDefault();
			alert("Revisar Campos");
		}
	
		if ($("#op1").not(':checked').length > 0 || $("#op2").not(':checked').length > 0 || $("#op3").not(':checked').length > 0 || $("#op4").not(':checked').length > 0 ){
			e.preventDefault();
			alert("Revisar CheckList");
		}

	});

})