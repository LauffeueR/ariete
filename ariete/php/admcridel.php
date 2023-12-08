<!--_Bruno_Aguiar_-_DSi_02_N_-_LowfirE_- 20230323
-->
<?php
	include 'dbconn.php';
	
	$idrepdel = $_GET['idrepdel'];
	
	try {
		$logcon = $dbconn->query("SELECT * FROM `crimereport` WHERE `crimereport`.`id_rep` = $idrepdel ");
		$logrow = mysqli_fetch_array($logcon);
		
		// $dbconn -> query ("INSERT INTO `logadm`(`id_lad`,`logdt`,`id_adm`,`logadminfo`) VALUES ('NULL',NOW(), '".strtolower($_COOKIE['login'])."' ,'Deletado crime reportado pelo usuário: (".strtolower($logrow['id_usu'])."), na data: (".strtolower($logrow['dtime'])."), com as seguintes informações: (".strtolower($logrow['addinfo'])."), criminoso: (".strtolower($logrow['criminal'])."), crime: (".strtolower($logrow['crimetype'])."), no bairro: (".strtolower($logrow['distr']).")  ' )");
		
		//$dbconn -> query ("INSERT INTO `logadm`(`id_lad`,`logdt`,`id_adm`,`logadminfo`) VALUES ('NULL',NOW(), '".strtolower($_COOKIE['login'])."' ,'VALORES QUE SERIAM ADICIONADOS' )");
		
		//$dbconn -> query ("DELETE FROM `crimereport` WHERE `crimereport`.`id_rep` = $idrepdel ");
		header ("Location: admcrimes.php");
	
	} catch (Exception $e) {
		echo '<br>Erro! >> '.mysqli_error($dbconn);
		echo '<br>Voltar: <a href="admcrimes.php">admcrimes.php</a>';
	};
?>
