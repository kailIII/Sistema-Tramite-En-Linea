<?php 
	echo Stel\BackEnd\FrontController::embebController("menu.php"); 
?>
<script src="scripts/mistareas.js"></script>
<div id="mis-tareas">
	<h3 class="azul">Mis Tareas</h3>
	<hr>
	<div class="control-panel">
		<div class="filter-container clearfix">
			<select id="tramites" class="filter" data-url="./json_getTramites">
				<option value="0">--Seleccione un tramite</option>
			</select>
			<select id="instancias" class="filter" data-url="./json_getInstancias">
				<option value="0">--Seleccione una instancia</option>
			</select>
			<select id="tiposTramite" class="filter" data-url="./json_getTiposTramite">
				<option value="0">--Seleccione un tipo</option>
			</select>			
		</div>
		<div class="filter-container clearfix">
			<div id="tramiteButtons">
				<a class="btn right" id="finalizarInstancia">Finalizar instancia</a>
				<select class="right readonly" id="tareaAdicional" style="width:312px" data-url="./json_getTareas" disabled="disabled">
					<option value="0">+ Tarea adicional</option>
				</select>
			</div>
			<div class="tramiteButtons-inner right" style="margin-left: 10px;margin-right: 25px;">
				<span style="color:#666">Filtro:</span> 
				<input type="text" size="40" id="filtro" name="filtro" data-url="./json_getDataFiltro" style="width: 150px;"/> 
				<button id="filtrob" name="filtrob" class="btn">Buscar</button>
			</div>
		</div>
	</div>
	<ul class="tareas-list">
		<li class="tareas-head">
			<ul class="columns clearfix">
				<li class="left col-s"><span>Tramite</span></li>
				<li class="left col-s"><span>Tipo</span></li>
				<li class="left col-m"><span>Intancia</span></li>
				<li class="left col-m2"><span>Tarea</span></li>
				<li class="left col-m"><span>Solicitante</span></li>
				<li class="left col-m"><span>Documento</span></li>
				<li class="left col-m"><span>Estado</span></li>
				<li class="right col-l"><span>Acciones</span></li>
			</ul>
		</li>
	</ul>
</div>