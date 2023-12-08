<?php
	include "dbconn.php";
	error_reporting(0);
	
	try {
		if(isset($_POST['submit'])){
			$login = $_POST['login'];
			$passw = md5($_POST['passw']);
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			// $loginsenha = (md5($_POST['login']))+(md5($_POST['passw']))+(md5($_POST['login']));
			
			// cria a entrada na primeira tabela
			$dbconn -> query ("INSERT INTO `userinfo`(`id_usu`,`login`,`passw`,`name`,`email`,`phone`,`rdate`,`adm`)
			VALUES ('NULL','$login','$passw','$name','$email','$phone',CURDATE(),NULL)");
			
			// pega o id do usuário na primeira tabela
			$row = mysqli_fetch_assoc($dbconn -> query ("SELECT `id_usu` FROM `userinfo` WHERE `login`='$login' LIMIT 1"));
			$id_usu = $row['id_usu'];

			// coloca o id do usuário na foreign key da tabela de antecedentes criminais
			$dbconn -> query ("INSERT INTO `userinfocrim`
			(`id_cri`,`id_usu`,`namec`,`moth`,`fath`,`nation`,`naturali`,`statnat`,`ident`,`issuer`,`statiss`,`passp`,`passps`,`birth`,`cpf`)
			VALUES
			($id_usu,$id_usu,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)");
			
			setcookie("idusu", $id_usu, time() + (86400 * 30), "/"); // 86400 = 1 day
			header("Location: ../newregcrim.php");
		}
		
	} catch (Exception $e) {
		$dbconn -> query ("DELETE FROM `userinfocrim` WHERE `userinfocrim`.`id_usu` = '".strtolower($_COOKIE['idusu'])."' ");
		$dbconn -> query ("DELETE FROM `userinfo` WHERE `userinfo`.`id_usu` = '".strtolower($_COOKIE['idusu'])."'");
		unset($_COOKIE['idusu']);
		setcookie('idusu', '', time() - 3600, '/');
		echo '<br>Nome de Login, Email ou Telefone já cadastrado. <a href="../index.php">index.php</a> <a href="../newreg.php">newreg.php</a><br>';
		echo '<br>Falha ao cadastrar! ~> '.mysqli_error($dbconn);
	};

?>

