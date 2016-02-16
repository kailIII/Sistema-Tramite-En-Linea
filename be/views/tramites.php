<?php 
	echo Stel\BackEnd\FrontController::embebController("menu.php"); 
?>
<div id="form-container">
	<h3 class="azul">Seleccione el tipo de tramite que desea ingresar</h3>
	<hr>
	<ul id="tipos-tramite">
		<li><a href="solfa"><h6>Franquicia automotor particular</h6></a></li>
		<li><a href="solfainst"><h6>Franquicia automotor institucional</h6></a></li>
		<li><a href="libredisp"><h6>Libre disponibilidad</h6></a></li>
		<li><a href="simbolos"><h6>Símbolos</h6></a></li>
	</ul>
</div>