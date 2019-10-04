<html>
<head>
<title></title>
</head>


<script type = 'text/javascript'>
function fechas(){
  document.getElementById('frmFechas').submit();
  alert($fecha1);
  alert($fecha2);
  window.location = '/Medico/php/Pacientes/shwPacientesFecha.php';
}
</script>

	<form name='frmFechas' id='frmFechas' action='shwPacientesFecha.php' method='POST'>
    <table align='center' width='430'>
      <tr height='100'>
        <td colspan='2' align='center'>
          <input type='hidden' id='hdnOpc' name='hdnOpc'>
          <b>Organizar por fecha</b>
        </td>
      </tr>
      <tr>
        <td>Fecha 1</td>
        <td><input type='text' id='txtFecha1' name='txtFecha1' value='AAAA-MM-DD' style='color:grey; border: solid 1px #6E6E6E;'>
        </td>
      </tr>
      <tr>
        <td>Fecha 2</td>
        <td><input type='text' id='txtFecha2' name='txtFecha2' value='AAAA-MM-DD' style='color:grey; border: solid 1px #6E6E6E;'><br><br>
      </td>
      </tr>
      <br><br><br><br>
      <tr>
        <td colspan='2' align='center'>
        <input type='button' id='btnFecha' name='btnFecha' value='Aceptar' style='width:100px' onClick='fechas()'>
        </td>
      </tr>

    </table>
  </form>
  </body>
  <?php
  $fecha1 = $_POST['txtFecha1'];
  $fecha2 = $_POST['txtFecha2'];
  ?>
</html>
