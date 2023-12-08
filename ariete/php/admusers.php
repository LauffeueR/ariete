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

<body>

	<a href="adm.php">Voltar</a>
		
	<table border="3">
		<thead>
			<th scope="col" colspan="8">Usuários cadastrados no sistema</th>
			<tr>
				<!--1--><th scope="col">id_usu</th>
				<!--2--><th scope="col">login</th> 
				<!--3--><th scope="col">name</th>   
				<!--4--><th scope="col">email</th> 
				<!--5--><th scope="col">phone</th> 
				<!--6--><th scope="col">Ações:</th>
			</tr>
		</thead>
		<tbody>
			<?php
				/*
				$sql = "SELECT * FROM `userinfo`";
				$result = mysqli_query($dbconn, $sql);
				while ($row = mysqli_fetch_assoc($result)) {
				*/
				$result = $dbconn -> query("SELECT * FROM `userinfo` ");
				while ($row = mysqli_fetch_assoc($result)) {
			?>
					<tr><?php /* if (($row['adm']) >= 1) { $Nao_mostre_nada=0; } else { */ ?>
						<!--1--><td><?php echo $row['id_usu']; ?></td> 
						<!--2--><td><?php echo $row['login']; ?></td>  
						<!--3--><td><?php echo $row['name']; ?></td>
						<!--4--><td><?php echo $row['email']; ?></td>  
						<!--5--><td><?php echo $row['phone']; ?></td>  
						<!--6--><td><a href="admusuv.php?uvid=<?php echo $row['id_usu']; ?>" >Visualizar dados de usuário</a>
						</td> 
					</tr>
			<?php
					/*
					}
					*/
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