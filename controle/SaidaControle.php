<?php

session_start();
if(!isset($_SESSION['id_farmacia'])){
	header('Location: deslogar.php');
}

include_once '../classes/Saida.php';
include_once '../dao/SaidaDAO.php';

class SaidaControle
{
	public function incluir(){
		extract($_REQUEST);	
		$y = 0;
		if(!isset($conta) || empty($conta)){
			$msg .= "Nenhum produto foi removido do estoque, favor informar um produto válido e uma quantidade! <i class='fas fa-exclamation-circle'></i><br/>";
			$y = 1;
		}
		if($y == 1){
			$_SESSION['msg'] = $msg;
			header('Location: ../saida.php');
		} else{
			$id = "id";
		$qtdd = "qtd";
		
		$saidaDAO = new saidaDAO();
		$id_farmacia = $_SESSION['id_farmacia'];

		$x = 1;

		try{
			while($x<=$conta){
			if(isset(${$id.$x})){
				$id_produto = explode("-",${$id.$x});
				$id_produto = $id_produto[0];

				$qtd = ${$qtdd.$x};

				$saida = new saida($id_produto,$id_farmacia,$qtd);
				$saidaDAO->incluir($saida);
			}
			$x++;
		}
		$_SESSION['sucesso'] = "Os produtos foram removidos do estoque com sucesso!<i class='fas fa-check-circle'></i>";
		header('Location: ../saida.php');
		} catch (PDOException $e){
            $msg= "Não foi possível adicionar a saida"."<br>".$e->getMessage();
            echo $msg;
        }
		}	
	}
}