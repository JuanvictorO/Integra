<?php
session_start();
if(!isset($_SESSION['id_farmacia'])){
	header('Location: deslogar.php');
}


include_once '../classes/Estoque.php';
include_once '../dao/EstoqueDAO.php';

class EstoqueControle
{
	
	public function listarMeuEstoque()
	{
		try{
			$estoqueDAO = new EstoqueDAO();
			$estoque = $estoqueDAO->listarMeuEstoque($_SESSION['id_farmacia']);
			$_SESSION['estoque'] = json_encode($estoque);
			header('Location: ../estoque.php');
		} catch (PDOException $e) {
            echo "ERROR na função listarEstoque no EstoqueControle: " . $e->getMessage();
 		}
	}

	public function listarMeuEstoqueAjax()
	{
		try{
			$estoqueDAO = new EstoqueDAO();
			$estoque = $estoqueDAO->listarMeuEstoque($_SESSION['id_farmacia']);
			echo json_encode($estoque);
		} catch (PDOException $e) {
            echo "ERROR na função listarEstoque no EstoqueControle: " . $e->getMessage();
 		}
	}
	public function excluir(){
		extract($_REQUEST);
		$estoqueDAO = new EstoqueDAO();

		try{
			$estoqueDAO->excluir($id_produto);
		} catch (PDOException $e){
			$msg = "Não foi possível excluir o produto do estoque!"."<br/>".$e->getMessage();
			echo $msg;
		}
	}
}
