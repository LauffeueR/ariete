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
	
	$date = new DateTime("now", new DateTimeZone('America/Recife'));
	
	try {
		if(isset($_POST['submit'])){
			$distr = $_POST['distr'];
			$crimetype = $_POST['crimetype'];
			$criminal = $_POST['criminal'];
			$addinfo = $_POST['addinfo'];
			$dtime = $date->format('Y-m-d H:i:s');
			
			//'".strtolower($login)."'
			$dbconn -> query ("INSERT INTO `crimereport`(`id_rep`,`id_usu`,`distr`,`crimetype`,`criminal`,`addinfo`,`dtime`)
			VALUES ('NULL','".strtolower($_COOKIE['login'])."','$distr','$crimetype','$criminal','$addinfo','$dtime')");
			
			header("Location: ../home.php");
		}
		
	} catch (Exception $e) {
		unset($_COOKIE['idusu']);
		setcookie('idusu', '', time() - 3600, '/');
		echo '<br>Nome de Login, Email ou Telefone já cadastrado. <a href="../index.php">index.php</a> <a href="../newreg.php">newreg.php</a><br>';
		echo '<br>Falha ao cadastrar! ~> '.mysqli_error($dbconn);
	};
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<title>Admin area || ARIETE!</title>
	
</head>

<style>
	*:disabled {
		background-color: white;
		color: black;
		opacity: 1;
	}
	
	textarea{
		width: 300px;
		height: 150px;
	}
	
	a.linkbutton {
		border-style: solid;
		border-width : 1px 1px 1px 1px;
		text-decoration : none;
		padding : 4px;
		border-color : #000000;
	}
</style>

<?php
	include '../header.php';
?>
<link rel="stylesheet" type="text/css" href="../css/header.css" />

<body>
	
	<form method="post">
		<label for="bairro">Bairro onde aconteceu o crime:</label>
		<select id="bairro" name="distr">
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
		<br>
		<label for="tipocrime">Tipo de crime:</label>
		<select id="tipocrime" name="crimetype">
			<option value="">↓↓↓ Selecione ↓↓↓</option>
			<option value="Arrastão">Arrastão</option>
			<option value="Assalto">Assalto</option>
			<option value="Roubo">Roubo</option>
			<option value="Estupro">Estupro</option>
			<option value="Sequestro">Sequestro</option>
			<option value="Homicídio">Homicídio</option>
			<option value="Latrocínio">Latrocínio</option>
		</select>
		<br>
		<label for="criminoso">Mobilidade do criminoso:</label>
		<select id="criminoso" name="criminal">
			<option value="">O bandido estava...</option>
			<option value="A pé">A pé</option>
			<option value="A moto">A moto</option>
			<option value="A carro">A carro</option>
		</select>
		<br>
		<label for="addinfo">Descreva mais informações importantes:</label>
		<textarea id="addinfo" name="addinfo" placeholder="Exemplos: placas de veículos usados pelos criminosos, placas de veículos roubados, quantidade de criminosos, armas que criminosos utilizaram, descrição dos criminosos, etc."></textarea>
		<br>
		<label for="horadata">Data e hora:</label>
		<input disabled id="horadata" name="horadata" value=" <?php echo $date->format('d/M/Y H:i:s'); ?>">
		<br>
		<a href="../home.php" class="linkbutton">Voltar</a>
		<input name="submit" type="submit" value="Reportar">
	</form>
	
</body>

<?php
	include '../footer.php';
?>
<link rel="stylesheet" type="text/css" href="../css/footer.css" />

</html>