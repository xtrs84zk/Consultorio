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
$qry = "SELECT * FROM porgenero";

//ejecutar el query
$tablaBD = mysqli_query($conexionBD, $qry);

if (mysqli_num_rows($tablaBD)>0){
	//crear el encabezado de la tabla
	echo"
	<html>
	<title></title>
	<head>
		<script type = 'text/javascript'>
		function enviar(){
			window.location = 'updPacientes.php?id_paciente=noId';
		}
		</script>
	</head>
	<body>
	<table align='center' width='1000' border='1'>
		<tr>
			<td colspan='2' align='center'>
				<input type='button' id='btnAgregar' name='btnAgregar' value='Agregar' onclick='enviar()'>
			</td>
		</tr>
	</table>
	<table id = 'idTabla' border = '1' align = 'center' width = '1000'>
		<tr><td>
		<thead>

		<tr style = 'background-color: #BAB7B7'>
		  <th width = '100' height = '20'> ID </th>
			<th width = '400' height = '20'> Nombre paciente </th>
			<th width = '300' height = '20'> Paterno </th>
			<th width = '300' height = '20'> Materno </th>
			<th width = '300' height = '20'> Sexo </th>
      <th width = '400' height = '20'> Nombre doctor </th>
      <th width = '300' height = '20'> Paterno </th>
      <th width = '300' height = '20'> Materno </th>
      <th width = '500' height = '20'> Fecha y Hora </th>

		</thead>
		<!- ciclo para recorrer la tabla de registros intermedios que forma ->
		<!- la tabla html ->
		</td></tr>
		";
		//desplegar los registros de la tabla especialidades de la bd
		while($registro = mysqli_fetch_array($tablaBD)){
			$id_paciente = $registro['id_paciente'];
			$nombre_pac = $registro['nombre_pac'];
			$paterno_pac = $registro['paterno_pac'];
			$materno_pac = $registro['materno_pac'];
      $sexo_pac = $registro['sexo_pac'];
      $nombre_doc = $registro['nombre_doc'];
      $paterno_doc = $registro['paterno_doc'];
      $materno_doc = $registro['materno_doc'];
      $fecha_consulta = $registro['fecha_consulta'];
			echo "<tr>";
			echo "<script type = 'text/javascript'> document.getElementByld('hdnld').value = $id_paciente; </script>";
			echo "<td><a href = 'updPacientes.php?id=$id_paciente'>" .$id_paciente. "</a></td>";
			echo "<td>" .$nombre_pac. "</td>";
			echo "<td>" .$paterno_pac. "</td>";
			echo "<td>" .$materno_pac. "</td>";
      echo "<td>" .$sexo_pac. "</td>";
      echo "<td>" .$nombre_doc. "</td>";
      echo "<td>" .$paterno_doc. "</td>";
      echo "<td>" .$materno_doc. "</td>";
      echo "<td>" .$fecha_consulta. "</td>";
			echo "</tr>";
		}
		echo "<table>";
}
else{
	//notificar que no existen registros en la tabla de especialidades !!
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
