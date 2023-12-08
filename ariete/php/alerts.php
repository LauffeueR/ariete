<!--_Bruno_Aguiar_-_DSi_02_N_-_LowfirE_-_20230330
-->
<?php
	include 'dbconn.php';
	
	error_reporting(E_ALL); 
	ini_set('display_errors', 'On'); 
	
	if (!isset($_COOKIE['login'])) {
		header("Location: ../index.php");
	}
	
	$con = $dbconn -> query ("SELECT * FROM `realalert` WHERE `id_usu` = '".strtolower($_COOKIE['login'])."' ");
	$row = mysqli_fetch_array($con);
	
	try {
		if(isset($_POST['realalert'])){
			$alertr = filter_input(INPUT_POST, 'alertr');
			$notify = $_POST['notify'];
			$dbconn -> query ("INSERT INTO `realalert`(`id_usu`,`alertr`,`notify`)
				VALUES ('".strtolower($_COOKIE['login'])."','$alertr','$notify')");
			
			/*
			//funcionou botando no CATCH
			if($con){
				$dbconn -> query ("UPDATE `realalert` SET `alertr`='$alertr',`notify`=$notify WHERE `realalert`.`id_usu` = '".strtolower($_COOKIE['login'])."' ");
			} else {
				$dbconn -> query ("INSERT INTO `realalert`(`id_usu`,`alertr`,`notify`)
				VALUES ('".strtolower($_COOKIE['login'])."','$alertr','$notify')");
			}
			*/
			
			header("Location: alerts.php");
		}
	} catch (Exception $e) {
		
		$dbconn -> query ("UPDATE `realalert` SET `alertr`='$alertr',`notify`=$notify WHERE `realalert`.`id_usu` = '".strtolower($_COOKIE['login'])."' ");
		header("Location: alerts.php");
		//echo '<br>Erro ~> '.mysqli_error($dbconn);
	};
	
	try {
		if(isset($_POST['distalert'])){
			$bairr = filter_input(INPUT_POST, 'bairr');
			if(empty($bairr)){ header("Location: alerts.php"); die; }
			
			$dbconn -> query ("
				INSERT INTO `distalert` (`id_usu`,`bairr`)
				SELECT * FROM (SELECT '".strtolower($_COOKIE['login'])."','$bairr') AS tmp
				WHERE NOT EXISTS (
					SELECT `id_usu`,`bairr` FROM `distalert`
					WHERE `id_usu`='".strtolower($_COOKIE['login'])."'
					AND `bairr`='$bairr'
				) LIMIT 1");
				
			header("Location: alerts.php");
		}
	} catch (Exception $e) {
		header('Location: alerts.php');
		echo 'Bairro já cadastrado.';
	};
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="css/estilocss.css" />
	<script src="js/Javaroteiro.js" defer></script>
	<title>Configuração de alertas de crimes</title>
</head>
<?php
	include '../header.php';
?>
<link rel="stylesheet" type="text/css" href="../css/header.css" />

<body>
	<a href="../home.php">Voltar</a>
	<br>
	<form method="post" name="realalert">
		<h3>Alertas em tempo real</h3>
		Selecione o raio em metros para receber os alertas de crimes que acontecem próximo a sua localização atual.
		<br>
		<label for="alertr">Raio de alerta:</label>
		<input type="range" name="alertr" id="alertr" min="100" max="1200" step="100" value="<?php echo $row['alertr']; ?>">
		<span id="smsg"></span>
		
		<script>
			var slider = document.getElementById("alertr");
			var output = document.getElementById("smsg");
			output.innerHTML = slider.value +' metros'; // Display the default slider value

			// Update the current slider value (each time you drag the slider handle)
			slider.oninput = function() {
				output.innerHTML = this.value +' metros';
			} 
		</script>
		
		<br>	
		Deseja receber notificações?
		<?php //gastei uma hora e meia pra fazer isso!
			if (empty($row['notify'])){
				$notif = 0;
			} else {
				$notif = $row['notify'];
			}
		?>
		<span style="border: 1px solid;">
			<input type="radio" id="sim" name="notify" value="1"<?php if($notif == 1){ echo 'checked';};?>>
			<label for="sim">Sim</label>
		</span>
		<span style="border: 1px solid;">
			<input type="radio" id="nao" name="notify" value="0"<?php if($notif == 0){ echo 'checked';};?>>
			<label for="nao">Não</label>
		</span>
		<input type="submit" name="realalert" value="Salvar">
	</form>
	<hr>
	<h3>Adicione um bairro para o recebimento de alerta de crimes em tempo real</h3>
	<br>
	<form method="post" name="distalert">		
		Selecione o bairro:
		<select id="bairr" name="bairr">
			<option value=""> ↓↓↓ Selecione ↓↓↓ </option>
			<option value="Aflitos (Recife)              "> Aflitos (Recife)              </option>
			<option value="Afogados                      "> Afogados                      </option>
			<option value="Água Fria (Recife)            "> Água Fria (Recife)            </option>
			<option value="Alto José Bonifácio           "> Alto José Bonifácio           </option>
			<option value="Alto José do Pinho            "> Alto José do Pinho            </option>
			<option value="Alto do Mandu                 "> Alto do Mandu                 </option>
			<option value="Alto do Pascoal               "> Alto do Pascoal               </option>
			<option value="Alto Santa Terezinha          "> Alto Santa Terezinha          </option>
			<option value="Apipucos                      "> Apipucos                      </option>
			<option value="Areias (Recife)               "> Areias (Recife)               </option>
			<option value="Arruda (Recife)               "> Arruda (Recife)               </option>
			<option value="Barro (Recife)                "> Barro (Recife)                </option>
			<option value="Beberibe (Recife)             "> Beberibe (Recife)             </option>
			<option value="Benfica (Recife)              "> Benfica (Recife)              </option>
			<option value="Boa Viagem (Recife)           "> Boa Viagem (Recife)           </option>
			<option value="Boa Vista (Recife)            "> Boa Vista (Recife)            </option>
			<option value="Bomba do Hemetério            "> Bomba do Hemetério            </option>
			<option value="Bongi                         "> Bongi                         </option>
			<option value="Brasília Teimosa              "> Brasília Teimosa              </option>
			<option value="Brejo do Beberibe             "> Brejo do Beberibe             </option>
			<option value="Brejo da Guabiraba            "> Brejo da Guabiraba            </option>
			<option value="Cabanga                       "> Cabanga                       </option>
			<option value="Caçote (Recife)               "> Caçote (Recife)               </option>
			<option value="Cajueiro (Recife)             "> Cajueiro (Recife)             </option>
			<option value="Campina do Barreto            "> Campina do Barreto            </option>
			<option value="Campo Grande (Recife)         "> Campo Grande (Recife)         </option>
			<option value="Casa Amarela (Recife)         "> Casa Amarela (Recife)         </option>
			<option value="Casa Forte (Recife)           "> Casa Forte (Recife)           </option>
			<option value="Caxangá (Recife)              "> Caxangá (Recife)              </option>
			<option value="Cidade Universitária (Recife) "> Cidade Universitária (Recife) </option>
			<option value="Coelhos                       "> Coelhos                       </option>
			<option value="Cohab (Recife)                "> Cohab (Recife)                </option>
			<option value="Coque (Recife)                "> Coque (Recife)                </option>
			<option value="Coqueiral (Recife)            "> Coqueiral (Recife)            </option>
			<option value="Cordeiro (Recife)             "> Cordeiro (Recife)             </option>
			<option value="Córrego do Jenipapo           "> Córrego do Jenipapo           </option>
			<option value="Curado (Recife)               "> Curado (Recife)               </option>
			<option value="Derby (Recife)                "> Derby (Recife)                </option>
			<option value="Dois Irmãos (Recife)          "> Dois Irmãos (Recife)          </option>
			<option value="Dois Unidos                   "> Dois Unidos                   </option>
			<option value="Encruzilhada (Recife)         "> Encruzilhada (Recife)         </option>
			<option value="Engenho do Meio               "> Engenho do Meio               </option>
			<option value="Entra Apulso                  "> Entra Apulso                  </option>
			<option value="Espinheiro (Recife)           "> Espinheiro (Recife)           </option>
			<option value="Estância (Recife)             "> Estância (Recife)             </option>
			<option value="Fundão (Recife)               "> Fundão (Recife)               </option>
			<option value="Graças (Recife)               "> Graças (Recife)               </option>
			<option value="Guabiraba                     "> Guabiraba                     </option>
			<option value="Hipódromo (Recife)            "> Hipódromo (Recife)            </option>
			<option value="Ibura                         "> Ibura                         </option>
			<option value="Ilha Joana Bezerra            "> Ilha Joana Bezerra            </option>
			<option value="Ilha do Leite                 "> Ilha do Leite                 </option>
			<option value="Ilha do Retiro                "> Ilha do Retiro                </option>
			<option value="Imbiribeira                   "> Imbiribeira                   </option>
			<option value="Ipsep                         "> Ipsep                         </option>
			<option value="Iputinga                      "> Iputinga                      </option>
			<option value="Jaqueira (Recife)             "> Jaqueira (Recife)             </option>
			<option value="Jardim São Paulo (Recife)     "> Jardim São Paulo (Recife)     </option>
			<option value="Jiquiá                        "> Jiquiá                        </option>
			<option value="Jordão (Recife)               "> Jordão (Recife)               </option>
			<option value="Linha do Tiro                 "> Linha do Tiro                 </option>
			<option value="Macaxeira (Recife)            "> Macaxeira (Recife)            </option>
			<option value="Madalena (Recife)             "> Madalena (Recife)             </option>
			<option value="Mangabeira (Recife)           "> Mangabeira (Recife)           </option>
			<option value="Mangueira (Recife)            "> Mangueira (Recife)            </option>
			<option value="Monteiro (Recife)             "> Monteiro (Recife)             </option>
			<option value="Morro da Conceição (Recife)   "> Morro da Conceição (Recife)   </option>
			<option value="Mustardinha                   "> Mustardinha                   </option>
			<option value="Nova Descoberta (Recife)      "> Nova Descoberta (Recife)      </option>
			<option value="Paissandu (Recife)            "> Paissandu (Recife)            </option>
			<option value="Parnamirim (Recife)           "> Parnamirim (Recife)           </option>
			<option value="Passarinho (Recife)           "> Passarinho (Recife)           </option>
			<option value="Pau Ferro (Recife)            "> Pau Ferro (Recife)            </option>
			<option value="Peixinhos (Recife)            "> Peixinhos (Recife)            </option>
			<option value="Pina (Recife)                 "> Pina (Recife)                 </option>
			<option value="Poço da Panela                "> Poço da Panela                </option>
			<option value="Ponte d'Uchoa                 "> Ponte d'Uchoa                 </option>
			<option value="Ponto de Parada (Recife)      "> Ponto de Parada (Recife)      </option>
			<option value="Porto da Madeira              "> Porto da Madeira              </option>
			<option value="Prado (Recife)                "> Prado (Recife)                </option>
			<option value="Recife (bairro)               "> Recife (bairro)               </option>
			<option value="Rosarinho                     "> Rosarinho                     </option>
			<option value="San Martin (Recife)           "> San Martin (Recife)           </option>
			<option value="Sancho (Recife)               "> Sancho (Recife)               </option>
			<option value="Santana (Recife)              "> Santana (Recife)              </option>
			<option value="Santo Amaro (Recife)          "> Santo Amaro (Recife)          </option>
			<option value="Santo Antônio (Recife)        "> Santo Antônio (Recife)        </option>
			<option value="São José (Recife)             "> São José (Recife)             </option>
			<option value="Sítio dos Pintos              "> Sítio dos Pintos              </option>
			<option value="Soledade (Recife)             "> Soledade (Recife)             </option>
			<option value="Tamarineira                   "> Tamarineira                   </option>
			<option value="Tejipió                       "> Tejipió                       </option>
			<option value="Torre (Recife)                "> Torre (Recife)                </option>
			<option value="Torreão (Recife)              "> Torreão (Recife)              </option>
			<option value="Torrões                       "> Torrões                       </option>
			<option value="Totó (Recife)                 "> Totó (Recife)                 </option>
			<option value="Várzea (Recife)               "> Várzea (Recife)               </option>
			<option value="Vasco da Gama (Recife)        "> Vasco da Gama (Recife)        </option>
			<option value="Zumbi (Recife)                "> Zumbi (Recife)                </option>
		</select>
		<input type="submit" name="distalert" value="Salvar">
	</form>
	<hr>
	<h3>Lista de bairros já cadastrados:</h3>
	<ul>
		<?php
			$rbair = $dbconn -> query("SELECT * FROM `distalert` WHERE `distalert`.`id_usu` = '".strtolower($_COOKIE['login'])."' ORDER BY `distalert`.`bairr` ASC");
			while ($bairr = mysqli_fetch_assoc($rbair)) {
		?>
				<li>
					<?php echo $bairr['bairr'];?><a href="alertsdel.php?rbai=<?php echo $bairr['bairr'];?>&action=remove">Remover</a>
				</li>
		<?php
			}
		?>
	</ul>
	</div>
	<?php
		/*
		if (isset($_GET['action']) && $_GET['action'] == 'remove') {
			$rbai=$_GET['rbai'];
			$dbconn -> query ("DELETE FROM distalert WHERE `distalert`.`bairr` = '$rbai' AND `id_usu` = '".strtolower($_COOKIE['login'])."' ");
			header("Location: alerts.php");
			
			// https://pt.stackoverflow.com/questions/4251/erro-cannot-modify-header-information-headers-already-sent
		}
		*/
	?>
	

	

</div>	
</body>
<?php
	include '../footer.php';
?>
<link rel="stylesheet" type="text/css" href="../css/footer.css" />
</html>