<?php 
	echo Stel\BackEnd\FrontController::embebController("menu.php"); 
?>
<div id="formularios">

<div id="contentform">

<h3 class="azul">DATOS VEHICULO</h3>
<hr />
<div>
<div class="space">Marca: &nbsp;&nbsp;<input name="marca" id="marca" type="text" size="25" /> | Modelo: <input name="modelo" id="modelo" type="text" size="40" /></div>
<div class="space">Dominio: &nbsp;&nbsp;<input name="dominio" id="dominio" type="text" size="15" /> | Año: <input name="anio" id="anio" type="text" size="15" /> | Clase: <input name="clase" id="clase" type="text" size="15" /></div>
</div>
<h3 class="azul">DATOS POST COMPRA</h3>
<hr />
<div>
<div class="space">Nro. de Motor: &nbsp;&nbsp;<input name="motor" id="motor" type="text" size="25" /> | Fecha Patente: <input class="center" type="text" size="4" />/<input class="center" type="text" size="4" />/<input class="center" type="text" size="4" /></div>
<div class="space">Registro: &nbsp;&nbsp;<input name="registro" id="registro" type="text" size="15" /> | Procedencia: <input name="procedencia" id="procedencia" type="text" size="15" /> | Fecha Adquisicion: <input class="center" type="text" size="4" />/<input class="center" type="text" size="4" />/<input class="center" type="text" size="4" /></div>
</div>
<h3 class="azul">DATOS TITULAR DEL VEHICULO</h3>
<hr />
<div class="space">Apellido y Nombre: &nbsp;&nbsp;<input name="apeynom" id="apeynom" type="text" size="45" /></div>
<div class="space">Tipo Documentos: <input name="tipodocumento" id="tipodocumento" type="text" size="5" /> | Nro. Documento: <input name="documento" id="documento" type="text" size="15" /></div>
<div class="space">Domicilio: &nbsp;&nbsp;<input name="domicilio" id="domicilio" type="text" size="25" /> | Localidad: <input name="localidad" id="localidad" type="text" size="5" /> | Provincia: <input name="provincia" id="provincia" type="text" size="15" /></div>
<div class="space">Cod. Postal: <input name="codpostal" id="codpostal" type="text" size="15" /></div>

<div class="right">
<a href="misTareas" class="btn">+ Guardar Tramite</a>
</div>


</div>
</div>