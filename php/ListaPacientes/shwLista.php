<?php
//paso 1
session_start();
if (empty($_SESSION['user']))
{
	echo "Debe autentificarse";
	exit();
}
//paso 2
//conexion al servidor web y bd
$conexionBD = mysqli_connect('localhost', 'root', 'root', 'consultorio') or die
('No pudo conectarse al Servidor de Base de Datos MySql:' .mysqli_error());

//seleccion al servidor web y db
mysqli_select_db($conexionBD, "consultorio") or die ("No se puede abrir la estructura de BD" . mysqli_connect_errno($conexionBD));

//query para obtener conjunto de registro de la tabla de especialidades
$qry = "SELECT * FROM listado_general";

//ejecutar el query
$tablaBD = mysqli_query($conexionBD, $qry);

//paso 3
//si existen registros crear tabla
if (mysqli_num_rows($tablaBD)>0){
	//crear el encabezado de la tabla
	echo"
	<html>
	<title></title>
	<head>

	</head>
	<body>
	<table id = 'idTabla' border = '1' align = 'center' width = '600'>
		<tr><td>
		<thead>
			<tr style = 'background-color: #BAB7B7'>
			<th width = '150' height = '20'> ID Paciente </th>
			<th width = '80' height = '20'> Nombre </th>
			<th width = '400' height = '20'> A. Paterno </th>
      <th width = '400' height = '20'> A. Materno </th>
		</thead>

		</td></tr>
		";
		//desplegar los registros de la tabla especialidades de la bd
		while($registro = mysqli_fetch_array($tablaBD)){
			$id_pac = $registro['id_paciente'];
			$nombre = $registro['nombre_pac'];
			$paterno = $registro['paterno_pac'];
      $materno = $registro['materno_pac'];
			echo "<tr>";

			echo "<td>" .$id_pac. "</td>";
			echo "<td>" .$nombre. "</td>";
			echo "<td>" .$paterno. "</td>";
      echo "<td>" .$materno. "</td>";
			echo "</tr>";
		}
		echo "<table>";
}
else{
	//notificar que no existen registros en la tabla de especialidades
	echo "
	<table border = '0' align = 'center' bordercolor = 'ff3333'>
			<tr>
				<td></td>
			</tr>
		<tr align = 'center'>
		<td width = '1000' align = 'center'><font color = '#ff3333'> No existe registros en la tabla de Pacientes </font></td>
		</tr>
	</table> ";
	echo " </body> ";
}
//cerrar la conexion a la bd
mysqli_free_result($tablaBD); //libera los registros de la tabla
mysqli_close($conexionBD);
?>
