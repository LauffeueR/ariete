//ARIETE_20230505
/*
onBlur 		remove o foco do elemento
onChange 	muda o valor do elemento
onClick 	o elemento é clicado pelo usuário
onFocus 	o elemento é focado
onKeyPress 	o usuário pressiona uma tecla sobre o elemento
onLoad 		carrega o elemento por completo
onMouseOver define ação quando o usuário passa o mouse sobre o elemento
onMouseOut 	define ação quando o usuário retira o mouse sobre o elemento
onSubmit 	define ação ao enviar um formulário

!= 	Não é igual
!== Não é igual e/ou não é do mesmo tipo (exemplo, volta true (que é diferente) caso compare uma variável string com uma variável int).
*/


function cPasswo(){

	let res = document.getElementById('cpasswmsg')
	var passw = document.getElementById('passw').value;
	
	if ((passw == null) || (passw == "")){
		res.innerHTML = `<span style="color:Red;"><b>ERRO:</b> Senha não pode ficar em branco.</span>`
	} 
	else {
		res.innerHTML = ``
		return false;
	};
	return true;
	
};

function cPassw(){

	let res = document.getElementById('cpassmsg')
	var passw = document.getElementById('passw').value;
	var cpassw = document.getElementById('cpassw').value;
	
	if (cpassw != passw){
		res.innerHTML = `<span style="color:Red;"><b>ERRO:</b> A confirmação da senha não coincide.</span>`
	} 
	else {
		res.innerHTML = ``
		return false;
	};
	return true;
	
};


function checkEmail(){
	
	let res = document.getElementById('cemsg1')
	
	if( document.forms[0].email.value=="" || document.forms[0].email.value.indexOf('@')==-1 || document.forms[0].email.value.indexOf('.')==-1 )
	{
		res.innerHTML = `<span style="color:Red;"><b>ERRO:</b> Insira um email válido!</span>`
	} else {
		res.innerHTML = ``
		return false;
	};
	return true;
};

function cEmail(){
	
	var email = document.getElementById('email').value;
	var cemail = document.getElementById('cemail').value;
	
	let res = document.getElementById('cemsg')
	
	if (cemail != email){
		// alert('Emails não coincidem!');
		res.innerHTML = `<span style="color:Red;"><b>ERRO:</b> Confirmação de email não coincide.</span>`
	} else {
		res.innerHTML = ``
		return false;
	};
	return true;	
	
};


function cPhones(){	
	let res = document.getElementById('cphonemsg')
	var phone = document.getElementById('phone').value;
	var cphone = document.getElementById('cphone').value;
	
	//cphone.addEventListener("blur", function(e) {
		if (cphone != phone){
			res.innerHTML = `<span style="color:Red;"><b>ERRO:</b> A confirmação do celular não coincide.</span>`
		} else {
			res.innerHTML = ``
			return false;
		};
		return true;
	//};
	
};


function checkPhone(){
// funcionou no "onLoad" no body

	//let celular = document.getElementById('phone');
	let celular = document.querySelector('#phone');
	
	let msgphone = document.getElementById('phonemsg')

	celular.addEventListener("keydown", function(e) {
		if ( (e.key >= "a") && (e.key <= "z") && (e.key >= "A") && (e.key >= "Z") ) {
			e.preventDefault();
			return false;
		}
		return true;
	} );
	
	celular.addEventListener("blur", function(e) {
		//Remove tudo o que não é dígito
		let celular = this.value.replace( /\D/g , "");
		
		var email = document.getElementById('email').value;
		var cemail = document.getElementById('cemail').value;
	
		if (celular.length==11){
			//formatação do número de telefone
			celular = celular.replace(/^(\d{2})(\d)/g,"($1) $2 "); 
			v = celular.replace(/(\d)(\d{4})$/,"$1-$2");
			document.getElementById('phone').value = v;
			msgphone.innerHTML = ``
		} else if (email != null || email != "") {
			msgphone.innerHTML = ``
		} else {
			//alert("Digite 11 números."); 
			msgphone.innerHTML = `<span style="color:Red;"><b>ERRO:</b> Número de telefone tem que ter 11 números. Exemplo: 77988884444</span>`
			return false;
		}
		return true;
	} );
};

function checkCphone(){	

	let cphone = document.querySelector('#cphone');

	cphone.addEventListener("keydown", function(e) {
		if ( (e.key >= "a") && (e.key <= "z") && (e.key >= "A") && (e.key >= "Z") ) {
			e.preventDefault();
			return false;
		}
		return true;
	} );
	
	cphone.addEventListener("blur", function(e) {
	//Remove tudo o que não é dígito
		let cphone = this.value.replace( /\D/g , "");

		if (cphone.length==11){
		cphone = cphone.replace(/^(\d{2})(\d)/g,"($1) $2 "); 
		v = cphone.replace(/(\d)(\d{4})$/,"$1-$2");
		document.getElementById('cphone').value = v;
		} else {
			//alert("Digite 11 números.");
			//BOTEI O LIMITADOR NO HTML
			return false;
		}
		return true;
	} );
	
};


function sendReg(){ 
	var phone = document.getElementById('phone').value;
	var cphone = document.getElementById('cphone').value;
	var login = document.getElementById('login').value;
	var passw = document.getElementById('passw').value;
	var cpassw = document.getElementById('cpassw').value;
	var email = document.getElementById('email').value;
	var cemail = document.getElementById('cemail').value;
	
	let loginmsg = document.getElementById('loginmsg');
	let cpasswmsg = document.getElementById('cpasswmsg');
	
	if ((login == null) || (login == "")) {
		loginmsg.innerHTML = '<span style="color:Red;"><b>ERRO:</b> Preencha um <b>login</b> para prosseguir.</span>';
		document.formSend.login.focus();
	} else if ((passw == null) || (passw == "")) {
		loginmsg.innerHTML = ``;
		cpasswmsg.innerHTML = `<span style="color:Red;"><b>ERRO:</b> Adicione uma <b>senha</b>.</span>`;
		document.formSend.passw.focus();
	} else if ((document.forms[0].email.value.length == 0) && (document.forms[0].phone.value.length == 0)) {
		loginmsg.innerHTML = ``;
		alert('Insira um e-mail ou um telefone celular.');
		document.formSend.email.focus();
	} else if ((cemail !== email) || (cphone !== phone)) {
		loginmsg.innerHTML = ``;
		alert('Erro: A confirmação do email ou do celular não coincide!');
		document.formSend.email.focus();
	} else if (cpassw != passw){
		loginmsg.innerHTML = ``;
		alert('A confirmação de senha não coincide com a senha registrada!');
		document.formSend.cpassw.focus();
	} else {
		loginmsg.innerHTML = ``;
		//alert('Cadastrado com sucesso!\n\n\O acesso a TODAS as funcionalidades do sistema dependerá da averiguação dos dados para a pesquisa dos antecedentes criminais. Clique em OK!\n\n\Acesse o sistema com seu login e sua senha.');
		document.formSend.submit();
		return false;
	};
	return true; 
};

