<!--_Bruno_Aguiar_-_DSi_02_N_-_LowfirE_- 20230327
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
	
	$idrepv = $_GET['idrepv'];
	$idusuv = $_GET['idusuv'];
	
	$con = $dbconn -> query("SELECT * FROM `crimereport` WHERE `crimereport`.`id_rep` = $idrepv");
	$row = mysqli_fetch_array($con);
	
	$con2 = $dbconn -> query("SELECT * FROM `userinfo` WHERE `userinfo`.`id_usu` = $idusuv");
	$row2 = mysqli_fetch_array($con2);
	
	$dtime = new DateTime($row['dtime']);
	
	if(isset($_POST['submit'])){
		/*
		if(!empty($_POST['crimetype'])){
			$crimetype = $_POST['crimetype'];
			$dbconn -> query ("INSERT INTO `logadm`(`id_lad`,`logdt`,`id_adm`,`logadminfo`) VALUES ('NULL',NOW(),' ".strtolower($_COOKIE['login'])."' ,'Alterou o reporte (".strtolower($row['id_rep'])."), onde tipo do crime: (".strtolower($row['crimetype']).") para: ($crimetype).' )");
			$dbconn -> query ("UPDATE `crimereport` SET `crimetype` = '$crimetype' WHERE `crimereport`.`id_rep` = $idrepv");
		}
		if(!empty($_POST['criminal'])){
			$criminal = $_POST['criminal'];
			$dbconn -> query ("INSERT INTO `logadm`(`id_lad`,`logdt`,`id_adm`,`logadminfo`) VALUES ('NULL',NOW(),' ".strtolower($_COOKIE['login'])."' ,'Alterou o reporte (".strtolower($row['id_rep'])."), onde tipo do crime: (".strtolower($row['criminal']).") para: ($criminal).' )");
			$dbconn -> query ("UPDATE `crimereport` SET `criminal` = '$criminal' WHERE `crimereport`.`id_rep` = $idrepv");
		}
		if(!empty($_POST['addinfo'])){
			$addinfo = $_POST['addinfo'];
			$dbconn -> query ("INSERT INTO `logadm`(`id_lad`,`logdt`,`id_adm`,`logadminfo`) VALUES ('NULL',NOW(),' ".strtolower($_COOKIE['login'])."' ,'Alterou o reporte (".strtolower($row['id_rep'])."), onde tipo do crime: (".strtolower($row['addinfo']).") para: ($addinfo).' )");
			$dbconn -> query ("UPDATE `crimereport` SET `addinfo` = '$addinfo' WHERE `crimereport`.`id_rep` = $idrepv");
		}
		if(!empty($_POST['distr'])){
			$distr = $_POST['distr'];
			$dbconn -> query ("INSERT INTO `logadm`(`id_lad`,`logdt`,`id_adm`,`logadminfo`) VALUES ('NULL',NOW(),' ".strtolower($_COOKIE['login'])."' ,'Alterou o reporte (".strtolower($row['id_rep'])."), onde tipo do crime: (".strtolower($row['distr']).") para: ($distr).' )");
			$dbconn -> query ("UPDATE `crimereport` SET `distr` = '$distr' WHERE `crimereport`.`id_rep` = $idrepv");
		}
		*/
		if(($_POST['crimetype']) != ($row['crimetype'])){
			$crimetype = $_POST['crimetype'];
			$dbconn -> query ("INSERT INTO `logadm`(`id_lad`,`logdt`,`id_adm`,`logadminfo`) VALUES ('NULL',NOW(),' ".strtolower($_COOKIE['login'])."' ,'Alterou o reporte (".strtolower($row['id_rep'])."), onde tipo do crime: (".strtolower($row['crimetype']).") para: ($crimetype).' )");
			$dbconn -> query ("UPDATE `crimereport` SET `crimetype` = '$crimetype' WHERE `crimereport`.`id_rep` = $idrepv");
		}
		if(($_POST['criminal']) != ($row['criminal'])){
			$criminal = $_POST['criminal'];
			$dbconn -> query ("INSERT INTO `logadm`(`id_lad`,`logdt`,`id_adm`,`logadminfo`) VALUES ('NULL',NOW(),' ".strtolower($_COOKIE['login'])."' ,'Alterou o reporte (".strtolower($row['id_rep'])."), onde tipo do crime: (".strtolower($row['criminal']).") para: ($criminal).' )");
			$dbconn -> query ("UPDATE `crimereport` SET `criminal` = '$criminal' WHERE `crimereport`.`id_rep` = $idrepv");
		}
		if(($_POST['addinfo']) != ($row['addinfo'])){
			$addinfo = $_POST['addinfo'];
			$dbconn -> query ("INSERT INTO `logadm`(`id_lad`,`logdt`,`id_adm`,`logadminfo`) VALUES ('NULL',NOW(),' ".strtolower($_COOKIE['login'])."' ,'Alterou o reporte (".strtolower($row['id_rep'])."), onde tipo do crime: (".strtolower($row['addinfo']).") para: ($addinfo).' )");
			$dbconn -> query ("UPDATE `crimereport` SET `addinfo` = '$addinfo' WHERE `crimereport`.`id_rep` = $idrepv");
		}
		if(($_POST['distr']) != ($row['distr'])){
			$distr = $_POST['distr'];
			$dbconn -> query ("INSERT INTO `logadm`(`id_lad`,`logdt`,`id_adm`,`logadminfo`) VALUES ('NULL',NOW(),' ".strtolower($_COOKIE['login'])."' ,'Alterou o reporte (".strtolower($row['id_rep'])."), onde tipo do crime: (".strtolower($row['distr']).") para: ($distr).' )");
			$dbconn -> query ("UPDATE `crimereport` SET `distr` = '$distr' WHERE `crimereport`.`id_rep` = $idrepv");
		}
		header ("Location: admcrimes.php");
	}
	
	if(isset($_POST['vanish'])){
		
		$dbconn -> query ("INSERT INTO `logadm`(`id_lad`,`logdt`,`id_adm`,`logadminfo`) VALUES ('NULL',NOW(),' ".strtolower($_COOKIE['login'])."' ,'Deletado crime reportado (".strtolower($row['id_rep']).") pelo usuário: (".strtolower($row['id_usu'])."), na data: (".strtolower($row['dtime'])."), com as seguintes informações: (".strtolower($row['addinfo'])."), criminoso: (".strtolower($row['criminal'])."), crime: (".strtolower($row['crimetype'])."), no bairro: (".strtolower($row['distr'])."). ' )");
		
		$dbconn -> query ("DELETE FROM `crimereport` WHERE `crimereport`.`id_rep` = $idrepv ");
		header ("Location: admcrimes.php");
	}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<title>Visualizar reporte - <?php echo ''.$row["crimetype"]; ?> - <?php echo ''.$row["name"]; ?></title>
	
