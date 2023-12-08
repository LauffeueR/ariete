<!--_Bruno_Aguiar_-_DSi_02_N_-_LowfirE_-_20230330
-->
<?php
	include 'dbconn.php';
	
	if (isset($_GET['action']) && $_GET['action'] == 'remove') {
		$rbai=$_GET['rbai'];
		$dbconn -> query ("DELETE FROM distalert WHERE `distalert`.`bairr` = '$rbai' AND `id_usu` = '".strtolower($_COOKIE['login'])."' ");
		header("Location: alerts.php");
		
		// https://pt.stackoverflow.com/questions/4251/erro-cannot-modify-header-information-headers-already-sent
	}
?>
	