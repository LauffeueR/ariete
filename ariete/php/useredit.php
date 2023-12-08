<!-- ARIETE_Bruno_Aguiar_-_DSi_02_N_-_LowfirE_-_20230317
-->

<?php
	include "dbconn.php";
	error_reporting(0);
	
	if (!isset($_COOKIE['login'])) {
		header("Location: ../index.php");
	}
	
	$con = $dbconn->query("SELECT * FROM `userinfo` WHERE id_usu = '".strtolower($_COOKIE['login'])."'");
	$row = mysqli_fetch_array($con);
	$id_usu = $row['id_usu'];
	
	try {
		
		if(isset($_POST['useredit'])){
			
			if(!empty($_POST['login1'])){
				$login = $_POST['login1'];
				$dbconn -> query ("UPDATE `userinfo` SET `login` = '$login' WHERE `userinfo`.`id_usu` = $id_usu");
			}
			
			if(!empty($_POST['passw1'])){
				$passw = md5($_POST['passw1']);
				$dbconn -> query ("UPDATE `userinfo` SET `passw` = '$passw' WHERE `userinfo`.`id_usu` = $id_usu");
			}
			
			if(!empty($_POST['email1'])){
				$email = $_POST['email1'];
				$dbconn -> query ("UPDATE `userinfo` SET `email` = '$email' WHERE `userinfo`.`id_usu` = $id_usu");
			}
			
			if(!empty($_POST['phone1'])){
				$phone = $_POST['phone1'];
				$dbconn -> query ("UPDATE `userinfo` SET `phone` = '$phone' WHERE `userinfo`.`id_usu` = $id_usu");
			}
			
			header ("Location: ../home.php");
		}
		
		if(isset($_POST['vanish'])){
			
			$dbconn -> query ("DELETE FROM userinfocrim WHERE `userinfocrim`.`id_usu` = '".strtolower($_COOKIE['login'])."'");
			$dbconn -> query ("DELETE FROM userinfo WHERE `userinfo`.`id_usu` = '".strtolower($_COOKIE['login'])."'");
			header ("Location: tologout.php");
		}
		
	} catch (Exception $e) {
		echo '<br>Login, telefone ou email já cadastrados.';
		echo '<br>Falha ao cadastrar! ~> '.mysqli_error($dbconn);
	}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<title>Alterar configurações || ARIETE!</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="css/estilocss.css" />
	<script src="js/Javaroteiro.js" defer></script>
</head>

<body>

<?php
	include '../header.php';
?>
<link rel="stylesheet" type="text/css" href="../css/header.css" />
		
<div class="bordering center">

	<form method="post" name="configForm" id="configForm" class="configForm" >
		
		<h3>Alterar configurações de usuário:</h3>
		
		<!-- TEM QUE COLOCAR OS NAMES IGUAIS AOS IDS -->

		<label for="name">Nome do usuário</label>
		<input type="text" id="name" value="<?php echo ''.$row["name"]; ?>" maxlength="40" disabled>
		<br><br>
		<label for="email0">Email atual</label>
		<input type="email" id="email0" value="<?php echo ''.$row["email"]; ?>" disabled>
		
		<label for="email1">Novo email</label>
		<input type="email" id="email1" name="email1" placeholder="Novo email">
		
		<label for="email2">Confirmar novo email</label>
		<input type="email" id="email2" placeholder="Confirmar novo email">
		
		<hr>
		
		<label for="phone0">Celular atual</label>
		<input type="text" id="phone0" value="<?php echo ''.$row["phone"]; ?>" maxlength="11" disabled>
		
		<label for="phone1">Novo celular</label>
		<input type="text" id="phone1" name="phone1" placeholder="Novo celular" maxlength="11">
		<span id="phonemsg"></span>
		
		<label for="phone2">Confirmar novo celular</label>
		<input type="text" id="phone2" placeholder="Confirmar novo celular" maxlength="11">
		<span id="cphonemsg"></span>
		
		<hr>
		
		<label for="login0">Login atual</label>
		<input type="text" id="login0" value="<?php echo ''.$row["login"]; ?>" disabled>
		
		<label for="login1">Novo login</label>
		<input type="text" id="login1" name="login1" placeholder="Novo login">
		
		<hr>
		
		<label for="passw0">Senha atual</label>
		<input type="password" id="passw0" value="<?php echo ''.$row["passw"]; ?>" disabled>
		
		<label for="passw1">Nova senha</label>
		<input type="password" id="passw1" name="passw1" placeholder="Nova senha">
		
		<label for="passw2">Confirmar nova senha</label>
		<input type="password" id="passw2" placeholder="Confirmar nova senha">

		<hr>
		
		<input type="reset" value="Limpar todos os dados">
		<input type="submit" name="useredit" id="register" value="Salvar" onclick="saveConfig(); return false">
		<a href="../home.php">Voltar</a>
		<br>
		
		<input type="submit" name="vanish" value="Excluir usuário" onclick="return confirm('Tem certeza que deseja excluir o usuário?\n\tEssa ação é IRREVERSÍVEL!');">
		
	</form>
	<!--
	<button onclick="userVanish()">Excluir usuário</button>
	-->
	
	

</div>
</body>

<?php
	include '../footer.php';
?>
<link rel="stylesheet" type="text/css" href="../css/footer.css" />

</html>
