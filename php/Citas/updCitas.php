<?php
	//aqui la variable de sesion valida la autenticacion al programa, queda pendiente

//conexion al servidor de Base de Datos
$connect = mysqli_connect("localhost", "root", "root", "consultorio");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
	//identificar la accion del usuario para conocer que tipo de query usar en la actializacion de la bd

if(isset($_GET['id_cita'])){
  $accion = $_GET['id_cita'];
}


		//construir el html de la interface pra la opcion de agregar un nuevo registrio
		echo "
			<html>
			<head>
			<title></title>
				<script type='text/javascript'>
					function enviar(opc)
					{
						switch(opc)
						{
							case 'agregar':
								document.getElementById('hdnOpc').value = 'agregar';
								document.getElementById('frmUpdCita').submit();
								break;
							case 'regresar':
								window.location = 'shwCitas.php'
								break;
						}
					}
				</script>
			</head>
			<body onLoad='javascript: document.getElementById(\"txtId\").focus()'>
			<form name='frmUpdCita' id='frmUpdCita' action='qryCita.php' method='POST'>
				<table align='center' width='430' border='1'>
					<tr height='100'>
						<td colspan='2' align='center'>
							<b>Agregando Citas</b>
							<input type='hidden' id='hdnOpc' name='hdnOpc'>
						</td>
					</tr>
					<tr>
						<td>Fecha y Hora</td>
						<td><input type='text' id='txtFyH' name='txtFyH' value='AAAA/MM/DD 00:00'></td>
					</tr>
					<tr>
						<td>ID Medico</td>
						<td><input type='text' id='txtIdMed' name='txtIdMed'></td>
					</tr>
          <tr>
            <td>ID Paciente</td>
            <td><input type='text' id='txtIdPac' name='txtIdPac'></td>
          </tr>
					<tr>
						<td colspan='2' align='center'>
						<input type='button' id='btnGrabar' name='btnGrabar' value='Grabar' style='width:100px' onClick='enviar(\"agregar\")'></td>
					</tr>
					<tr>
						<td colspan='2' align='center'>
						<input type='button' id='btnRegresar' name='btnRegresar' value='Regresar' style='width:100px' onClick='enviar(\"regresar\")'></td>
					</tr>
				</table>
			</html>
		";
	
?>
