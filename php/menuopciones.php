<?php
	session_start();
	if(empty($_SESSION['user'])){
		echo "Debe autenticarse";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title></title>
	<script type="text/javascript">
		function opcion(opc){
			switch (opc){
				case 'Doctores':
					top.frames['2'].location.href="/Medico/php/Doctores/shwDoctores.php";
					break;
					case 'Pacientes':
					top.frames['2'].location.href="materias/shwMaterias.php";
					break;
					case 'Citas':
					top.frames['2'].location.href="alumnos.html";
					break;
					case 'Expedientes':
					top.frames['2'].location.href="calificaciones.html";
					break;
					case 'Terminar':
					window.top.location.href="/Medico/index.html";
					break;
			}
			opc="";
		}
	</script>
	<style type="text/css">
		.tamanoBoton{
			width: 150px;
			height: 40px;
			}
	</style>
</head>
<body background="/Medico/img/fondomed2.jpg" height="50px">
	<table align="center">
		<tr>
			<td>
				<input type="button" value="Doctores" class="tamanoBoton" onclick="opcion('Doctores');">
			</td>
		</tr>
		<tr>
			<td>
				<input type="button" value="Pacientes" class="tamanoBoton" onclick="opcion('Pacientes');">
			</td>
		</tr>
		<tr>
			<td>
				<input type="button" value="Citas" style="width: 150px; height:40px;" onclick="opcion('Citas');">
			</td>
		</tr>
		<tr>
			<td>
				<input type="button" value="Expedientes" style="width: 150px; height:40px;" onclick="opcion('Expedientes');">
			</td>
		</tr>
		<tr style="height: 200px">
			<td>
				<input type="button" value="Terminar" style="width: 150px; height:40px;" onclick="opcion('Terminar');">
			</td>
		</tr>
	</table>
</body>
</html>
