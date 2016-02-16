<?php 
	echo Stel\FrontEnd\FrontController::embebController("menu.php"); 
?>
<div id="form_container">
	<h3 class="azul">Bienvenido al Sistema de Tramites on-line del SNR</h3>
	<hr>
	<?php
		if(isset($viewParams["error"])){
			echo "<p class=\"error\">".$viewParams["error"]."</p>";
		}
	?>
	<div class="inner">
		<p>Complete sus datos para ingresar, si no los tiene haga click en Registrame, en el menu superior derecho</p>
		<form>
			<p class="clearfix">
				<input type="text" name="username" id="username">
				<label for="username">Usuario:</label>
			</p>
			<p class="clearfix">
				<input type="password" name="password" id="password">
				<label for="password">Clave:</label>
			</p>
			<p class="clearfix"><input type="button" name="submit" value="Entrar" class="bbuscar"></p>
		</form>
	</div>
</div>