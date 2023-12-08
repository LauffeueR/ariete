<?php
	include "dbconn.php";
	error_reporting(0);
	

	if (!isset($_COOKIE['idusu'])) {
		header("Location: ../index.php");
		die;
	}
	
	try {
		$idusu = $_COOKIE['idusu'];
	
		if(isset($_POST['submitgo'])){ // submitgo = name do submit
			
			$namec = $_POST['namec'];
			$moth = $_POST['moth'];
			$fath = $_POST['fath'];
			$nation = $_POST['nation'];
			$naturali = $_POST['naturali'];
			$statnat = $_POST['statnat'];
			$ident = $_POST['ident'];
			$issuer = $_POST['issuer'];
			$statiss = $_POST['statiss'];
			$passp = $_POST['passp'];
			$passps = $_POST['passps'];
			$birth = $_POST['birth'];
			$cpf = $_POST['cpf'];
			
			$dbconn -> query ("UPDATE `userinfocrim` SET
			`namec` = '$namec',
			`moth` = '$moth',
			`fath` = '$fath',
			`nation` = '$nation',
			`naturali` = '$naturali',
			`statnat` = '$statnat',
			`ident` = '$ident',
			`issuer` = '$issuer',
			`statiss` = '$statiss',
			`passp` = '$passp',
			`passps` = '$passps',
			`birth` = '$birth',
			`cpf` = '$cpf'
			WHERE `userinfocrim`.`id_usu` = $idusu");
			
			unset($_COOKIE['idusu']);
			setcookie('idusu', '', time() - 3600, '/');
			
			header("Location: ../index.php?msg=Usuário cadastrado. Informações de antecedentes criminais em análise! Entre no sistema usando o login e a senha cadastrados.");
		}
		
		if(isset($_POST['addlater'])){
			unset($_COOKIE['idusu']);
			setcookie('idusu', '', time() - 3600, '/');
			header("Location: ../index.php?msg=Usuário cadastrado, mas para ter acesso a todas as funcionalidades do sistema, é necessário enviar as informações para a averiguação dos antecedentes criminais! Você pode entrar no sistema usando o login e a senha cadastrados.");
		}
		
	} catch (Exception $e) {
		$dbconn -> query ("DELETE FROM userinfocrim WHERE `userinfocrim`.`id_usu` = '".strtolower($_COOKIE['idusu'])."' ");
		$dbconn -> query ("DELETE FROM userinfo WHERE `userinfo`.`id_usu` = '".strtolower($_COOKIE['idusu'])."' ");
		unset($_COOKIE['idusu']);
		setcookie('idusu', '', time() - 3600, '/');
		echo '<br>CPF já cadastrado.<a href="../index.php">index.php</a>';
		echo '<br>Falha ao cadastrar! ~> '.mysqli_error($dbconn);
	}
	
?>