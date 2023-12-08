<?php
	include "dbconn.php";
	
	session_start();

	$login = $_POST['logg'];
	$passw =  md5($_POST['loggpass']);

	//if (strpos($login, "@")) {
	if (strtolower($login)) {
		$con = $dbconn->query("SELECT * FROM `userinfo` WHERE `login` = '".strtolower($login)."' ");
		$row = mysqli_fetch_array($con);
		if ($row == NULL) {
			echo '<br>Informação de login inválida. (Não achou o login)';
		} else if ($row["login"] == strtolower($login)) {
			if ($passw == $row["passw"]) {
				//setcookie("token", "oko", time() + (86400 * 30), "/"); // 86400 = 1 day
				setcookie("login", $row['id_usu'], time() + (86400 * 30), "/");
				setcookie("u", $row['u'], time() + (86400 * 30), "/");
				setcookie("a", $row['adm'], time() + (86400 * 30), "/");
				header("Location: ../home.php");
			} else {
				echo '<br>Informação de login inválida. (Senha incorreta)';
			}
		}
	}
	/*
	else {
		$con = $conn->query("SELECT * FROM `usuarios_cd` WHERE cpf =  '".strtolower($email)."'");
		$row = mysqli_fetch_array($con);
		if ($row == NULL) {
			echo "Seu cpf está invalido";
		} else if ($row["cpf"] == strtolower($email)) {
			if ($pass == $row["pass"]) {
				setcookie("token", "oko", time() + (86400 * 30), "/"); // 86400 = 1 day
				setcookie("email", $row["email"], time() + (86400 * 30), "/"); // 86400 = 1 day
				header("Location: at.php");
			} else {
				echo "sua senha ou cpf esta invalida";
			}
		} 
	}
	*/



/*

51010140
https://stackoverflow.com/questions/28492069/login-using-base64-encodemd5login-pass-true


//.........................................................................................................................................


$statement = $db->prepare("SELECT password from user_master where 
  (email=:user or mobile=:user) and verified=1");
$statement->execute(array(':user'=>$user));

$output=$statement->fetchAll(PDO::FETCH_ASSOC);

$hashed_password=$output[0]["password"];


//.........................................................................................................................................


$user_entered_password="Test1234";

if(password_verify($user_entered_password,$hashed_password))
{
  
  //success
  
}else{
  
  //failed
  
}


//.........................................................................................................................................













*/
?>