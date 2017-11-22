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


		$nombre = $_POST['txtNomPac'];
		$paterno = $_POST['txtPatPac'];
		$materno = $_POST['txtMatPac'];
		$telefono = $_POST['txtTelPac'];
    $id_medico = $_POST['txtIdmed'];
		$id_pais = $_POST['txtIdPa'];
		$id_estado = $_POST['txtIdEst'];
		$id_ciudad = $_POST['txtIdc'];
		$id_colonia = $_POST['txtPacCol'];
    $sexo = $_POST['txtSex'];


    $qry = "INSERT INTO pacientes(nombre, paterno, materno, telefono, id_medico, id_pais, id_estado, id_ciudad, id_colonia, sexo) VALUES ('$nombre', '$paterno', '$materno', '$telefono', '$id_medico', '$id_pais', '$id_estado', '$id_ciudad', '$id_colonia', '$sexo')";
    //ejecutar el query
    $resultado = mysqli_query($conexionBD, $qry) or die ("Error al insertar el registro: " .mysqli_error($conexionBD));
    //redirigir el programa al script html de captura de datos
    echo "<script type='text/javascript'>
		 window.location='updPacientes.php?id_paciente=noId'
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
      $id_medico = $_POST['hdnId'];
      $qry = "DELETE FROM medicos WHERE id_medico=$id_medico";
      //ejecutar el query
      $resultado = mysqli_query($conexionBD, $qry) or die ("Error al eliminar el registro: " .mysqli_error($conexionBD));

      //redirigir el programa al script html de captura de datos
      echo "
        <script type='text/javascript'>
				 window.location='shwDoctores.php'
				 </script>";
         break;

}
?>
