var entities = [];
var urls = [];
$(document).ready(function(){
	$(".hidden").hide();
	loadTriggers();
});
function loadTriggers(parent){
	var $parent = $(parent);
	if(!parent){ $parent = $(document); }

	$parent.find(".-toggle-trigger").click(function(){
		var $subject = $($(this).attr("data-toggle"));

		$subject.slideToggle();
	});
	$parent.find(".-autoload").each(function(){
		var select = $(this);
		var url = $(this).attr("data-url");

		//algunas urls se usan varias veces asi que guardo los resultados para no llamarlas muchas veces
		if(urlExists(url)){
			var content = getUrlContent(url);
			if(content){
				loadSelect(select, content);
			}
		}else{
			$.ajax({
				url: url,
				method: "post",
				dataType: "json",
				async: false,
				success: function(data){
					if(data.status == "OK"){
						//recuerdo el resultado de esta url para poder utilizarla despues
						urls.push({'url':url, 'content':data.content});
						if(data.content){
							loadSelect(select, data.content);
						}
					}else{
						alert("Error al cargar la lista.");
					}
				}
			});
		}
	});
	//pongo la descripcion de las entidades en donde solo tengo sus id utilizando una url
	//OJO el contenido tiene que tener una estructura igual a la que se usa para cargar los select value=>text
	$parent.find(".-entity").each(function(){
		var li = $(this);
		var idEntity = $(this).text();
		var url = $(this).attr("data-url");

		//algunas urls se usan varias veces asi que guardo los resultados para no llamarlas muchas veces
		if(urlExists(url)){
			var content = getUrlContent(url);
			if(content){
				loadListItem(li,idEntity, content);
			}
		}else{
			$.ajax({
				url: url,
				method: "post",
				dataType: "json",
				async: false,   //los quiero sincronicos para que el validador de urls funcione
				success: function(data){
					if(data.status == "OK"){
						//recuerdo el resultado de esta url para poder utilizarla despues
						urls.push({'url':url, 'content':data.content});
						if(data.content){
							loadListItem(li,idEntity, data.content);
						}
					}else{
						alert("Error al cargar la lista.");
					}
				}
			});
		}
	});

	$parent.find(".-edit-object").click(function(){
		var objectId = $(this).attr("data-value");
		var object;
		entities.forEach(function(element){
			if(element.id == objectId){
				object = element.fields;
			}
		});
		var form = $($(this).attr("data-form"));
		var editUrl = $(this).attr("data-url");
		loadForm(form, object, editUrl);
		form.attr("data-callback","editEntity");
	});
	$parent.find(".-new-object").click(function(){
		var form = $($(this).attr("data-form"));
		cleanForm(form);
		var editUrl = $(this).attr("data-url");
		$(form).attr("data-url",editUrl);
		cleanForm(form);
		form.attr("data-callback","newEntity");
		form.slideDown();
	});
	$parent.find(".-delete-object").click(function(){
		var deleteUrl = $(this).attr("data-url");
		var value = $(this).attr("data-value");

		var entity;
		entities.forEach(function (element){
			if(element.id == value){ entity = element.fields; }
		});
		$.ajax({
			url : deleteUrl,
			method: 'post',
			data: { 'object': JSON.stringify(entity) },
			dataType: 'json',
			success: function(result){
				if(result.status == "ERROR"){
					sendMessage(result.message);
				}else{
					actionCallback("deleteEntity", value);
				}
			}
		});
	});
	$parent.find(".-action").click(function(){
		var actionUrl = $(this).attr("data-url");
		var callback = $(this).attr("data-callback");
		
		$.ajax({
			url : actionUrl,
			method: 'get',
			dataType: 'json',
			success: function(result){
				if(result.status == "ERROR"){
					sendMessage(result.message);
				}else{
					actionCallback(callback, result.content);
				}
			}
		});
	});
	$parent.find(".-action-sender").click(function(){
		var form = $($(this).attr("data-form"));
		var editUrl = form.attr("data-url");
		var model = createModel(form);

		$.ajax({
			url : editUrl,
			method: 'post',
			data: { 'object': JSON.stringify(model) },
			dataType: 'json',
			success: function(result){
				if(result.status == "ERROR"){
					sendMessage(result.message);
				}else{
					var callback = form.attr("data-callback");
					actionCallback(callback, result.content);
				}
			}
		});
	});
}
function urlExists(url){
	var exists = false;
	urls.forEach(function(element){
		if(element.url == url){ exists = true; }
	});
	return exists;
}
function getUrlContent(url){
	var content = null;
	urls.forEach(function(element){
		if(element.url == url){ content = element.content; }
	});
	return content;
}
function loadListItem(li, id, elements){
	elements.forEach(function(element){
		if(element.value == id){
			li.text(element.text);
		}
	});
}
function loadSelect(select, content){
	select.html("");
	select.val("");

	content.forEach(function(element){
		select.append(
			$("<option>")
				.val(element.value)
				.text(element.text)
		);
	});
}
function loadForm(form, object, url){
	$(form).find("input[type=text],input[type=number],input[type=password],input[type=hidden],input[type=checkbox], select, textarea").each(function(){
		if($(this).attr("id") in object){
			loadField($(this),object[$(this).attr("id")]);
		}
	});
	$(form).slideDown();
	$(form).attr("data-url",url);
}
function loadField(field, value){
	if(field.is("input")){
		field.val(value);
		if(field.attr("type") == "checkbox"){
			if(value){ field.attr("checked", true); }
			else{ field.attr("checked", false); }
		}
	}
	if(field.is("select")){
		field.val(value);
	}
	if(field.is("textaera")){
		field.text(value);
	}
}
function cleanForm(form){
	$(form).find("input[type=text],input[type=checkbox],input[type=number],input[type=password],input[type=hidden], select, textarea").each(function(){
			loadField($(this),"");
	});
}
function createModel(form){
	var model = {};
	$(form).find("input[type=text],input[type=checkbox],input[type=number],input[type=password],input[type=hidden], select, textarea").each(function(){
		var fieldName = $(this).attr("id");
		var fieldValue = $(this).val();
		if($(this).attr("type") == 'checkbox'){
			if($(this).is("checked")){ fieldValue = true; }
			else{ fieldValue = false; }
		}
		
		model[fieldName] = fieldValue;
	});
	return model;
}
function sendMessage(text){
	alert(text);
}
function actionCallback(callback, data){
	var fn = null;

	fn = window[callback];
	if (typeof fn === "function"){ fn(data); }
	else { sendMessage("Callback no encontrado"); }
}
function newEntity(object){
	var template = $("#itemTemplate").clone();

	//si hay una funcion propia del script la llamo
	if(typeof window["onLoadingTemplate"] === "function"){
		var onLoadingTemplate = window["onLoadingTemplate"];
		template = onLoadingTemplate(template, object);
	}

	var idField = createItemFormTemplate(template, object);

	entities.push({id: idField, fields:object});
	var newItem = $("<li>").addClass("abm-item").attr("id",object[idField]).append(template.html());

	$(".abm-list .abm-head").after(newItem);
	//cargo los triggers del nuevo objeto
	loadTriggers(newItem);
}
function editEntity(object){
	var template = $("#itemTemplate").clone();

	//si hay una funcion propia del script la llamo
	if(typeof window["onLoadingTemplate"] === "function"){
		var onLoadingTemplate = window["onLoadingTemplate"];
		template = onLoadingTemplate(template, object);
	}
	var idField = createItemFormTemplate(template, object);
	var entity = {id: idField, fields:object};
	var index = 0;

	//ahora quito el item viejo de la tabla
	$(".abm-list .abm-item#"+object[idField]).remove();

	//quito la entidad anterior
	entities.forEach(function(element){
		if(element.id == entity.id){
			return
		}
		index++;
	});
	entities.splice(index,1);
	//agrego la entidad nueva
	entities.push(entity);

	//agrego el nuevo elemento despues del header
	var newItem = $("<li>").addClass("abm-item").attr("id",object[idField]).append(template.html());
	$(".abm-list .abm-head").after(newItem);
	//cargo los triggers del nuevo objeto
	loadTriggers(newItem);
}
function deleteEntity(id){ removeRow(id); }
function removeRow(id){
	$(".abm-list .abm-item#"+id).remove();
}
function createItemFormTemplate(template, object){
	//cargo los li con los campos
	$(template).find("li").each(function(){
		var field = $(this).attr("data-field");
		if(field){
			$(this).html(object[field]);
		}
	});
	var idField;
	$(template).find(".-edit-object").each(function(){
		idField = $(this).attr("data-value");
		$(this).attr("data-value",object[idField]);
	});
	$(template).find(".-delete-object").each(function(){
		idField = $(this).attr("data-value");
		$(this).attr("data-value",object[idField]);
	});
	//esto es medio feo... devuelvo el nombre del campo id
	return idField;
}