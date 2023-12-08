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
    
	<title>Admin area || crimes</title>	
</head>
<?php
	include '../header.php';
?>
<link rel="stylesheet" type="text/css" href="../css/header.css" />
<body>
	<a href="adm.php">Voltar</a>
	<br><br>
	<table border="3">
		<thead>
			<th scope="col" colspan="8">Crimes reportados no sistema</th>
			<tr>
				<!--1--><th scope="col">id_rep</th>
				<!--2--><th scope="col">id_usu</th> 
				<!--3--><th scope="col">bairro</th> 
				<!--4--><th scope="col">tipo do crime</th>  
				<!--5--><th scope="col">criminoso</th> 
				<!--6--><th scope="col">informações</th> 
				<!--7--><th scope="col">data e hora<br>a-m-d h:m:s</th>   
				<!--8--><th scope="col">Ações:</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$result = $dbconn -> query("SELECT * FROM `crimereport` ORDER BY `crimereport`.`dtime` DESC");
				while ($row = mysqli_fetch_assoc($result)) {
			?>
				<tr>
					<!--1--><td><?php echo $row['id_rep'] ?></td> 
					<!--2--><td><?php echo $row['id_usu'] ?></td>  
					<!--3--><td><?php echo $row['distr'] ?></td>
					<!--4--><td><?php echo $row['crimetype'] ?></td>
					<!--5--><td><?php echo $row['criminal'] ?></td>  
					<!--6--><td><?php echo $row['addinfo'] ?></td>  
					<!--7--><td><?php echo $row['dtime'] ?></td>    
					<!--8--><td>
						<a href="admcriv.php?idrepv=<?php echo $row['id_rep']?>&idusuv=<?php echo $row['id_usu']?>">
						Visualizar e editar esse crime
						</a>
						<br>
						<?php /*
						<a href="admcridel.php?idrepdel=<?php echo $row['id_rep']?>" onclick="return confirm('Tem certeza?\n\tAÇÃO IRREVERSÍVEL!');">
						Excluir esse crime
						</a>
						<br>
						*/ ?>
						<a href="admcridist.php?distr=<?php echo $row['distr']?>" >
						Mostrar todos os crimes desse bairro
						</a>
					</td> 
				</tr>
			<?php
				} //endwhile
			?>
		</tbody>
	</table>
	
</body>
<?php
	include '../footer.php';
?>
<link rel="stylesheet" type="text/css" href="../css/footer.css" />
</html>