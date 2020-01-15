<?php
session_start();
if(isset($_SESSION['id_farmacia'])){
	unset( $_SESSION['id_farmacia'] );
	header('Location: ../login.php');
}
else{
	header('Location: ../login.php');	
}