<!--_Bruno_Aguiar_-_DSi_02_N_-_LowfirE_- 20230323
-->
<?php
	include 'dbconn.php';
	
	$id_usu_del = $_GET['id_usu_del'];
	
	if ($_COOKIE['login'] == $id_usu_del) {
		echo '<br>Você não pode se apagar aqui, seu idiota!';
		echo '<br>Voltar: <a href="admusers.php">admusers.php</a>';
		die;
	} else {
		try {
			$logcon = $dbconn->query("SELECT * FROM `userinfo` WHERE `userinfo`.`id_usu` = $id_usu_del ");
			$logrow = mysqli_fetch_array($logcon);
		
			$dbconn -> query ("INSERT INTO `logadm`(`id_lad`,`logdt`,`id_adm`,`logadminfo`) VALUES ('NULL',NOW(), '".strtolower($_COOKIE['login'])."' ,'Usuário excluído: id: (".strtolower($logrow['id_usu'])."), nome:(".strtolower($logrow['name']).") data do cadastro: (".strtolower($logrow['rdate'])."), antecedente: (".strtolower($logrow['u']).")  ' )");
		
			$dbconn -> query ("DELETE FROM `userinfocrim` WHERE `userinfocrim`.`id_usu` = $id_usu_del ");
			$dbconn -> query ("DELETE FROM `userinfo` WHERE `userinfo`.`id_usu` = $id_usu_del ");
			
			header ("Location: admusers.php");
		
		} catch (Exception $e) {
			echo '<br>Erro! >> '.mysqli_error($dbconn);
			echo '<br>Voltar: <a href="admusers.php">admusers.php</a>';
		};
		
	};
?>
