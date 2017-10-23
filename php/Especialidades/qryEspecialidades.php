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
    $clave = $_POST['txtClave'];
    $nombre = $_POST['txtNombre'];
    $qry = "INSERT INTO Especialidad (clave, nombre) VALUES ('$clave', '$nombre')";
    //ejecutar el query
    $resultado = mysqli_query($conexionBD, $qry) or die ("Error al inertar el registro: " .mysqli_error($conexionBD));
    //redirigir el programa al script html de captura de datos
    echo "<script type='text/javascript'>
		 window.location='updEspecialidades.php?id=noId'
		 </script>";
    	break;

  //grabar modificar
  case('modificar'):
    //construir el query para modificar en la tabla de la bd
    $id = $_POST['hdnId'];
    $clave = $_POST['txtClave'];
    $nombre = $_POST['txtNombre'];
    $qry = "UPDATE Especialidad SET clave='$clave', nombre='$nombre' WHERE id='$id'";
    //ejecutar el query
    $resultado = mysqli_query($conexionBD, $qry) or die("Error al modificar el registro: " .mysqli_error($conexionBD));

    //redirigir el programa al script html de captura de datos
    echo "
      <script type/javascript>window.location='shwEspecialidades.php'</script> ";
      break;

    //opcion de eliminar
    case('eliminar'):
      //construir el query para eliminar en la tabla de la bd
      $id = $_POST['hdnId'];
      $qry = "DELETE FROM Especialidad WHERE id=$id";
      //ejecutar el query
      $resultado = mysqli_query($conexionBD, $qry) or die ("Error al eliminar el registro: " .mysqli_error($conexionBD));

      //redirigir el programa al script html de captura de datos
      echo "
        <script type='text/javascript'>
				 window.location='shwEspecialidades.php'
				 </script>";
         break;

}
?>
