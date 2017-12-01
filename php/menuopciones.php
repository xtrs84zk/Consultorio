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
					top.frames['2'].location.href="/Medico/php/Pacientes/shwPacientes.php";
					break;
					case 'Pacientesfecha':
					top.frames['2'].location.href="/Medico/php/Pacientes/botonfechas.php";
					break;
					case 'Citas':
					top.frames['2'].location.href="/Medico/php/Citas/shwCitas.php";
					break;
					case 'Directorio':
					top.frames['2'].location.href="/Medico/php/Directorio/shwDirectorio.php";
					break;
					case 'PacientesList':
					top.frames['2'].location.href="/Medico/php/ListaPacientes/shwLista.php";
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
				<div align="center">
			<h4>Doctores</h4>
			 </div>
			<hr width="90%" size="2px" color="black">
			</td>
		</tr>
		<tr>
			<td>
				<input type="button" value="Doctores" class="tamanoBoton" onclick="opcion('Doctores');">
			</td>
		</tr>
		<tr>
			<td>                         <br>
				<div align="center">
			<h4>Pacientes</h4>
		   </div>
			<hr width="90%" size="2px" color="black">
			</td>
		</tr>
		<tr>
			<td>
				<input type="button" value="Lista General" class="tamanoBoton" onclick="opcion('PacientesList');">
			</td>
		</tr>
		<tr>
			<td>
				<input type="button" value="Genero" class="tamanoBoton" onclick="opcion('Pacientes');">
			</td>
		</tr>
		<tr>
			<td>
				<input type="button" value="Fecha de cita" class="tamanoBoton" onclick="opcion('Pacientesfecha');">
			</td>
		</tr>
		<tr>
			<td>   <br>
				<div align="center">
			<h4>Consultorio</h4>
			 </div>
			<hr width="90%" size="2px" color="black">
			</td>
		</tr>
		<tr>
			<td>
				<input type="button" value="Citas" style="width: 150px; height:40px;" onclick="opcion('Citas');">
			</td>
		</tr>
		<tr>
			<td>
				<input type="button" value="Directorio" style="width: 150px; height:40px;" onclick="opcion('Directorio');">
			</td>
		</tr>
		<tr style="height: 200px">
			<td>
				<input type="button" value="Salir" style="width: 150px; height:40px;" onclick="opcion('Terminar');">
			</td>
		</tr>
	</table>
</body>
</html>
