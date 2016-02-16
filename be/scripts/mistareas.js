$(document).ready(function(){
	//deshabilito el select de tramites hasta que de seleccione una instancia
	$("#tramites").attr("disabled","disabled");
	
	//cargo select de tipos de tramite
	cargarTiposTramite();

	//cargo select de instancias de tramite
	cargarInstancias()

	//agrego el evento change
	$("#tiposTramite").change(onChangeTipoTramites);
	
	
	$("#filtrob").click(onClickFiltro);

	//agrego el evento change del select de instancias
	$("#instancias").change(onChangeInstancias);

	//agrego el evento change del select de tramites
	$("#tramites").change(onChangeTramites);

	//cargo select de tareas adicionales
	cargarTareasAdicionales();

	//click Finalizar instancia
	$("#finalizarInstancia").click(onFinalizarInstancia);

	//seleccion de una tarea adicional
	$("#tareaAdicional").change(onAgregarTarea);

	//deshabilito el select de tareas adicionales
	deshabilitarPanel();

	//cargo la grilla
	loadGrid();
});

function onClickFiltro(){

	emptyGrid();
    loadGrid();
}


function cargarTiposTramite(){
	var url = $("#tiposTramite").attr("data-url");
	$.ajax({
		url: url,
		method: 'get',
		dataType: 'json',
		success: function(response){
			loadSelect($("#tiposTramite"), response.content, false);
		}
	});
}
function cargarInstancias(){
	var url = $("#instancias").attr("data-url");
	var data = { forSelect: 1 };
	if($("#tiposTramite").val()){
		data.tipoTramite = $("#tiposTramite").val();
		
		$.ajax({
			url: url,
			method: 'get',
			data: data,
			dataType: 'json',
			success: function(response){
				loadSelect($("#instancias"), response.content, false);
				$("#instancias").attr("disabled",false);
			}
		});
	}
}
function cargarTareasAdicionales(){
	var url = $("#tareaAdicional").attr("data-url");
	var data = { forSelect: 1, tipo: 2 };
	$.ajax({
		url: url,
		method: 'get',
		data: data,
		dataType: 'json',
		success: function(response){
			loadSelect($("#tareaAdicional"), response.content, false);
		}
	});
}
function limpiarInstancias(){
	$("#instancias option").each(function(){
		if($(this).val() != 0){ $(this).remove(); }
	});
	$("#instancias").attr("disabled","disabled");
}
function cargarTramites(){
	var url = $("#tramites").attr("data-url");
	var data = { forSelect: 1 };
	if($("#tiposTramite").val()){
		data.tipoTramite = $("#tiposTramite").val();
	}
	if($("#instancias").val()){
		data.instancia = $("#instancias").val();
	}
	$.ajax({
		url: url,
		method: 'get',
		data: data,
		dataType: 'json',
		success: function(response){
			loadSelect($("#tramites"), response.content, false);
			$("#tramites").attr("disabled",false);
		}
	});
}
function limpiarTramites(){
	$("#tramites option").each(function(){
		if($(this).val() != 0){ $(this).remove(); }
	});
	$("#tramites").attr("disabled","disabled");
	deshabilitarPanel();
}
function deshabilitarPanel(){
	$("#tareaAdicional").attr("disabled","disabled");
	$("#finalizarInstancia").attr("disabled","disabled");
}
function habilitarPanel(){
	$("#tareaAdicional").attr("disabled",false);
	$("#finalizarInstancia").attr("disabled",false);
}
function loadSelect(select, data, emptyFirst){
	if(emptyFirst){
		select.html("");
		select.val("");
	}
	if(data!=""){ //ME
		data.forEach(function(element){
			select.append(
				$("<option>")
					.val(element.value)
					.text(element.text)
			);
		});
	}
}
function error(mensaje){
//	alert(mensaje);
}
function itemTemplate(tarea){
console.log(tarea);
	var item = $("<li>").addClass("tareas-item");
	var ul = $("<ul>").addClass("columns").addClass("clearfix");
	var cols = [];

	//columna para el numero de tramite
	var colStr = '';
	if(tarea.idTipoTramite == 1 || tarea.idTipoTramite == 2)
		colStr = '<a href="./sintesisGlobal?idTramite='+tarea.idTramite+'">' + tarea.idTramite + "</a>";
	else
		colStr = tarea.idTramite;
		

	var col = 	$("<li>")
				.addClass("left")
				.addClass("col-s")
				.append(colStr);
	cols.push(col);

	//columna para el tipo de tramite
	colStr = tarea.codigoTipoTramite;
	cols.push($("<li>")
					.addClass("left")
					.addClass("col-s")
					.text(colStr).
					attr("title",tarea.nombreTipoTramite)
				);
	//columna para la instancia
	colStr = tarea.nombreInstancia.substring(0,50);
	cols.push($("<li>")
					.addClass("left")
					.addClass("col-m")
					.text(colStr).
					attr("title",tarea.nombreInstancia)
				);
	//columna para la tarea
	colStr = tarea.nombreTarea.substring(0,50);
	cols.push($("<li>")
					.addClass("left")
					.addClass("col-m2")
					.text(colStr).
					attr("title",tarea.nombreTarea)
				);
	//columna para el solicitante
	colStr = tarea.nombreSolicitante.substring(0,50);
	//if(tarea.codigoTipoTramite=="FAI"){colStr="Institucion";}
	cols.push($("<li>")
					.addClass("left")
					.addClass("col-m")
					.text(colStr).
					attr("title",tarea.nombreSolicitante)
				);		

	//columna para el documento
	colStr = tarea.documento;
	cols.push($("<li>")
					.addClass("left")
					.addClass("col-m")
					.text(colStr).
					attr("title",tarea.documento)
				);		

	//columna para el estado
	colStr = tarea.nombreEstado.substring(0,50);
	cols.push($("<li>")
					.addClass("left")
					.addClass("col-m")
					.text(colStr).
					attr("title",tarea.nombreEstado)
				);

	//columna para los botones
	colStr = tarea.nombreEstado.substring(0,50);
	botonera = $("<li>").addClass("right").addClass("col-l").attr("title",tarea.nombreEstado);

	//boton para abrir tarea
	var editarButton = $("<input>").addClass("btn").attr("type", "button").val("Abrir").attr("data-id",tarea.id).css("margin-right","10px");
	botonera.append(editarButton);
	if(tarea.editable){
		editarButton.click(onClickEditarTarea);
	}else{ editarButton.attr("disabled","disabled"); }
	//boton para finalizar la tarea
	var finalizarButton = $("<input>").addClass("btn").attr("type", "button").val("Finalizar").attr("data-id",tarea.id);
	botonera.append(finalizarButton);
	if(tarea.editable){
		finalizarButton.click(onClickFinalizarTarea);
	}else{ finalizarButton.attr("disabled","disabled"); }
	
	cols.push(botonera);

	//ensamblo la fila
	cols.forEach(function (element){
		ul.append(element);
	});
	item.append(ul);

	return item;
}
function loadGrid(){
	var tipoTramite = $("#tiposTramite").val();
	var instancia = $("#instancias").val();
	var tramite = $("#tramites").val();
	var filtro = $("#filtro").val();

	data = {};
	if(tipoTramite){ data.tipo = tipoTramite; }
	if(instancia){ data.instancia = instancia; }
	if(tramite){ data.tramite = tramite; }
	if(filtro){ data.filtro = filtro; }

	$.ajax({
		url: "./json_getTareasForMisTareas",
		data: data,
		dataType: "json",
		success: function(response){
			if(response.status == "OK"){
				if(response.content){
					response.content.forEach(function(element){
						$("#mis-tareas .tareas-list").append(itemTemplate(element));
					});	
				}				
			}else{
				error(response.message);
			}
		}
	});
	//$("#mis-tareas .tareas-list").append(itemTemplate());
}
function emptyGrid(){
	$("#mis-tareas .tareas-list li.tareas-item").remove();
}
function onClickEditarTarea(event){
	var id = $(this).attr("data-id");

	var w =	window.open("./abrirTarea?idTarea="+id, "Carga Observacion");
    $(w).unload(function(){
        emptyGrid();
        loadGrid();
    });
}
function onClickFinalizarTarea(event){
	var id = $(this).attr("data-id");
	
	$.ajax({
		url: "./json_abmTramiteInstanciaTarea?action=end",
		method: "post",
		data: { 'object': JSON.stringify({id:id}) },
		dataType: "json",
		success: function(response){
			if(response.status == "OK"){
				emptyGrid();
				loadGrid();
			}else{
				alert(response.status);
			}
		}
	});
}
function onChangeTipoTramites(event){
	var val = $(this).val();

	//limpio el listado de instancias
	limpiarInstancias();
	//limpio el listado de tramites
	limpiarTramites();

	if(val != 0){
		//cargo instancias para el tipo de tramite seleccionado
		cargarInstancias();
	}
	//recargo la grilla
	emptyGrid();
	loadGrid();
}
function onChangeInstancias(event){
	var val = $(this).val();

	limpiarTramites();
	if(val != 0){
		//cargo tramite para la instancia seleccionada
		cargarTramites();
	}
	//recargo la grilla
	emptyGrid();
	loadGrid();
}
function onChangeTramites(event){
	var val = $(this).val();

	if(val != 0){
		//habilito el panel de acciones para el tramite
		habilitarPanel();
	}else{
		//deshabilito el panel de acciones para el tramite
		deshabilitarPanel();
	}
	//recargo la grilla
	emptyGrid();
	loadGrid();	
}
function onFinalizarInstancia(event){
	var idTramite = $("#tramites").val();

	if(idTramite != 0){
		$.ajax({
			url: "./json_abmTramiteInstancia?action=end",
			data: { 'object': JSON.stringify({ idTramite: idTramite }) },
			dataType: 'json',
			method:'post',
			success:function(response){
				if(response.status == "OK"){
					var tramite = response.content;
					if(tramite){
						$("#instancias").val(tramite.idInstanciaActual);
						emptyGrid();
						loadGrid();
					}else{
						error("No se devolvio el tramite.");	
					}
				}else{
					error(response.message);
				}
			}
		});
	}
}
function onAgregarTarea(event){
	var idTramite = $("#tramites").val();
	var idTarea = $("#tareaAdicional").val();

	if(idTramite != 0){
		$.ajax({
			url: "./json_abmTramiteInstanciaTarea?action=new",
			data: { 'object': JSON.stringify({ idTramite: idTramite, idTarea: idTarea }) },
			dataType: 'json',
			method:'post',
			success:function(response){
				if(response.status == "OK"){
					var tramite = response.content;
					if(tramite){
						emptyGrid();
						loadGrid();
					}else{
						error("No se devolvio el tramite.");	
					}
				}else{
					error(response.message);
				}
			}
		});
	}
}