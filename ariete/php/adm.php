<!--_Bruno_Aguiar_-_DSi_02_N_-_LowfirE_- 20230322
-->
<?php
	include 'dbconn.php';
	
	if (!isset($_COOKIE['login'])) {
		header("Location: ../index.php");
	}
	if ($_COOKIE['a'] < 1) {
		header("Location: ../index.php");
	}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<title>Admin area || ARIETE!</title>	
</head>
<?php
	include '../header.php';
?>
<link rel="stylesheet" type="text/css" href="../css/header.css" />
<body>
	<nav style="background-color: #4a1564; font-size: 25px; color: #ffffff;">
		Área administrativa || Sistema ARIETE!
	</nav>
	<br>
	<a href="../home.php">Voltar</a>
	<br><br>
	<a href="admusers.php">Usuários</a>
	<br>
	<a href="admcrimes.php">Crimes reportados</a>
	<br>
	<?php
		if($_COOKIE['a'] == 2){
			echo '<a href="admlog.php">Logs administrativos</a>';
		}
	?>

</body>
<?php
	include '../footer.php';
?>
<link rel="stylesheet" type="text/css" href="../css/footer.css" />
</html>