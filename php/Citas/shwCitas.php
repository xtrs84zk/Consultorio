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
//mysqli_select_db($conexionBD, 'kardex') or die ('No se puede abrir la estructura de BD' .mysql_error());

//query para obtener conjunto de registro de la tabla de especialidades
$qry = "SELECT * FROM vista_citas";

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
		<script type = 'text/javascript'>
		function enviar(){
			window.location = 'updCitas.php?id_cita=noId';
		}
		</script>
	</head>
	<body>
	<table align='center' width='700' border='1'>
		<tr>
			<td colspan='2' align='center'>
				<input type='button' id='btnAgregar' name='btnAgregar' value='Agregar' onclick='enviar()'>
			</td>
		</tr>
	</table>
	<table id = 'idTabla' border = '1' align = 'center' width = '700'>
		<tr><td>
		<thead>
			<tr style = 'background-color: #BAB7B7'>
			<th width = '30' height = '20'> ID </th>
			<th width = '300' height = '20'> Medico asignado </th>
			<th width = '400' height = '20'> Paciente </th>
			<th width = '400' height = '20'> Fecha y Hora </th>
			<th width = '150' height = '20'> ID Diagnositico </th>

		</thead>
		<!- ciclo para recorrer la tabla de registros intermedios que forma ->
		<!- la tabla html ->
		</td></tr>
		";
		//desplegar los registros de la tabla especialidades de la bd
		while($registro = mysqli_fetch_array($tablaBD)){
			$id_cita = $registro['id_cita'];
			$medico = $registro['nombre_doc'];
			$paciente = $registro['nombre_pac'];
			$fecha_cita = $registro['fecha_cita'];
			$id_diag = $registro['id_diag'];
			echo "<tr>";
			echo "<script type = 'text/javascript'> document.getElementByld('hdnld').value = $id_cita; </script>";
			echo "<td><a href = 'updDoctores.php?id=$id_cita'>" .$id_cita. "</a></td>";
			echo "<td>" .$medico. "</td>";
			echo "<td>" .$paciente. "</td>";
			echo "<td>" .$fecha_cita. "</td>";
			echo "<script type = 'text/javascript'> document.getElementByld('iddiag').value = $id_diag; </script>";
      echo "<td><a href = 'shwReceta.php?id_diag=$id_diag'>" .$id_diag. "</a></td>";
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
		<td width = '1000' align = 'center'><font color = '#ff3333'> No existe registros en la tabla de Citas </font></td>
		</tr>
	</table> ";
	echo " </body> ";
}
//cerrar la conexion a la bd
mysqli_free_result($tablaBD); //libera los registros de la tabla
mysqli_close($conexionBD);
?>
