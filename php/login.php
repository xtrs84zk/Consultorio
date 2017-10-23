<?php
session_start();
//Conectar al servidor BD
$connect = mysqli_connect("localhost", "root", "root", "loginMed");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//Definir variables del html
if (isset($_POST['txtUsr'])) {
    $usr = $_POST['txtUsr'];
}
if (isset($_POST['txtPwd'])) {
    $pwd = $_POST['txtPwd'];
}
//Query
$query = mysqli_query($connect, "SELECT * FROM user WHERE name='$usr' and password='$pwd'");

//Numero de rows del query
$rows = mysqli_num_rows($query);

//Confirmaicon si rows = 1 entonces location
if ($rows == 1) {
  $_SESSION['user'] = $usr;
  header('location:menu.php');
}
else {
  echo "<html>
        <h1>Usuario y/o contraseña incorrectos.</h1>
        </html>";
}
?>
