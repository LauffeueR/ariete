<!--_Bruno_Aguiar_-_DSi_02_N_-_LowfirE_- 20230315
-->

<?php
	include "php/dbconn.php";

	error_reporting(0);

	if (!isset($_COOKIE['login'])) {
		header("Location: index.php");
	}

	$con = $dbconn->query("SELECT * FROM `userinfo` WHERE id_usu =  '".strtolower($_COOKIE['login'])."'");
	$row = mysqli_fetch_array($con);
	
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<title>Área do usuário || ARIETE!</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	
	<link rel="stylesheet" type="text/css" href="css/home.css" />
	<script src="js/home.js" defer></script>
</head>

<?php
	include 'header.php';
?>

<body>

	<div id="zonelog">
		<div id="leftopt" class="bordering">
			
			<span>
				Bem vindo, <?php echo ''.$row["name"]; ?>.
				<a href="php/tologout.php">Sair</a>
			</span>
			<!-- pra abrir em uma nova guia:
			target="_blank"
			-->
			.<hr>
			<a href="php/crimes.php">Crimes reportados no sistema</a>
			<?php
				if ($row["u"] == 1) {
					echo '<a href="php/repcrime.php">REPORTAR CRIME</a>';
					echo '<a href="php/replist.php">Crimes reportados por mim</a>';
				}
			?>
			.<hr>
			<a href="php/useredit.php">Alterar configurações do usuário;</a>
			<a href="php/usereditcrim.php">Reenviar dados de averiguação de antecedentes criminais;</a>
			<a href="php/alerts.php">Configuração de alertas de crimes</a>
			<a href="">Participar do programa comunidade armada;</a>
			<?php
				if ($row["adm"] >= 1) {
					echo '<a href="php/adm.php">Área administrativa</a>';
				}
			?>
			
			
		</div>

		<div id="map" class="bordering">
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d16233.641082349106!2d-34.8903589586914!3d-8.0614631768635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1spt-BR!2sbr!4v1663024170377!5m2!1spt-BR!2sbr"
		width="1010" height="715" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
		</iframe>
		</div>
	
	</div>


</body>

<?php
	include 'footer.php';
?>


</html>

<style>
* {
	margin: 0;
	padding: 0;
	/* box-sizing: border-box; */
	/* text-align: center; */
	/* align-items: center; */
	/* justify-content: center; */
	/* justifica as labels */
}



#zonelog {
	padding:15px;
	display:flex;
}

#map {
	padding:10px;
}

#leftopt {
	margin-right:5px;
	padding:15px;
	display: flex;
	flex-direction: column;
	float: left;
	height: 0 auto;
	width: 180px;
}

#leftopt a {
	margin-top: 15px;
}


</style>


