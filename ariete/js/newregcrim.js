//_Sistema_ARIETE__LauffeueR_20230508

//function checkCpf(){
	
	let value_cpf = document.querySelector('#cpf');
	//let msgcpf = document.getElementById('cpfmsg');
	let msgcpf = document.querySelector('#cpfmsg');
	let yy;
	let ya;
	let yb;
	//let value_cpf = document.querySelector('#cpfy');
	
	value_cpf.addEventListener("keydown", function(e) {
		if (e.key >= "a" && e.key <= "z") {
			e.preventDefault();
		}
	});

	value_cpf.addEventListener("blur", function(e) {

		//Remove tudo o que não é dígito
		
		let validar_cpf = this.value.replace( /\D/g , "");

		//verificação da quantidade números
		
		if (validar_cpf.length==11){ // verificação de CPF válido
			
			var Soma;
			var Resto;
			Soma = 0;
			
			for (i=1; i<=9; i++) Soma = Soma + parseInt(validar_cpf.substring(i-1, i)) * (11 - i);
			Resto = (Soma * 10) % 11;
			if ((Resto == 10) || (Resto == 11))  Resto = 0;
			//if (Resto != parseInt(validar_cpf.substring(9, 10)) ) return /*alert("CPF Inválido!");*/ msgcpf.innerHTML = `<span style="color:Red;"><b>ERRO:</b> CPF Inválido! 1</span>`;;
			
			if (Resto != parseInt(validar_cpf.substring(9, 10)) ) {
				msgcpf.innerHTML = `<span style="color:Red;"><b>ERRO:</b> CPF Inválido!</span>`;
				//return
				ya = 1;
			} else {
				ya = 0;
			};
			
			Soma = 0;
			for (i = 1; i <= 10; i++) Soma = Soma + parseInt(validar_cpf.substring(i-1, i)) * (12 - i);
			Resto = (Soma * 10) % 11;
			if ((Resto == 10) || (Resto == 11))  Resto = 0;
			//if (Resto != parseInt(validar_cpf.substring(10, 11) ) ) return /*alert("CPF Inválido!");*/ msgcpf.innerHTML = `<span style="color:Red;"><b>ERRO:</b> CPF Inválido! 2</span>`;;
			
			if (Resto != parseInt(validar_cpf.substring(10, 11))) {
				msgcpf.innerHTML = `<span style="color:Red;"><b>ERRO:</b> CPF Inválido!</span>`;
				//return
				yb = 1;
			} else {
				if (ya>0){
				}else{
					msgcpf.innerHTML = ``;
				}
				yb = 0;
			};

			//formatação final
		
			cpf_final = validar_cpf.replace( /(\d{3})(\d)/ , "$1.$2");
			cpf_final = cpf_final.replace( /(\d{3})(\d)/ , "$1.$2");
			cpf_final = cpf_final.replace(/(\d{3})(\d{1,2})$/ , "$1-$2");
			document.getElementById('cpf').value = cpf_final;
			
			//document.getElementById('cpf').value = validar_cpf;
			//document.getElementById('cpfy').value = cpf_final;
			
			yy=ya+yb;
			
			//return yy;
			
		} else {
			yy = 1;
			//alert("CPF Inválido! É esperado 11 dígitos numéricos.")
			msgcpf.innerHTML = `<span style="color:Red;"><b>ERRO:</b> CPF Inválido! É esperado 11 dígitos numéricos.</span>`;
		}
		
		//return yy;
		
	});
	
	//var yyy=value_cpf.addEventListener();
	//msg7.innerHTML=``+yy;
	//return yy;
//};


function sendRegc(){ 
	let namec = document.getElementById('namec').value;
	let nation = document.getElementById('nation').value;
	let naturali = document.getElementById('naturali').value;
	let statnat = document.getElementById('statnat').value;
	let ident = document.getElementById('ident').value;
	let issuer = document.getElementById('issuer').value;
	let statiss = document.getElementById('statiss').value;
	let birth = document.getElementById('birth').value;
	let cpf = document.getElementById('cpf').value;
	let errormsg = document.getElementById('errormsg');
	
	//let cpfvalido = checkCpf();
	
	
	if ((namec == null) || (namec == "")) {
		errormsg.innerHTML = '<span style="color:Red;"><b>ERRO:</b> Preencha seu <b>nome</b> completo para prosseguir.</span><br>';
		document.formSendc.namec.focus();
	} else if ((nation == null) || (nation == "")) {
		errormsg.innerHTML = '<span style="color:Red;"><b>ERRO:</b> Informe qual é sua nacionalidade.</span><br>';
		document.formSendc.nation.focus();
	} else if ((naturali == null) || (naturali == "")) {
		errormsg.innerHTML = '<span style="color:Red;"><b>ERRO:</b> Informe qual é sua naturalidade.</span><br>';
		document.formSendc.naturali.focus();
	} else if ((statnat == null) || (statnat == "")) {
		errormsg.innerHTML = '<span style="color:Red;"><b>ERRO:</b> Informe qual é UF da naturalidade.</span><br>';
		document.formSendc.statnat.focus();
	} else if ((ident == null) || (ident == "")) {
		errormsg.innerHTML = '<span style="color:Red;"><b>ERRO:</b> Informe a numeração da sua identidade.</span><br>';
		document.formSendc.ident.focus();
	} else if ((issuer == null) || (issuer == "")) {
		errormsg.innerHTML = '<span style="color:Red;"><b>ERRO:</b> Informe a numeração da sua identidade.</span><br>';
		document.formSendc.issuer.focus();
	} else if ((statiss == null) || (statiss == "")) {
		errormsg.innerHTML = '<span style="color:Red;"><b>ERRO:</b> Informe a UF da sua identidade.</span><br>';
		document.formSendc.statiss.focus();
	} else if ((birth == null) || (birth == "")) {
		errormsg.innerHTML = '<span style="color:Red;"><b>ERRO:</b> Data de nascimento inválida ou em branca.</span><br>';
		document.formSendc.birth.focus();
	} else if ((cpf == null) || (cpf == "") || /*(cpfvalido > 0)*/ (yy > 0) ) {
		msgcpf.innerHTML = '<span style="color:Red;"><b>ERRO:</b> CPF inválido ou em branco.</span><br>';
		document.formSendc.cpf.focus();
	} else {
		alert('n/Ok!n/');
		document.formSendc.submitgo.submit();
		return false;
	};
	return true; 
};
