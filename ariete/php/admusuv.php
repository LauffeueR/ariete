<!--_Bruno_Aguiar_-_DSi_02_N_-_LowfirE_- 20230323
-->
<?php
	include 'dbconn.php';
	error_reporting(0);
	
	if (!isset($_COOKIE['login'])) {
		header("Location: ../index.php");
	}
	if ($_COOKIE['a'] < 1) {
		header("Location: ../index.php");
	}
	
	$uvid = $_GET['uvid'];
	$con = $dbconn->query("SELECT * FROM `userinfo`,`userinfocrim` WHERE `userinfo`.`id_usu` = $uvid AND `userinfocrim`.`id_usu` = $uvid");
	$row = mysqli_fetch_array($con);
	
	if ($_COOKIE['login'] == $uvid) {
		echo '<br>Você não pode se ver aqui, seu idiota!';
		echo '<br>Voltar: <a href="admusers.php">admusers.php</a>';
		die;
	} elseif ($row['adm'] >= 1) {
		if ($_COOKIE['a'] >= 2) {
			
		} else {
			echo '<br>Você não pode ver os dados de outros moderadores.';
			echo '<br>Voltar: <a href="admusers.php">admusers.php</a>';
			die;
		}
	};
	
	
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<title>Visualizar usuário: <?php echo ''.$row["name"]?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="css/estilocss.css" />
	<script src="js/Javaroteiro.js" defer></script>
</head>

