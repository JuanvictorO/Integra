<?php
	extract($_REQUEST);
	if(!isset($nomeClasse) || !isset($metodo)){
		header('Location: ../cadastro.php');
	}
	include_once $nomeClasse.".php";
	$objeto= new $nomeClasse();
	$objeto->$metodo();
?>