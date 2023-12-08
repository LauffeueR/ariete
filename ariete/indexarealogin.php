<body>
	<div id="arealogin" class="arealogin">
		<form method="post" action="ariete/php/tologin.php" name="sendlog">		
			<div class="loglogBtn">
				<div class="logg">
					<label for="logg">
						Login
					</label>
					<input type="text" name="logg" id="logg"/>
					<span id="loggmsg"></span>
				</div>
				<div class="loggpass">
					<label for="loggpass">
						Senha
					</label>
					<input type="password" name="loggpass" id="loggpass"class="loggpass"/>
				</div>
				<div>
					<input type="submit" value="Entrar">
				</div>
			</div>
		</form>
		<div class="esqnov">
			<div class="forgot">
				<a href="ariete/forgot.php">Esqueci a senha</a>
			</div>
			<div class="newreg">
				<a href="ariete/newreg.php">Novo cadastro</a>
			</div>
		</div>
	</div>
</body>