<body>
	<h3>Informações necessárias para pesquisa dos antecedentes criminais:</h3>
	<h4>(<a href="https://antecedentes.dpf.gov.br/antecedentes-criminais/certidao">https://antecedentes.dpf.gov.br/antecedentes-criminais/certidao</a>)</h4>
	<br>
	Voltar: <a href="admusers.php">adm.php</a>

	<h3>Visualizar usuário: <?php echo ''.$row["name"]?>
	<br>id do usuário: <?php echo ''.$row["id_usu"]?></h3>

	Nome do usuário: <?php echo ''.$row["name"]; ?>
	<br>
	Email: <?php echo ''.$row["email"]; ?>
	<br>
	Telefone: <?php echo ''.$row["phone"]; ?>
	<br><hr>
	Login do usuário: <?php echo ''.$row["login"]; ?>
	<br>
	Data do cadastro: <?php echo ''.$row["rdate"]; ?>
	<br><hr><br>
	Informações para antecedentes criminais
	<br><br>
	Nome completo: <?php echo ''.$row["namec"]; ?>
	<br>
	Nome da mãe: <?php echo ''.$row["moth"]; ?>
	<br>
	Nome do pai: <?php echo ''.$row["fath"]; ?>
	<br>
	Nacionalidade: <?php echo ''.$row["nation"]; ?>
	<br>
	Naturalidade: <?php echo ''.$row["naturali"]; ?> / <?php echo ''.$row["statnat"]; ?>
	<br>
	Identidade: <?php echo ''.$row["ident"]; ?>
	<br>
	Órgão emissor: <?php echo ''.$row["issuer"]; ?> / <?php echo ''.$row["statiss"]; ?>
	<br>
	Número do passaporte: <?php echo ''.$row["passp"]; ?>
	<br>
	Série do passaporte: <?php echo ''.$row["passps"]; ?>
	<br>
	Data de nascimento:
	<?php
		//if(!empty($row['birth'])){
		if($row['birth']){
			$birth = new DateTime($row['birth']);
			echo ''.$birth->format('d/M/Y');
			$dbirth = $row["birth"];
			$today = date("Y-m-d");
			$diff = date_diff(date_create($dbirth), date_create($today));
			echo ' | Idade: '.$diff->format('%y').' anos.';
		} else {
			
		};
	?>
	<br>
	CPF: <?php echo ''.$row["cpf"]; ?>
	<br><br>
	Classifique o usuário:
	<br>
	<form method="post">
		<input type="radio" id="apt" name="u" value="1" <?php if($row["u"] == 1){ echo 'checked disabled';} elseif($row["u"] == 2){ echo 'disabled';};?>>
		<label for="apt">Apto a usar o sistema (<b>NÃO POSSUI</b> antecedentes criminais)</label>
		<br>
		<input type="radio" id="ina" name="u" value="2" <?php if($row["u"] == 2){ echo 'checked disabled';} elseif($row["u"] == 1){ echo 'disabled';};?>>
		<label for="ina">Inapto a usar o sistema (<b>POSSUI</b> antecedentes criminais)</label>
		<br>
		<input type="submit" name="ant" value="Salvar" <?php if($row["u"] == 1 or $row["u"] == 2){ echo 'disabled';}; ?>>
	</form>
	<?php
		try {
			if(isset($_POST['ant'])){
				$u = $_POST['u'];
				
				if($u == 1){
					$cond = 'APTO';
				} else {
					$cond='INAPTO';
				}
				
				$dbconn -> query ("INSERT INTO `logadm`(`id_lad`,`logdt`,`id_adm`,`logadminfo`) VALUES ('NULL',NOW(), '".strtolower($_COOKIE['login'])."' ,'Classificou o usuário: id: (".strtolower($row['id_usu'])."), nome:(".strtolower($row['name']).") data do cadastro: (".strtolower($row['rdate'])."), como ($u)$cond a usar o sistema.' )");
		
				$dbconn -> query ("UPDATE `userinfo` SET `u` = '$u' WHERE `userinfo`.`id_usu` = $uvid");
				header("Refresh:0");
			};
		} catch (Exception $e) {
			/*
			unset($_COOKIE['idusu']);
			setcookie('idusu', '', time() - 3600, '/');
			echo '<br>Nome de Login, Email ou Telefone já cadastrado. <a href="../index.php">index.php</a> <a href="../newreg.php">newreg.php</a><br>';
			echo '<br>Falha ao cadastrar! ~> '.mysqli_error($dbconn);
			*/
		};
	?>
	<br>
	Voltar: <a href="admusers.php">adm.php</a>
	<br><br>
	<a href="admusudel.php?id_usu_del=<?php echo $uvid; ?>" onclick="return confirm('Tem certeza que quer apagar esse usuário?\n\tAÇÃO IRREVERSÍVEL!');">
	Apagar usuário
	</a>
	<br><br>
	<?php
		if ($_COOKIE['a'] >= 2) {
			echo '
				<form method="post">
					Tipo de usuário:<br>
					0 - comum;<br>
					1 - moderador;<br>
					2 - administrador.<br>
					Tipo atual: '.$row["adm"].'<br>
					<input type="number" name="setadm" style="width: 45px;">
					<input type="submit" name="admsub">
				</form>
			';
			
			if(isset($_POST['admsub'])){
				
				$setadm = $_POST['setadm'];
				
				if($setadm=='1'){
					$dbconn -> query ("INSERT INTO `logadm`(`id_lad`,`logdt`,`id_adm`,`logadminfo`) VALUES ('NULL',NOW(), '".strtolower($_COOKIE['login'])."' ,'Deu moderador a: id: (".strtolower($row['id_usu'])."), nome:(".strtolower($row['name']).") ')");
				}elseif($setadm=='2'){
					$dbconn -> query ("INSERT INTO `logadm`(`id_lad`,`logdt`,`id_adm`,`logadminfo`) VALUES ('NULL',NOW(), '".strtolower($_COOKIE['login'])."' ,'Deu ADMINISTRADOR a: id: (".strtolower($row['id_usu'])."), nome:(".strtolower($row['name']).") ')");
				}else{
					$dbconn -> query ("INSERT INTO `logadm`(`id_lad`,`logdt`,`id_adm`,`logadminfo`) VALUES ('NULL',NOW(), '".strtolower($_COOKIE['login'])."' ,'Retirou moderador de: id: (".strtolower($row['id_usu'])."), nome:(".strtolower($row['name']).") ')");
				};
				
				$dbconn -> query ("UPDATE `userinfo` SET `adm` = '$setadm' WHERE `userinfo`.`id_usu` = $uvid");
				header("Refresh:0");
			}
		}
	?>
</body>