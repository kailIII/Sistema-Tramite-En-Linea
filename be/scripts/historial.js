$(document).ready(function (){

	$("#buscar").unbind("click").click(function() {

		if ($("#nrodoc").val() != "")
		{
			findPersona();
		}
		
	});
});

function findPersona()
{    		
	var parametros = {
        "tipoDoc" : getRadioVal(),
        "nro" : $("#nrodoc").val()
	};	

	$.ajax({
        data:  parametros,
        url:   './json_getHistorial',
        type:  'post',
        dataType: "json",
        success:  function (response) {
    	 	if(response.status == "OK"){
    	 		emptyGridStel();
				if(response.content.stel){
					response.content.stel.forEach(function(element){
						$("#stel").append(itemTemplateStel(element));
					});	
				}

				emptyGridLegacy();
				if(response.content.legacy){
					response.content.legacy.forEach(function(element){
						$("#legacy").append(itemTemplateLegacy(element));
					});	
				}			
			}else{
				error(response.message);
			}
        }
	});
}

function emptyGridStel(){
	$("#stel.tareas-list li.tareas-item").remove();
}

function emptyGridLegacy(){
	$("#legacy.tareas-list li.tareas-item").remove();
}

function getRadioVal() {
    var val;

    var radios = $( "input[id^='doc']");
    
    for (var i=0, len=radios.length; i<len; i++) {
        if ( radios[i].checked ) { 
            val = radios[i].value; 
            break; 
        }
    }
    return val;
}

function itemTemplateStel(row){
	console.log(row);
	var item = $("<li>").addClass("tareas-item");
	var ul = $("<ul>").addClass("columns").addClass("clearfix");
	var cols = [];

	colStr = row.apellido + ', ' + row.nombre;
	cols.push($("<li>")
		.addClass("left")
		.addClass("col-m2")
		.text(colStr).
		attr("title",row.apellido + ', ' + row.nombre)
	);

	colStr = row.fecha;
	cols.push($("<li>")
		.addClass("left")
		.addClass("col-m")
		.text(colStr).
		attr("title",row.fecha)
	);

	colStr = row.tipotramite;
	cols.push($("<li>")
		.addClass("left")
		.addClass("col-m")
		.text(colStr).
		attr("title",row.tipotramite)
	);

	colStr = row.instancia;
	cols.push($("<li>")
		.addClass("left")
		.addClass("col-m")
		.text(colStr).
		attr("title",row.instancia)
	);

	colStr = row.tarea;
	cols.push($("<li>")
		.addClass("left")
		.addClass("col-m2")
		.text(colStr).
		attr("title",row.tarea)
	);

	colStr = row.usuario;
	cols.push($("<li>")
		.addClass("left")
		.addClass("col-m")
		.text(colStr).
		attr("title",row.usuario)
	);

	colStr = row.observacion;
	cols.push($("<li>")
		.addClass("left")
		.addClass("col-l")
		.text(colStr).
		attr("title",row.observacion)
	);

	//ensamblo la fila
	cols.forEach(function (element){
		ul.append(element);
	});
	item.append(ul);

	return item;
}

function itemTemplateLegacy(row){
	console.log(row);
	var item = $("<li>").addClass("tareas-item");
	var ul = $("<ul>").addClass("columns").addClass("clearfix");
	var cols = [];

	colStr = row.apellido + ', ' + row.nombre;
	cols.push($("<li>")
		.addClass("left")
		.addClass("col-m2")
		.text(colStr).
		attr("title",row.apellido + ', ' + row.nombre)
	);

	colStr = row.fecha;
	cols.push($("<li>")
		.addClass("left")
		.addClass("col-m")
		.text(colStr).
		attr("title",row.fecha)
	);

	colStr = row.destino;
	cols.push($("<li>")
		.addClass("left")
		.addClass("col-m2")
		.text(colStr).
		attr("title",row.destino)
	);

	colStr = row.usuario;
	cols.push($("<li>")
		.addClass("left")
		.addClass("col-m")
		.text(colStr).
		attr("title",row.usuario)
	);

	colStr = row.observacion;
	cols.push($("<li>")
		.addClass("left")
		.addClass("col-xl2")
		.text(colStr).
		attr("title",row.observacion)
	);

	//ensamblo la fila
	cols.forEach(function (element){
		ul.append(element);
	});
	item.append(ul);

	return item;
}