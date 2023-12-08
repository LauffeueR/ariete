<!-- Bruno_Aguiar-DSi_02_N-LowfirE-20230313
-->

<?php
	//include "php/dbconn.php";
	unset($_COOKIE['idusu']);
	setcookie('idusu', '', time() - 3600, '/');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="css/newreg.css">

	<title>Registrar novo usuário - ARIETE!</title>
</head>

<?php
	include 'header.php';
?>

<body onLoad="checkPhone(); checkCphone();">

<div id="contform" class="contform">
	<h2>
		Cadastro no sistema Ariete!
	</h2>
	<form method="post" name="formSend" id="formSend" class="formSend" action="php/newreg2.php">
		
		
		<div id="infsysari" class="infsysari">
			<div id="loginepassw">
				<label for="login">Nome do login</label>
				<input type="text" name="login" id="login" placeholder="Login">
				<span id="loginmsg"></span>
				<label for="passw">Senha</label>
				<input type="password" name="passw" id="passw" placeholder="Senha" onBlur="cPasswo();">
				<span id="cpasswmsg"></span>
				<label for="cpassw">Confirme a senha</label>
				<input type="password" name="cpassw" id="cpassw" placeholder="Confirme a senha" onBlur="cPassw();" onPaste="return false" onDrop="return false">
				<span id="cpassmsg"></span>
			</div>
			<div id="infusuar">
				<label for="name">Nome do usuário</label>
				<input type="text" name="name" id="name" placeholder="Nome" maxlength="40">
				<label for="email">Email</label>
				<input type="email" name="email" id="email" placeholder="Email" onBlur="checkEmail();">
				<span id="cemsg1" class="textleft"></span>
				<label for="cemail">Confirmar email</label>
				<input type="email" name="cemail" id="cemail" placeholder="Confirmar email" onBlur="cEmail();" onPaste="return false" onDrop="return false">
				<span id="cemsg"></span>
				<label for="phone">Celular</label>
				<input type="text" name="phone" id="phone" placeholder="Celular" maxlength="11">
				<span id="phonemsg"></span>
				<label for="cphone">Confirmar celular</label>
				<input type="text" name="cphone" id="cphone" placeholder="Confirmar celular" maxlength="11" onBlur="cPhones();" onPaste="return false" onDrop="return false">
				<span id="cphonemsg"></span>
			</div>
		</div>
		
		<div id="resetsend" class="bordering">
			<span id="sendregmsg"></span>
			<input type="reset" value="Limpar todos os dados"/>
			<input type="submit" name="submit" id="cadast" value="Próximo" onClick="sendReg(); return false;" onMouseOver="cPhones();"/>
		</div>
	</form>
</div>

	<script src="js/newreg.js" defer></script>
</body>

<?php
	include 'footer.php';
?>	

</html>
