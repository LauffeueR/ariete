<!--_ARIETE!_Bruno_Aguiar_-_DSi_02_N_-_LowfirE_-_20230320
-->
<style>
	*{
		margin: 5px;
	}
</style>

<?php
	include "dbconn.php";
	error_reporting(0);
	
	if (!isset($_COOKIE['login'])) {
		header("Location: ../index.php");
	}
	
	$con = $dbconn->query("SELECT * FROM `userinfocrim` WHERE id_usu = '".strtolower($_COOKIE['login'])."'");
	$row = mysqli_fetch_array($con);
	//$id_usu = $row['id_usu'];
	
	try {
		if(isset($_POST['editcrim'])){
			
			$namec = $_POST['namec'];
			$moth = $_POST['moth'];
			$fath = $_POST['fath'];
			$nation = $_POST['nation'];
			$naturali = $_POST['naturali'];
			$statnat = $_POST['statnat'];
			$ident = $_POST['ident'];
			$issuer = $_POST['issuer'];
			$statiss = $_POST['statiss'];
			$passp = $_POST['passp'];
			$passps = $_POST['passps'];
			$birth = $_POST['birth'];
			$cpf = $_POST['cpf'];
			
			$dbconn -> query ("UPDATE `userinfocrim` SET
			`namec` = '$namec',
			`moth` = '$moth',
			`fath` = '$fath',
			`nation` = '$nation',
			`naturali` = '$naturali',
			`statnat` = '$statnat',
			`ident` = '$ident',
			`issuer` = '$issuer',
			`statiss` = '$statiss',
			`passp` = '$passp',
			`passps` = '$passps',
			`birth` = '$birth',
			`cpf` = '$cpf'
			WHERE `userinfocrim`.`id_usu` = '".strtolower($_COOKIE['login'])."'");
			
			header("Location: usereditcrim.php");
		}  
		
	} catch (Exception $e) {
		echo '<br>CPF já cadastrado.';
		echo '<br>Falha ao cadastrar! ~> '.mysqli_error($dbconn);
		echo '<br>Voltar: <a href="../index.php">index.php</a>';
	}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<title>Reenviar dados para antecedentes || ARIETE!</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="css/estilocss.css" />
	<script src="js/Javaroteiro.js" defer></script>
</head>

<?php
	include 'header.php';
?>
<link rel="stylesheet" type="text/css" href="../css/header.css" />

<body>
		
<div class="bordering center">

	<form method="post" name="formAntece" id="formAntece" class="formAntece" > <!-- onSubmit="return (register())" -->
		
		<h3>Informações necessárias para pesquisa dos antecedentes criminais:</h3>
		
		<label for="namec">Nome completo</label>
		<input type="text" id="namec" name="namec" placeholder="Nome completo" maxlength="80" value="<?php echo ''.$row["namec"]; ?>">
		<br>
		<label for="moth">Nome completo da mãe</label>
		<input type="text" id="moth" name="moth" placeholder="Nome da mãe" maxlength="80" value="<?php echo ''.$row["moth"]; ?>">
		<br>
		<label for="fath">Nome completo do pai</label>
		<input type="text" id="fath" name="fath" placeholder="Nome do pai" maxlength="80" value="<?php echo ''.$row["fath"]; ?>">
		<br>
		<label for="nation">Nacionalidade</label>
		<input type="text" id="nation" name="nation" placeholder="Nacionalidade" maxlength="20" value="<?php echo ''.$row["nation"]; ?>">
		<br>
		<label for="city">Naturalidade</label>
		<input type="text" id="naturali" name="naturali" placeholder="Naturalidade" maxlength="24" value="<?php echo ''.$row["naturali"]; ?>">
		<select id="statnat" name="statnat">
			<option value="<?php echo ''.$row["statnat"]; ?>"> <?php echo ''.$row["statnat"]; ?> </option>
			<option value="AC">AC</option> <!-- 01 ACRE                -->
			<option value="AL">AL</option> <!-- 02 ALAGOAS             -->
			<option value="AP">AP</option> <!-- 03 AMAPÁ               -->
			<option value="AM">AM</option> <!-- 04 AMAZONAS            -->
			<option value="BA">BA</option> <!-- 05 BAHIA               -->
			<option value="CE">CE</option> <!-- 06 CEARÁ               -->
			<option value="DF">DF</option> <!-- 07 DISTRITO FEDERAL    -->
			<option value="ES">ES</option> <!-- 08 ESPÍRITO SANTO      -->
			<option value="GO">GO</option> <!-- 09 GOIÁS               -->
			<option value="MA">MA</option> <!-- 10 MARANHÃO            -->
			<option value="MT">MT</option> <!-- 11 MATO-GROSSO         -->
			<option value="MS">MS</option> <!-- 12 MATO-GROSSO DO SUL  -->
			<option value="MG">MG</option> <!-- 13 MINAS GERAIS        -->
			<option value="PA">PA</option> <!-- 14 PARÁ                -->
			<option value="PB">PB</option> <!-- 15 PARAÍBA             -->
			<option value="PR">PR</option> <!-- 16 PARANÁ              -->
			<option value="PE">PE</option> <!-- 17 PERNAMBUCO          -->
			<option value="PI">PI</option> <!-- 18 PIAUÍ               -->
			<option value="RJ">RJ</option> <!-- 19 RIO DE JANEIRO      -->
			<option value="RN">RN</option> <!-- 20 RIO GRANDE DO NORTE -->
			<option value="RS">RS</option> <!-- 21 RIO GRANDE DO SUL   -->
			<option value="RO">RO</option> <!-- 22 RONDÔNIA            -->
			<option value="RR">RR</option> <!-- 23 RORAIMA             -->
			<option value="SC">SC</option> <!-- 24 SANTA CATARINA      -->
			<option value="SP">SP</option> <!-- 25 SÃO PAULO           -->
			<option value="SE">SE</option> <!-- 26 SERGIPE             -->
			<option value="TO">TO</option> <!-- 27 TOCANTINS           -->
		</select>
		<br>
		<label for="ident">Identidade</label>
		<input type="text" id="ident" name="ident" placeholder="Identidade" maxlength="20" value="<?php echo ''.$row["ident"]; ?>">
		<br>
		<label for="issuer">Órgão emissor</label>
		<input type="text" id="issuer" name="issuer" placeholder="Identidade" maxlength="10" value="<?php echo ''.$row["issuer"]; ?>">
		<select id="statiss" name="statiss">
			<option value="<?php echo ''.$row["statiss"]; ?>"> <?php echo ''.$row["statiss"]; ?> </option>
			<option value="AC">AC</option> <!-- ACRE                -->
			<option value="AL">AL</option> <!-- ALAGOAS             -->
			<option value="AP">AP</option> <!-- AMAPÁ               -->
			<option value="AM">AM</option> <!-- AMAZONAS            -->
			<option value="BA">BA</option> <!-- BAHIA               -->
			<option value="CE">CE</option> <!-- CEARÁ               -->
			<option value="DF">DF</option> <!-- DISTRITO FEDERAL    -->
			<option value="ES">ES</option> <!-- ESPÍRITO SANTO      -->
			<option value="GO">GO</option> <!-- GOIÁS               -->
			<option value="MA">MA</option> <!-- MARANHÃO            -->
			<option value="MT">MT</option> <!-- MATO-GROSSO         -->
			<option value="MS">MS</option> <!-- MATO-GROSSO DO SUL  -->
			<option value="MG">MG</option> <!-- MINAS GERAIS        -->
			<option value="PA">PA</option> <!-- PARÁ                -->
			<option value="PB">PB</option> <!-- PARAÍBA             -->
			<option value="PR">PR</option> <!-- PARANÁ              -->
			<option value="PE">PE</option> <!-- PERNAMBUCO          -->
			<option value="PI">PI</option> <!-- PIAUÍ               -->
			<option value="RJ">RJ</option> <!-- RIO DE JANEIRO      -->
			<option value="RN">RN</option> <!-- RIO GRANDE DO NORTE -->
			<option value="RS">RS</option> <!-- RIO GRANDE DO SUL   -->
			<option value="RO">RO</option> <!-- RONDÔNIA            -->
			<option value="RR">RR</option> <!-- RORAIMA             -->
			<option value="SC">SC</option> <!-- SANTA CATARINA      -->
			<option value="SP">SP</option> <!-- SÃO PAULO           -->
			<option value="SE">SE</option> <!-- SERGIPE             -->
			<option value="TO">TO</option> <!-- TOCANTINS           -->
		</select>
		<br>
		<label for="passp">Número do passaporte</label>
		<input type="text" id="passp" name="passp" placeholder="Nº do passaporte" maxlength="12" value="<?php echo ''.$row["passp"]; ?>">
		<br>
		<label for="passps">Série do passaporte</label>
		<input type="text" id="passps" name="passps" placeholder="Série do passaporte" maxlength="2" value="<?php echo ''.$row["passps"]; ?>">
		<br>
		<label>Data de nascimento:
		<input type="date" name="birth" <?php echo ' value="'.$row["birth"].'" ';?>>
		
		</label>
		<br>
		<label for="cpf">CPF</label>
		<input type="text" id="cpf" name="cpf" placeholder="CPF" maxlength="11" value="<?php echo ''.$row["cpf"]; ?>">
		<span id="cpfmsg"></span>
		<br>
		<input type="reset" value="Limpar todos os dados">
		<input type="submit" id="register" name="editcrim" value="Cadastrar" onClick="sendReg(); return false">
		<a href="../home.php">Voltar</a>
	
	</form>

</div>
</body>
<?php
	include 'footer.php';
?>
<link rel="stylesheet" type="text/css" href="../css/footer.css" />

</html>