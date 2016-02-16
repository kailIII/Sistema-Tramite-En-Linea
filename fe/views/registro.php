<?php 
	echo Stel\Frontend\FrontController::embebController("menu.php"); 
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
		<p>Complete sus datos para registrarse, se le enviara un mail para verificacion de cuenta.</p>
		<form>
			<p class="clearfix">
				<input type="text" name="nombre" id="nombre">
				<label for="nombre">Nombre/s:</label>
			</p>
			<p class="clearfix">
				<input type="text" name="apellido" id="apellido">
				<label for="apellido">Apellido/s:</label>
			</p>
			<p class="clearfix">
				<input type="text" name="email" id="email">
				<label for="email">Email:</label>
			</p>
			<p class="clearfix">
				<input type="text" name="username" id="username">
				<label for="username">Usuario:</label>
			</p>
			<p class="clearfix">
				<input type="password" name="password" id="password">
				<label for="password">Clave:</label>
			</p>
			<p class="clearfix">
				<input type="password" name="password2" id="password2">
				<label for="password2">Repetir clave:</label>
			</p>
			<p class="clearfix"><input type="button" name="submit" value="Entrar" class="bbuscar"></p>
		</form>
	</div>
</div>