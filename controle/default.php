<?php
	session_start();
	if(isset($_GET['url']) && isset($_SESSION['cor']) && isset($_SESSION['tam'])){
		unset($_SESSION['cor']);
		unset($_SESSION['tam']);
    	header('Location: ../'.$_GET['url']);	
    }
    else if(isset($_GET['url'])){
    	header('Location: ../'.$_GET['url']);	
    }
    else{
    	header('Location: ../index.php');
    }
?>