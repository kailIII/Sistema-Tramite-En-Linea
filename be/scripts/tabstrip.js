$(document).ready(function(){
	var i = 0;
	$("#tabstrip .tab-content div").each(function(){
		if(i != 0){
			$(this).hide();
		}
		$(this).attr("data-index", i);
		i = i+1;
	});
	i=0;
	$("#tabstrip ul.tabs li").each(function(){
		$(this).attr("data-index", i);
		if(i == 0){
			$(this).addClass("selected");
		}
		$(this).click(function(){
			var index = $(this).attr("data-index");
			//quito el selected
			$("#tabstrip ul.tabs li").each(function(){
				$(this).removeClass("selected");
			});
			//agrego el selected a este item
			$(this).addClass("selected");

			//oculto los paneles y muestro el correcpondiente
			$("#tabstrip .tab-content div").each(function(){
				$(this).hide();
				if(index == $(this).attr("data-index")){
					$(this).show();
				}
			});		
		});
		i = i+1;
	});
});