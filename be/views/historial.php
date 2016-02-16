<?php
	echo Stel\BackEnd\FrontController::embebController("menu.php"); 
?>
<script src="scripts/historial.js"></script>
<div id="formularios" style="width:100%">

	<div id="contentform">

		<h3 class="azul">Historial</h3>
		<hr />
		<form method="post" action="">
			<div class="space">DNI <input type="radio" id="doc1" name="doc" value="1" checked=checked /> LE 
				<input type="radio" id="doc2" name="doc" value="2" /> LC <input type="radio" id="doc3" name="doc" value="3" style="margin-right:40px;"/> 
				Nro: <input name="nrodoc" id="nrodoc" type="text" />
				<button class="btn" id="buscar" type="button">Buscar</button>
			</div>


			<div id="mis-tareas" style="width:100%">
				<h4>Stel</h4>
				<ul id="stel" class="tareas-list">
					<li class="tareas-head">
						<ul class="columns clearfix">
							<li class="left col-m2"><span>Nombre</span></li>
							<li class="left col-m"><span>Fecha</span></li>
							<li class="left col-m"><span>Tipo Tramite</span></li>
							<li class="left col-m"><span>Instancia</span></li>
							<li class="left col-m2"><span>Tarea</span></li>
							<li class="left col-m"><span>Usuario</span></li>
							<li class="left col-l"><span>Observaciones</span></li>
						</ul>
					</li>
				</ul>

				<h4>Legacy</h4>
				<ul id="legacy" class="tareas-list">
					<li class="tareas-head">
						<ul class="columns clearfix">
							<li class="left col-m2"><span>Nombre</span></li>
							<li class="left col-m"><span>Fecha</span></li>
							<li class="left col-m2"><span>Destino</span></li>
							<li class="left col-m"><span>Usuario</span></li>
							<li class="left col-xl2"><span>Observaciones</span></li>
						</ul>
					</li>
				</ul>
			</div>
		</form>

	</div>
</div>