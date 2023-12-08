<!--_Bruno_Aguiar_-_DSi_02_N_-_LowfirE_- 20230412
-->
<?php
	include 'dbconn.php';
	
	if (!isset($_COOKIE['login'])) {
		header("Location: ../index.php");
	}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<title>Crimes reportados</title>	
</head>
<?php
	include '../header.php';
?>
<link rel="stylesheet" type="text/css" href="../css/header.css" />
<body>
	<a href="../home.php">Voltar</a>
	<br><br>
	<table border="3">
		<thead>
			<th scope="col" colspan="8">Últimos crimes reportados pelos usuários:</th>
			<tr>
				<!--1--><th scope="col">bairro</th> 
				<!--2--><th scope="col">tipo do crime</th>  
				<!--3--><th scope="col">criminoso</th> 
				<!--4--><th scope="col">informações</th> 
				<!--5--><th scope="col">data e hora<br>a-m-d h:m:s</th>
				<!--6--><th scope="col">usuário cadastrado desde</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$rou = mysqli_fetch_assoc($dbconn -> query ("SELECT `u` FROM `userinfo` WHERE `id_usu`= '".strtolower($_COOKIE['login'])."' "));
				
				if($rou['u'] == 1){
					$result = $dbconn -> query("SELECT * FROM `crimereport` ORDER BY `crimereport`.`dtime` DESC");
				} else {
					$result = $dbconn -> query("SELECT * FROM `crimereport` WHERE `crimereport`.`dtime` < NOW() - INTERVAL 24 HOUR ORDER BY `crimereport`.`dtime` DESC");
				}
				while ($row = mysqli_fetch_assoc($result)) {
			?>
					<tr>
						<!--1--><td><?php echo $row['distr']; ?></td> 
						<!--2--><td><?php echo $row['crimetype']; ?></td>  
						<!--3--><td><?php echo $row['criminal']; ?></td> 
						<!--4--><td><?php echo $row['addinfo']; ?></td>  
						<!--5--><td><?php echo $row['dtime']; ?></td>     
						<!--6--><td><?php $result2 = $dbconn -> query("SELECT `rdate` FROM `userinfo` WHERE `id_usu`= '".strtolower($row['id_usu'])."' "); $row2 = mysqli_fetch_assoc($result2); if(!empty($row2['rdate'])){ echo ''.$row2['rdate']; } else { }; ?></td>
					</tr>
			<?php
				}
			?>
		</tbody>
	</table>
	
</body>
<?php
	include '../footer.php';
?>
<link rel="stylesheet" type="text/css" href="../css/footer.css" />
</html>