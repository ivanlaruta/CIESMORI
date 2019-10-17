<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
	$mysqli = new mysqli('127.0.0.1', 'root', '', 'ciesmoridb');
	$mysqli->set_charset("utf8");
    $nombre_archivo = "archivo_dat/encuestadores.dat";
	  unlink($nombre_archivo);
    if($archivo = fopen($nombre_archivo, "a"))
    {
		$query = "SELECT p.ci,
						 p.primer_nombre,
						 p.segundo_nombre,
						 p.apellido_paterno,
						 p.apellido_materno
					FROM ciesmoridb.persona p
				   INNER JOIN ciesmoridb.encuestador e ON e.persona_id = p.id";
		$myquery = $mysqli->query($query);
		while ($fila = $myquery->fetch_object())
		{
			fwrite($archivo, str_pad($fila->ci,10).str_pad($fila->primer_nombre,30).str_pad($fila->segundo_nombre,30).str_pad($fila->apellido_paterno,30).str_pad($fila->apellido_materno,30). "\r\n");
		}
        fclose($archivo);
    }
 ?>
