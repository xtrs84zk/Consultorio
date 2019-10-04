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


$id_diag = $_POST['DiagId'];

switch ($opcion)
{
  //opcion grabar


  //grabar modificar
  case('modificar'):
    //construir el query para modificar en la tabla de la bd


		$receta = $_POST['txtReceta'];
    $qry = "UPDATE diagnostico SET receta='$receta' WHERE id_diagnostico='$id_diag'";
    //ejecutar el query
    $resultado = mysqli_query($conexionBD, $qry) or die("Error al modificar el registro: " .mysqli_error($conexionBD));

    echo "
          <script type='text/javascript'>
  				 window.location='shwCitas.php'
  				 </script>";
           break;
    //redirigir el programa al script html de captura de datos


    //opcion de elimina

}
?>
