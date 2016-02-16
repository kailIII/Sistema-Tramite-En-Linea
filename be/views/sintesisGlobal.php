<?php 
	echo Stel\BackEnd\FrontController::embebController("menu.php"); 
?>
<script src="scripts/tabstrip.js"></script>
<div id="abm-container">
	<h3 class="azul">Tramite <?php echo $viewParams["tramite"]->getNumero(); ?></h3>
	<hr>
	<?php 
		if(isset($viewParams["persona"])){
	?>
		<div class="clearfix"><a href="./solfacompleta?idTramite=<?php echo $_GET['idTramite']; ?>" 
			style="margin-bottom:10px;" class="btn left">Editar</a></div>
	<?php
		}else{
	?>
		<div class="clearfix"><a href="./solfainstcompleta?idTramite=<?php echo $_GET['idTramite']; ?>" 
			style="margin-bottom:10px;" class="btn left">Editar</a></div>
	<?php
		}
	?>
	<div id="tabstrip">
		<ul class="clearfix tabs" style="margin-bottom:0px;">
			<li>Solicitante</li>
			<li>Tareas</li>
		</ul>
		<div class="clearfix tab-content">
			<div class="tab">
				<?php 
					if(isset($viewParams["persona"])){
				?>
					<p><span style="color:black;font-weight:bold;">Tipo:</span> Particular</p>
					<p><span style="color:black;font-weight:bold;">Nombre y Apellido:</span> <?php echo $viewParams["persona"]->getNombre() . " " . $viewParams["persona"]->getApellido(); ?></p>
					<p><span style="color:black;font-weight:bold;">Documento:</span> <?php echo $viewParams["persona"]->getNroDoc(); ?></p>
				<?php
					}else{
				?>
					<p><span style="color:black;font-weight:bold;">Tipo:</span> Institución</p>
					<p><span style="color:black;font-weight:bold;">Denominacion Social:</span> <?php echo $viewParams["institucion"]->getDenominacionSocial(); ?></p>
					<p><span style="color:black;font-weight:bold;">CUIT:</span> <?php echo $viewParams["institucion"]->getCuit(); ?></p>
				<?php
					}
				?>
			</div>
			<div class="tab">
				<ul class="abm-list">
					<li class="abm-head">
						<ul class="columns clearfix">
							<li class="left col-l"><span>Instancia</span></li>
							<li class="left col-l2"><span>Tarea</span></li>
							<li class="left col-m"><span>Estado</span></li>
							<li class="left col-m"><span>Usuario</span></li>
							<li class="left col-m"><span>Finalizacion</span></li>
						</ul>
					</li>
				<?php
					foreach ($viewParams["tareas"] as $tarea) {
				?>
					<li class="abm-item">
						<ul class="columns clearfix">
							<li class="left col-l"><?php echo $tarea->nombreInstancia; ?></li>
							<li class="left col-l2"><?php echo $tarea->nombreTarea; ?></li>
							<li class="left col-m"><?php echo $tarea->nombreEstado; ?></li>
							<li class="left col-m"><?php echo ($tarea->nombreUsuario)?$tarea->nombreUsuario:"No asignado"; ?></li>
							<li class="left col-m"><?php echo ($tarea->finalizacion)?substr($tarea->finalizacion,0,10):"En proceso"; ?></li>
						</ul>
					</li>
				<?php
					}
				?>
				</ul>
			</div>
		</div>
	</div>
</div>