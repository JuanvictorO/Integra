<?php
	session_start();
	if(isset($_POST['cor']) && isset($_POST['tamanho'])){
		$x = $_POST['cor'];
		$y = $_POST['tamanho'];
		$_SESSION['cor'] = $x;
		$_SESSION['tam'] = $y;
		header('Location: ../'.$_POST['url']);
	}
	else{
		header('Location: ../index.php');
	}
?>