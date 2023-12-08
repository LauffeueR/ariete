<!-- LauffeueR_-_20230313_0803
-->

<?php	
	if (isset($_COOKIE['login'])) {
		header("Location: ariete/home.php");
	}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ARIETE!</title>
	
	<link rel="icon" type="text/css" href="ariete/img/logoicon1.png" />
	<link rel="stylesheet" type="text/css" href="ariete/css/index.css" />
	<link rel="stylesheet" type="text/css" href="ariete/css/footer.css" />
</head>
<body>

	<div class="sloganTitulo">
		<img src="ariete/img/arieteSloganT.png">
	</div>
	
	<p>
		<?php
			if(isset($_GET['msg'])){
				$msg = $_GET['msg'];
				echo '
				<div class="avisoindex">
					'.$msg.'
				</div>';
			}
		?>
	</p>

	<div id="arealogin" class="arealogin">
		<form method="post" action="ariete/php/tologin.php" name="sendlog">		
			<div class="loglogBtn">
				<div class="logg">
					<label for="logg">
						Login
					</label>
					<input type="text" name="logg" id="logg"/>
					<span id="loggmsg"></span>
				</div>
				<div class="loggpass">
					<label for="loggpass">
						Senha
					</label>
					<input type="password" name="loggpass" id="loggpass"class="loggpass"/>
				</div>
				<div>
					<input type="submit" value="Entrar">
				</div>
			</div>
		</form>
		<div class="esqnov">
			<div class="forgot">
				<a href="ariete/forgot.php">Esqueci a senha</a>
			</div>
			<div class="newreg">
				<a href="ariete/newreg.php">Novo cadastro</a>
			</div>
		</div>
	</div>

	<section class="drkndx ligue">
		<img src="ariete/img/ip1.png">
		<h1>
			LIGUE PARA O 190
		</h1>
		<p>
			Antes de reportar qualquer crime no sistema Ariete!, denuncie antes para a autoridade pública competente ligando para o 190. No 190, você denuncia para a polícia, no Ariete! você informa o crime a sua comunidade.
		</p>
	</section>
	
	<div class="ip1">
		
	</div>
	
	<section class="drkndx objetivo">
		<img src="ariete/img/ip2.png">
		<h1>
			OBJETIVO
		</h1>
		<p>
			O objetivo é combater a crescente e aparentemente infinita criminalidade da nossa cidade, alertando sobre crimes que acabaram de acontecer.
		</p>
	</section>
	
	<div class="ip2">
		
	</div>
	
	<section class="drkndx funciona">
		<img src="ariete/img/ip3.png">
		<h1>
			COMO FUNCIONA
		</h1>
		<p>
			 Por meio de notificações, os usuários do aplicativo poderão saber sobre crimes que estão acontecendo ou que aconteceram próximo a sua localização, ou se aconteceu próximo a algum local salvo anteriormente pelo usuário.
		</p>
		<p>
			O usuário pode salvar locais para receber alertas sobre crimes que aconteceram próximos a esses determinados locais. O usuário receberia esses alertas sem a necessidade de estar próximos a esses locais.
		</p>
	</section>
	
	<div class="ip3">
		
	</div>

<?php
	include 'ariete/footer.php';
?>

	
	<!-- <script src="js/index.js" defer></script>
	-->
	<!-- <script src="renderer.js"></script>
	-->
</body>
</html>


