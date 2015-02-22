<html>
<head>
	<title>Formulario de Editar</title>

	<style type="text/css">
		form div{
			margin: 5px;
			text-align: center;
			color: #666666;
		}
	</style>
</head>
<body>

	<?php

	$conn = mysql_connect('localhost','root','');

	if($conn):
		print "Conexion a MySQL";

		$bd = mysql_select_db('aviacion', $conn);

		if($bd):
			 print "Base de datos conectada";

			if(isset($_POST['nombre'])):

				print "Base de datos conectada";
			
				if($_FILES["imagen"]["name"] != ""):

					$uploads_dir = 'C:\xampp\htdocs\aviacion\imagenes/';

					$tmp_name = $_FILES["imagen"]["tmp_name"];
			        $name_img = $_FILES["imagen"]["name"];
			        move_uploaded_file($tmp_name, "$uploads_dir/$name_img");

					$query = mysql_query("UPDATE usuarios SET imagen='".$name_img."' WHERE id='".$_GET['id']."'", $conn) or die ("Error al ejecutar consulta".mysql_error());
		        	
		        endif;

				$query = mysql_query("UPDATE usuarios SET nombre='".$_POST['nombre']."',apellidos='".$_POST['apellidos']."',grado='".$_POST['grado']."' WHERE id='".$_GET['id']."'", $conn) or die ("Error al ejecutar consulta".mysql_error());

			endif;

			if(isset($_GET['id'])):
				
				$query = mysql_query("SELECT * FROM usuarios WHERE id='".$_GET['id']."'", $conn) or die ("Error al ejecutar consulta".mysql_error());
				$fila = mysql_fetch_array($query);
				?>

				<h3>Formulario de Registro</h3>
				<form method="post" enctype="multipart/form-data">
					<div><label>Nombre: </label> <input type="text" name="nombre" value="<?php print $fila['nombre'] ?>"></div>
					<div><label>Apellidos: </label> <input type="text" name="apellidos" value="<?php print $fila['apellidos'] ?>"></div>
					<div><label>Grado: </label> <input type="text" name="grado" value="<?php print $fila['grado'] ?>"></div>
					<div><label>Cambiar Imagen: </label> <input type="file" name="imagen"></div>
					<div><img src="http://localhost/aviacion/imagenes/<?php print $fila['imagen'] ?>" height="100px"></div>
					<div><input type="submit" value="Guardar"></div>
				</form>
				<a href="http://localhost/aviacion/index.php">Listado</a>

				<?php

			endif;

		else:
			print "No se pudo conectar a la base de datos<br>";
		endif;

	else:
		print "No se pudo conectar con mysql<br>";
	endif;

?>
</body>
</html>