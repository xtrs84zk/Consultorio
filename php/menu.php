<?php
	session_start();
	if(empty($_SESSION['user'])){
		echo "Debe autentificarse";
	}
?>

<html>
<frameset rows="36%,*">
	<frame src="/Medico/html/banner.html" noresize="noresize" scrolling="no">
	<frameset cols="15%,60%">
		<frame src="menuopciones.php" noresize="noresize" scrolling="no">
		<frame src="/Medico/html/nada.html" noresize="noresize" scrolling="no">
	</frameset>
</frameset>
</html>
