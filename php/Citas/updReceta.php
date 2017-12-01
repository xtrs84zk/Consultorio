<?php
	//aqui la variable de sesion valida la autenticacion al programa, queda pendiente

//conexion al servidor de Base de Datos
$connect = mysqli_connect("localhost", "root", "root", "consultorio");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
	//identificar la accion del usuario para conocer que tipo de query usar en la actializacion de la bd

if(isset($_GET['id_diag'])){
  $id_diag = $_GET['id_diag'];
}


		//construir el html de la interfce para la opcion de modificar
		echo "
			<html>
			<head>
			<title></title>
				<script type='text/javascript'>
					function enviar(opc)
					{
						switch (opc) {
              case 'modificar':
            		document.getElementById('hdnOpc').value = 'modificar';
            	  document.getElementById('DiagId').value = '$id_diag';
            		document.getElementById('frmUpdReceta').submit();
            		break;

							case 'regresar':
								window.location = 'shwReceta.php'
								break;
						}
					}
				</script>
			</head>
			<body onLoad='javascript:document.getElementById(\"txtReceta\").focus()'>
				<form name='frmUpdReceta' id='frmUpdReceta' action='qryReceta.php' method='POST'>
					<table align='center' width='430'>
						<tr height='100'>
							<td colspan='2' align='center'>
								<b>Agregando Receta</b>
								<input type='hidden' id='hdnOpc' name='hdnOpc'>
								<input type='hidden' id='DiagId' name='DiagId'>
							</td>
						</tr>
						<tr>
							<td>ID Diagnostico</td>
							<td>$id_diag</td>
						</tr>
            <tr>
							<td>Receta</td>
							<td><input type='text' id='txtReceta' name='txtReceta'>
							</td>
						</tr>
						<tr>
							<td colspan='2' align='center'>
							<input type='button' id='btnGrabar' name='btnGrabar' value='Guardar' style='width:100px' onClick='enviar(\"modificar\")'>
							</td>
						</tr>
						<tr>
							<td colspan='2' align='center'>
							<input type='button' id='btnRegresar' name='btnRegresar' value='Regresar' style='width:100px' onClick='enviar(\"regresar\")'>
							</td>
						</tr>
					</table>
				</body>
			</html>
		";

?>
