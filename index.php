<html>
<head>
	<title>Aviacion</title>
	<style type="text/css">
		body{
			background-color: rgb(255,255,125);
			font-family: "Arial"; 	
		}
		table{
			border: 1px #000 solid;
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

			$query = mysql_query("SELECT * FROM usuarios", $conn) or die ("Error al ejecutar consulta".mysql_error());
			?>
			<table>
				<tr><td>Imagen</td><td>Nombre</td><td>Apellido</td><td>Cargo</td><td>Acciones</td></tr>
			<?php
			while ( $fila = mysql_fetch_array($query)):
				?><tr><?php
				print '<td><img src="http://localhost/aviacion/imagenes/'.$fila['imagen'].'" height="50"/></td><td>'.$fila['nombre'].'</td><td>'.$fila['apellidos'] .'</td><td>'.$fila['grado'] .'</td>';
				?>
				<td><a href="http://localhost/aviacion/editar.php?id=<?php print $fila['id'] ?>">Editar</a></td>
				<td><a href="http://localhost/aviacion/eliminar.php?id=<?php print $fila['id'] ?>">Eliminar</a></td>
				<?php
				?></tr><?php
			endwhile;
			?>
			</table>
			<?php
		else:
			print "No se pudo conectar a la base de datos<br>";
		endif;
	else:
		print "No se pudo conectar con mysql<br>";
	endif;

	 ?>
	 <a href="http://localhost/aviacion/llenar.php">Crear Nuevo</a>
</body>
</html>