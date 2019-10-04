<?php
//paso 1
session_start();
if (empty($_SESSION['user']))
{
	echo "Debe autentificarse";
	exit();
}

$conexionBD = mysqli_connect('localhost', 'root', 'root', 'consultorio') or die
('No pudo conectarse al Servidor de Base de Datos MySql:' .mysql_error());



//if (isset($_POST['hdnOpc'])) {
    $opcion = $_POST['hdnOpc'];
//}


switch ($opcion)
{
  //opcion grabar
  case('agregar'):
    //construir el query para insertar en la tabla de la bd


		$fechayhora = $_POST['txtFyH'];
		$idmed = $_POST['txtIdMed'];
		$idpac = $_POST['txtIdPac'];



    $qry = "INSERT INTO citas(fechayhora, id_medico, id_paciente) VALUES ('$fechayhora', '$idmed', '$idpac')";
    //ejecutar el query
    $resultado = mysqli_query($conexionBD, $qry) or die ("Error al insertar el registro: " .mysqli_error($conexionBD));
    //redirigir el programa al script html de captura de datos
    echo "<script type='text/javascript'>
		 window.location='shwCitas.php';
		 </script>";
    	break;

  //grabar modificar
  case('modificar'):
    //construir el query para modificar en la tabla de la bd
		$id_medico = $registro['id_medico'];
		$id_colonia = $registro['id_colonia'];
		$nombre = $registro['nombre'];
		$paterno = $registro['paterno'];
		$materno = $registro['materno'];
    $qry = "UPDATE medicos SET id_colonia='$id_colonia', nombre='$nombre', paterno='$paterno', materno='$materno' WHERE id_medico='$id_medico'";
    //ejecutar el query
    $resultado = mysqli_query($conexionBD, $qry) or die("Error al modificar el registro: " .mysqli_error($conexionBD));

    //redirigir el programa al script html de captura de datos
    echo "
      <script type/javascript>window.location='shwDoctores.php'</script> ";
      break;

    //opcion de eliminar
    case('eliminar'):
      //construir el query para eliminar en la tabla de la bd
      $id_paciente = $_POST['hdnId'];
      $qry = "DELETE FROM pacientes WHERE id_paciente=$id_paciente";
      //ejecutar el query
      $resultado = mysqli_query($conexionBD, $qry) or die ("Error al eliminar el registro: " .mysqli_error($conexionBD));

      //redirigir el programa al script html de captura de datos
      echo "
        <script type='text/javascript'>
				 window.location='shwPacientes.php'
				 </script>";
         break;

}
?>
