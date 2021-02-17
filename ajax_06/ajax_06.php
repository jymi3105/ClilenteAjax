<?php
	$servername = "localhost";
	$dbName = "interfaces";
	$username = "profesor";
	$password = "profesor";

	try {
		mysql_set_charset('utf8');
		$conn = new PDO("mysql:host=$servername;dbname=$dbName;charset=utf8", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$titulo = $_GET["texto"]; 
		$resultados = $conn->query("select titulo from libros where titulo like '" . $titulo . "%' order by titulo");
		$fila = $resultados->fetch(PDO::FETCH_ASSOC);
		echo json_encode($fila["titulo"]);

	} catch(PDOException $e) {
		echo "Fallo la conexión: " . $e->getMessage();
	}
?>