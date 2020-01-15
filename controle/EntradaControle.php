<?php

session_start();
if(!isset($_SESSION['id_farmacia'])){
	header('Location: deslogar.php');
}

include_once '../classes/Entrada.php';
include_once '../dao/EntradaDAO.php';

class EntradaControle
{
	public function incluir(){
		extract($_REQUEST);	
		$y = 0;
		if(!isset($conta) || empty($conta)){
			$msg .= "Nenhum produto foi adicionado no estoque, favor informar um produto válido e uma quantidade! <i class='fas fa-exclamation-circle'></i><br/>";
			$y = 1;
		}
		if($y == 1){
			$_SESSION['msg'] = $msg;
			header('Location: ../entrada.php');
		} else{
			$id = "id";
		$qtdd = "qtd";
		
		$entradaDAO = new EntradaDAO();
		$id_farmacia = $_SESSION['id_farmacia'];

		$x = 1;

		try{
			while($x<=$conta){
			if(isset(${$id.$x})){
				$id_produto = explode("-",${$id.$x});
				$id_produto = $id_produto[0];

				$qtd = ${$qtdd.$x};

				$entrada = new Entrada($id_produto,$id_farmacia,$qtd);
				$entradaDAO->incluir($entrada);
			}
			$x++;
		}
		$_SESSION['sucesso'] = "Os produtos foram adicionados no estoque com sucesso!<i class='fas fa-check-circle'></i>";
		header('Location: ../entrada.php');
		} catch (PDOException $e){
            $msg= "Não foi possível adicionar a entrada"."<br>".$e->getMessage();
            echo $msg;
        }
		}	
	}
}