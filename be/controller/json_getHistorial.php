<?php
use Stel\Lib\DB;

if(!isset($_POST["tipoDoc"]) || !isset($_POST["nro"])){
	return;
}

$tipo = 'DNI';

if($_POST["tipoDoc"] == 2)
	$tipo = 'LE';

if($_POST["tipoDoc"] == 3)
	$tipo = 'LC';

$sqlStel = "select p.nombre nombre, p.apellido apellido, tt.nombre tipotramite, i.nombre instancia, ta.nombre tarea, 
					t.fechainicio fecha, u.apenom usuario, o.observacion
 			  from `persona` p, `tramite` t, `tipotramite` tt, `tramiteinstancia` ti, `instancia` i, 
 			  		`tramiteinstanciatarea` tit, `tarea` ta, `observacion` o, `usuario` u
			 where p.idPersona = t.idPersona
			  and t.idTramite = ti.idTramite
			  and t.idTipoTramite = tt.idTipoTramite
			  and ti.idTramiteInstancia = tit.idTramiteInstancia
			  and tit.idTramiteInstanciaTarea = o.idTramiteInstanciaTarea
			  and ti.idInstancia = i.idInstancia
			  and tit.idTarea = ta.idTarea
			  and tit.idUsuario = u.idUsuario

			  and p.idTipoDocumento = ".$_POST["tipoDoc"]." and p.nroDoc = ".$_POST["nro"]." order by fecha desc";

$resultStel = DB::fetchAll($sqlStel);

$sqlLegacy = "select c.Nombre nombre, c.Apellido apellido, date(m.Salio) fecha, d.Descripcion destino, 
				m.Gestor usuario, m.Observaciones observacion
 			  from `cabecera` c, `movimiento` m, `destinos` d
			 where c.Cod_Cabecera = m.Cod_Cabecera
			  and m.Cod_Destino = d.Cod_Destino
			  and c.Tipo = '".$tipo."' and c.Nro_Documento = ".$_POST["nro"]." order by fecha desc";

$resultLegacy = DB::fetchAll($sqlLegacy);

$result = array("stel" => $resultStel, "legacy" => $resultLegacy);

Controller::renderJson("OK", $result);
	
?>