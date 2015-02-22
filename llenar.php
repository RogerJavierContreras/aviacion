<?php
	
	if(isset($_POST['nombre'])):
		$conn = mysql_connect('localhost','root','');

		if($conn):
			print "Conexion a MySQL";

			$bd = mysql_select_db('aviacion', $conn);

			if($bd):
				print "Base de datos conectada";

				$uploads_dir = 'C:\xampp\htdocs\aviacion\imagenes/';

				$tmp_name = $_FILES["imagen"]["tmp_name"];
		        $name_img = $_FILES["imagen"]["name"];
		        move_uploaded_file($tmp_name, "$uploads_dir/$name_img");

				$query = mysql_query("INSERT INTO usuarios(nombre, apellidos, grado, imagen) VALUES('".$_POST['nombre']."','".$_POST['apellidos']."','".$_POST['grado']."', '".$name_img."')", $conn) or die ("Error al ejecutar consulta".mysql_error());
			else:
				print "No se pudo conectar a la base de datos<br>";
			endif;
		else:
			print "No se pudo conectar con mysql<br>";
		endif;
	endif;
?>

<html>
<head>
	<title>Formulario de Llenado</title>
	<style type="text/css">
		form div{
			margin: 5px;
			text-align: center;
			color: #666666;
		}
	</style>
</head>
<body>
	<h3>Formulario de Registro</h3>
	<form method="post" enctype="multipart/form-data">
		<div><label>Nombre: </label> <input type="text" name="nombre"></div>
		<div><label>Apellidos: </label> <input type="text" name="apellidos"></div>
		<div><label>Grado: </label> <input type="text" name="grado"></div>
		<div><label>Imagen: </label> <input type="file" name="imagen"></div>
		<div><input type="submit" value="Guardar"></div>
	</form>
	<a href="http://localhost/aviacion/index.php">Listado</a>
</body>
</html>