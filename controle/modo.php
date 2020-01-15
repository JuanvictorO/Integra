<?php
	session_start();
	if(isset($_GET['modo']) && isset($_SESSION['modo'])){
		if($_SESSION['modo'] == 'normal'){
			$_SESSION['modo'] = 'noturno';
			header('Location: ../'.$_GET['url']);
		}
		else{
			$_SESSION['modo'] = 'normal';
			header('Location: ../'.$_GET['url']);
		}
	}
	else if(isset($_GET['modo'])){
		$_SESSION['modo'] = 'noturno';
		header('Location: ../'.$_GET['url']);
	} 
	else{
		header('Location: ../index.php');
	}
?>