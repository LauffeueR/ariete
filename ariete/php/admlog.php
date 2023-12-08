<!--_Bruno_Aguiar_-_DSi_02_N_-_LowfirE_- 20230428
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
    
	<title>Admin Logs</title>	
</head>
<?php
	include '../header.php';
?>
<link rel="stylesheet" type="text/css" href="../css/header.css" />
<body>
	<a href="adm.php">Voltar</a>
	<br><br>
	<div style="margin:50px;">
	<?php
		$result = $dbconn -> query("SELECT * FROM `logadm` ORDER BY `logadm`.`id_lad` DESC");
		while ($row = mysqli_fetch_assoc($result)): 
	?>
			<div style="border:1px solid;margin:1px;padding:5px;">
			<?php echo 'Id: '.$row['id_lad'].' — Data: '.$row['logdt'].' | Mod/Adm: <a href="admusuv.php?uvid='.$row['id_adm'].'" style="text-decoration:none;"><b>'.$row['id_adm'].'</b></a> | info: '.$row['logadminfo'].'<br>'; ?>
			</div>
	<?php
		endwhile;
	?>
	</div>
		
</body>
<?php
	include '../footer.php';
?>
<link rel="stylesheet" type="text/css" href="../css/footer.css" />
</html>