</head>

<?php
	include '../header.php';
?>
<link rel="stylesheet" type="text/css" href="../css/header.css" />

<body>
	<a href="admcrimes.php" class="linkbutton">Voltar</a>
	<br>
	
	Nome do usuário: <?php if($row2) { echo ''.$row2["name"]; } else { echo 'Usuário deletado.'; }?>
	<br>
	Data do cadastro: <?php if($row2) { echo ''.$row2["rdate"]; } else { echo 'Usuário deletado.'; } ?>
	<br><hr><br>
	
	<form method="post">
		<label for="bairro">Bairro onde aconteceu o crime:</label>
		<select id="bairro" name="distr">
			<option value="<?php echo ''.$row["distr"]; ?>"> <?php echo ''.$row["distr"]; ?> </option>
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
			<option value="<?php echo ''.$row["crimetype"]; ?>"> <?php echo ''.$row["crimetype"]; ?> </option>
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
			<option value="<?php echo ''.$row["criminal"]; ?>"> <?php echo ''.$row["criminal"]; ?> </option>
			<option value="A pé">A pé</option>
			<option value="A moto">A moto</option>
			<option value="A carro">A carro</option>
		</select>
		<br>
		<label for="addinfo">Informações relatadas:</label>
		<textarea id="addinfo" name="addinfo"><?php echo ''.$row["addinfo"]; ?></textarea>
		<!-- readonly="" -->
		<br>
		<label for="horadata">Data e hora:</label>
		<?php echo '<input readonly type="datetime" value=" '.$dtime->format('d-M-y – H:i:s').' "/>'; ?>
		<br>
		<a href="admcrimes.php" class="linkbutton">Voltar</a>
		<input type="submit" name="vanish"  value="Excluir" onclick="return confirm('Tem certeza que quer apagar esse usuário?\n\tAÇÃO IRREVERSÍVEL!');">
		<input type="submit" name="submit"  value="Atualizar">
	</form>
	
</body>

<?php
	include '../footer.php';
?>
<link rel="stylesheet" type="text/css" href="../css/footer.css" />

</html>