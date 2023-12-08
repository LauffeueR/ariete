<!--_Bruno_Aguiar_-_DSi_02_N_-_LowfirE_- 20230322
-->
<?php
	include 'dbconn.php';
	
	if (!isset($_COOKIE['login'])) {
		header("Location: ../index.php");
	}
	if ($_COOKIE['u'] != 1) {
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
		<a href="javascript:history.back()">Go Back</a>
	<table border="3">
		<thead>
			<th scope="col" colspan="5">Lista de crimes reportados</th>
			<tr>
				<!--1--><th scope="col">Dia e hora do crime:</th>
				<!--2--><th scope="col">Bairro:</th> 
				<!--3--><th scope="col">Tipo do crime:</th> 
				<!--4--><th scope="col">Criminoso estava:</th>  
				<!--5--><th scope="col">Comentário:</th> 
			</tr>
		</thead>
		<tbody>
			<?php
				$result = $dbconn -> query("SELECT * FROM `crimereport` WHERE id_usu = '".strtolower($_COOKIE['login'])."' ");
				while ($row = mysqli_fetch_assoc($result)) {
					$date = new DateTime($row['dtime']);
			?>
				<tr>
					<!--1--><td><?php echo $date->format('d/M/Y H:i:s'); ?></td> 
					<!--2--><td><?php echo $row['distr']; ?></td>  
					<!--3--><td><?php echo $row['crimetype']; ?></td>
					<!--4--><td><?php echo $row['criminal']; ?></td>  
					<!--5--><td><?php echo $row['addinfo']; ?></td>
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