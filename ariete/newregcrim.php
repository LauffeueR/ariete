<!--_Bruno_Aguiar_-_DSi_02_N_-_LowfirE_-_20230317
-->

<?php
	if (!isset($_COOKIE['idusu'])) {
		header("Location: newreg.php");
		die;
	}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<title>Antecedentes criminais || ARIETE!</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="css/newregcrim.css" />
	<script src="js/newregcrim.js" defer></script>
</head>

<?php
	include 'header.php';
?>

<body>

<div id="slogan" class="bordering">
			<h1>Ariete!</h1>
			
			Derrube as muralhas da <b>criminalidade!</b>
		</div>

<div class="bordering center">
<div id="cadbody">

	<form method="post" name="formSendc" id="formSendc" class="formSendc" action="php/newregcrim2.php"> <!-- onSubmit="return (register())" -->
	<br>
	<center>
	<h2>
	Informações necessárias para pesquisa de antecedentes criminais:
	</h2>
	<h4>
	(https://antecedentes.dpf.gov.br/antecedentes-criminais/certidao)
	</h4>
	</center>
	<br>
	
	<div id="formantece">
			<label for="namec">Nome completo</label>
			<input type="text" name="namec" id="namec" placeholder="Nome completo" maxlength="80">
		<br>	
			<label for="moth">Nome completo da mãe</label>
			<input type="text" name="moth" id="moth" placeholder="Nome da mãe" maxlength="80">
		<br>	
			<label for="fath">Nome completo do pai</label>
			<input type="text" name="fath" id="fath" placeholder="Nome do pai" maxlength="80">
		<br>	
			<label for="nation">Nacionalidade</label>
			<input type="text" name="nation" id="nation" placeholder="Nacionalidade" maxlength="20">
		<br>	
			<label for="city">Naturalidade</label>
			<input type="text" name="naturali" id="naturali" placeholder="Naturalidade" maxlength="24">
			<select name="statnat" id="statnat">
				<option value="">Selecione...</option>
				<option value="AC">AC</option>
				<option value="AL">AL</option>
				<option value="AP">AP</option>
				<option value="AM">AM</option>
				<option value="BA">BA</option>
				<option value="CE">CE</option>
				<option value="DF">DF</option>
				<option value="ES">ES</option>
				<option value="GO">GO</option>
				<option value="MA">MA</option>
				<option value="MT">MT</option>
				<option value="MS">MS</option>
				<option value="MG">MG</option>
				<option value="PA">PA</option>
				<option value="PB">PB</option>
				<option value="PR">PR</option>
				<option value="PE">PE</option>
				<option value="PI">PI</option>
				<option value="RJ">RJ</option>
				<option value="RN">RN</option>
				<option value="RS">RS</option>
				<option value="RO">RO</option>
				<option value="RR">RR</option>
				<option value="SC">SC</option>
				<option value="SP">SP</option>
				<option value="SE">SE</option>
				<option value="TO">TO</option>
			</select>
		<br>	
			<label for="ident">Identidade</label>
			<input type="text" name="ident" id="ident" placeholder="Identidade" maxlength="20">
			
			<label for="issuer">Órgão emissor</label>
			<input type="text" name="issuer" id="issuer" placeholder="Órgão Emissor" maxlength="10" style="width:50px">
			<select name="statiss" name="statiss" id="statiss">
				<option value="">Selecione...</option>
				<option value="AC">AC</option>
				<option value="AL">AL</option>
				<option value="AP">AP</option>
				<option value="AM">AM</option>
				<option value="BA">BA</option>
				<option value="CE">CE</option>
				<option value="DF">DF</option>
				<option value="ES">ES</option>
				<option value="GO">GO</option>
				<option value="MA">MA</option>
				<option value="MT">MT</option>
				<option value="MS">MS</option>
				<option value="MG">MG</option>
				<option value="PA">PA</option>
				<option value="PB">PB</option>
				<option value="PR">PR</option>
				<option value="PE">PE</option>
				<option value="PI">PI</option>
				<option value="RJ">RJ</option>
				<option value="RN">RN</option>
				<option value="RS">RS</option>
				<option value="RO">RO</option>
				<option value="RR">RR</option>
				<option value="SC">SC</option>
				<option value="SP">SP</option>
				<option value="SE">SE</option>
				<option value="TO">TO</option>
			</select>
		<br>	
			<label for="passp">Número do passaporte</label>
			<input type="text" name="passp" id="passp" placeholder="Passaporte" maxlength="12">
			
			<label for="passps">Série do passaporte</label>
			<input type="text" name="passps" id="passps" placeholder="Série" maxlength="2" style="width:50px">
		<br>	
			<label>Data de nascimento:
			<!--
			<input type="text" name="bday" id="bday" placeholder="Dia" maxlength="2" style="width:25px">
			<input type="text" name="bmon" id="bmon" placeholder="Mês" maxlength="2" style="width:25px">
			<input type="text" name="byea" id="byea" placeholder="Ano" maxlength="4" style="width:50px">
			-->
			<input type="date" name="birth" id="birth">
			</label>
		<br>	
			<label for="cpf">CPF</label>
			<input type="text" name="cpf" id="cpf" placeholder="CPF" maxlength="11">
			<!-- <input type="text" name="cpfy" id="cpfy" placeholder="CPF" maxlength="11"> -->
			<span id="cpfmsg"></span>
	</div>
	
	
	<div id="resetsend" class="bordering">
		<br>
		<input type="submit" name="addlater" id="addlater" value="Adicionar depois" style="margin-right:10px;">
		<input type="submit" name="submitgo" id="submitgo" value="Cadastrar dados" onClick="sendRegc(); return false;"/>
		<br>
		<input type="reset" value="Limpar tudo">
		<span id="errormsg"></span>
		
		
		<!--
		onClick="sendRegcrim(); return false;"
		<input type="button" id="register" value="Adicionar depois" >
		onClick="sendReg(); return false"
		-->
		
	</div>
	
	</form>

</div>
</div>
</body>

<?php
	include 'footer.php';
?>	

</html>