<html>
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>

<?php

	$conn = mysql_connect('localhost','root','');

	if($conn):
		print "Conexion a MySQL";

		$bd = mysql_select_db('aviacion', $conn);

		if($bd):
			 print "Base de datos conectada";

			$query = mysql_query("DELETE FROM usuarios WHERE id = '".$_GET['id']."'", $conn) or die ("Error al ejecutar consulta".mysql_error());
			?>
			<p>Registro eliminado con éxito! <a href="http://localhost/aviacion/index.php">Volver al listado</a></p>
			<?php
		else:
			print "No se pudo conectar a la base de datos<br>";
		endif;
	else:
		print "No se pudo conectar con mysql<br>";
	endif;

	?>
</body>
</html>