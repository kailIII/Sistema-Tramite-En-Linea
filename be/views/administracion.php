<?php 
	echo Stel\Backend\FrontController::embebController("menu.php"); 
?>
<div id="abm-container">
	<h3 class="azul">Seleccione la seccion a la que desea ingresar</h3>
	<hr>
	<ul id="tipos-tramite">
		<li><a href="./direcciones"><h6>ABM Direcciones</h6></a></li>
		<li><a href="./instancias"><h6>ABM Instancias</h6></a></li>
		<li><a href="./permisos"><h6>ABM Permisos</h6></a></li>
		<li><a href="./tareas"><h6>ABM Tareas</h6></a></li>
		<li><a href="./tiposTarea"><h6>ABM Tipos de Tarea</h6></a></li>
		<li><a href="./usuarios"><h6>ABM Usuarios</h6></a></li>		
		<li><a href="./tipoTramiteInstancia"><h6>Instancias por Tipo de Tramite</h6></a></li>
		<li><a href="./tipoTramiteInstanciaTarea"><h6>Tareas por Instancia</h6></a></li>
	</ul>
</div>