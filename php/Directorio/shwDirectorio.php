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
$qry = "SELECT * FROM directorio";

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
			window.location = 'updPacientes.php?id=noId';
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
		  <th width = '100' height = '20'> ID Pais </th>
			<th width = '400' height = '20'> País </th>
			<th width = '300' height = '20'> ID Estado </th>
			<th width = '300' height = '20'> Estado </th>
			<th width = '300' height = '20'> Id_Ciudad </th>
      <th width = '400' height = '20'> Ciudad </th>
      <th width = '300' height = '20'> ID Colonia </th>
      <th width = '300' height = '20'> Colonia </th>
      <th width = '500' height = '20'> Clave Directorio</th>

		</thead>
		<!- ciclo para recorrer la tabla de registros intermedios que forma ->
		<!- la tabla html ->
		</td></tr>
		";
		//desplegar los registros de la tabla especialidades de la bd
		while($registro = mysqli_fetch_array($tablaBD)){
			$id_pais = $registro['id_pais'];
			$pais = $registro['pais'];
			$id_estado = $registro['id_estado'];
			$estado = $registro['estado'];
      $id_ciudad = $registro['id_ciudad'];
      $ciudad = $registro['ciudad'];
      $id_colonia = $registro['id_colonia'];
      $colonia = $registro['colonia'];
      $clave = $registro['clave'];
			echo "<tr>";
			echo "<td>" .$id_pais. "</td>";
			echo "<td>" .$pais. "</td>";
			echo "<td>" .$id_estado. "</td>";
      echo "<td>" .$estado. "</td>";
      echo "<td>" .$id_ciudad. "</td>";
      echo "<td>" .$ciudad. "</td>";
      echo "<td>" .$id_colonia. "</td>";
      echo "<td>" .$colonia. "</td>";
      echo "<td>" .$clave. "</td>";
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
