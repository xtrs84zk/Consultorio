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
if(isset($_GET['id_diag'])){
  $id_diag = $_GET['id_diag'];

}
//query para obtener conjunto de registro de la tabla de especialidades
$qry = "SELECT id_diagnostico, receta FROM diagnostico WHERE id_diagnostico='$id_diag'";


//ejecutar el query
$tablaBD = mysqli_query($conexionBD, $qry);

if (mysqli_num_rows($tablaBD)>0){
	//crear el encabezado de la tabla
	echo"
	<html>
	<title></title>
	<head>
		<script type = 'text/javascript'>
		function enviarr(){
			window.location = 'updReceta.php?id_diag=$id_diag';
		}
		</script>
	</head>
	<body>
	<table align='center' width='1000' border='1'>
		<tr>
			<td colspan='2' align='center'>
				<input type='button' id='btnAgregar' name='btnAgregar' value='Agregar' onclick='enviarr()'>
			</td>
		</tr>
	</table>
	<table id = 'idTabla' border = '1' align = 'center' width = '1000'>
		<tr><td>
		<thead>

		<tr style = 'background-color: #BAB7B7'>
		  <th width = '100' height = '20'> ID Diagnostico</th>
			<th width = '400' height = '20'> Receta </th>
		</thead>
		<!- ciclo para recorrer la tabla de registros intermedios que forma ->
		<!- la tabla html ->
		</td></tr>
		";
		//desplegar los registros de la tabla especialidades de la bd
		while($registro = mysqli_fetch_array($tablaBD)){
			$receta = $registro['receta'];

			echo "<tr>";
      echo "<script type = 'text/javascript'> document.getElementByld('DiagId').value = $id_diag; </script>";
      echo "<td>" .$id_diag. "</td>";
      echo "<td>" .$receta. "</td>";
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
		<td width = '1000' align = 'center'><font color = '#ff3333'> No existe registros en la tabla de Diag </font></td>
		</tr>
	</table> ";
	echo " </body> ";
}
//cerrar la conexion a la bd
mysqli_free_result($tablaBD); //libera los registros de la tabla
mysqli_close($conexionBD);
?>
