<?php
	$dbconn = new mysqli("localhost", 
	"root", "", "arietedb");
	
	if(!$dbconn){
	  die("Erro! ~> ".mysqli_connect_error());
	}
	
?>