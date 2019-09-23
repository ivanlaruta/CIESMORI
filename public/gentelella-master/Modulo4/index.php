<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</script>
</head>
<body>
<p>

</p>
<table width="100%" border="1" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="14%" align="center" valign="middle">Nº</td>
      <td width="48%" align="center" valign="middle">NOMBRE DE ARCHIVO</td>
      <td width="19%" align="center" valign="middle">TIPO</td>
      <td width="19%" align="center" valign="middle">DESCARGAR</td>
    </tr>
	<?php
	  $directorio_images = opendir("imagenes"); //ruta actual
	  $count_images = 1;
	  while ($archivo_images = readdir($directorio_images)) //obtenemos un archivo y luego otro sucesivamente
	  {
		  if (is_dir($archivo_images))//verificamos si es o no un directorio
		  {
			 //echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
		  }
		  else
		  {
	 ?>
    <tr>
      <td valign="middle"><?php echo $count_images?></td>
      <td valign="middle"><a href="imagenes/<?php echo $archivo_images;?>">
		  <?php
			  echo $archivo_images;
			  $count_images++;
			?></a>
      </td>
      <td valign="middle">IMAGEN</td>
      <td align="center" valign="middle"><a href="" download="<?php echo $archivo_images;?>" ><img src="img/descargar.jpg" width="54" height="27" alt="" /></a></td>
    </tr>
	<?php
	  }
    }
	?>
  </tbody>
</table>
<p>&nbsp;
	EL NUMERO DE IMAGENES ENCONTRADOS SON: <?php echo $count_images-1;?></p>
<p>&nbsp;</p>
<table width="100%" border="1" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="14%" align="center" valign="middle">Nº</td>
      <td width="48%" align="center" valign="middle">NOMBRE DE ARCHIVO</td>
      <td width="19%" align="center" valign="middle">TIPO</td>
      <td width="19%" align="center" valign="middle">DESCARGAR</td>
    </tr>
	<?php
	  $directorio_audios = opendir("audios"); //ruta actual
	  $count_audios = 1;
	  while ($archivo_audios = readdir($directorio_audios)) //obtenemos un archivo y luego otro sucesivamente
	  {
		  if (is_dir($archivo_audios))//verificamos si es o no un directorio
		  {
			 //echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
		  }
		  else
		  {
	 ?>
    <tr>
      <td valign="middle"><?php echo $count_audios?></td>
      <td valign="middle"><a href="audios/<?php echo $archivo_audios;?>">
		  <?php
			  echo $archivo_audios;
			  $count_audios++;
			?></a>
      </td>
      <td valign="middle">AUDIOS</td>
      <td align="center" valign="middle"><a href="" download="<?php echo $archivo_audios;?>" ><img src="img/descargar.jpg" width="54" height="27" alt="" /></a></td>
    </tr>
	<?php
	  }
    }
	?>
  </tbody>
</table>
<p>&nbsp;
	EL NUMERO DE AUDIOS ENCONTRADOS SON: <?php echo $count_audios-1;?></p>
</body>
</html>