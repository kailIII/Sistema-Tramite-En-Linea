$(document).ready(function(){
	$("#enviar").click(function(){
		var idTramiteInstanciaTarea = $("#idTramiteInstanciaTarea").val();
		var idObservacion = $("#observacion").attr("data-id");
		var observacion = $("#observacion").val();

		model = { observacion:observacion, idTramiteInstanciaTarea:idTramiteInstanciaTarea };
		url = "./json_abmObservacion";
		if(idObservacion){
			model.idObservacion = idObservacion;
			url += "?action=edit";
		}else{
			url += "?action=new";
		}
		$.ajax({
			url: url,
			method: "post",
			dataType: "json",
			data: { 'object': JSON.stringify(model) },
			success: function(result){
				if(result.status == "ERROR"){
					alert(result.message);
				}else{
					window.close();
				}
			}
		});
	});
});