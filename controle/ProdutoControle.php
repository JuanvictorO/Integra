<?php
session_start();
if(!isset($_SESSION['id_farmacia'])){
	header('Location: deslogar.php');
}


include_once '../classes/Produto.php';
include_once '../dao/ProdutoDAO.php';
include_once '../dao/CatalogoDAO.php';
include_once '../dao/EstoqueDAO.php';
include_once '../dao/EntradaDAO.php';
include_once '../dao/SaidaDAO.php';

/**
 * 
 */
class ProdutoControle
{
	
	public function verificar()
	{
		extract($_REQUEST);
		$x = 0;
		if(!isset($nome_produto) || empty($nome_produto)){
			$msg .= "Nome do produto não informado, favor informar um nome! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}
		if(!isset($data_fabricacao) || empty($data_fabricacao)){
			$msg .= "Data de fabricação não informada, favor informar uma data! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}
		if(!isset($data_validade) || empty($data_validade)){
			$msg .= "Data de validade não informada, favor informar uma data! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}
		if(!isset($situacao) || empty($situacao) || $situacao == "blank"){
			$msg .= "Situação do produto não informada, favor informar uma situação! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}
		if(!isset($preco_pago) || empty($preco_pago)){
			$msg .= "Preço pago pelo produto não informado, favor informar um preço! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}
		if(!isset($preco_venda) || empty($preco_venda)){
			$msg .= "Preço de venda do produto não informado, favor informar um preço! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}
		if($x == 1){
			session_start();
			$_SESSION['msg'] = $msg;
			header('Location: ../cadastro.php');
		}
		else{
			$produto = new produto($_SESSION['id_farmacia'],$nome_produto,$data_fabricacao,$data_validade,$situacao,$preco_pago,$preco_venda);
			return $produto;
		}
	}

	public function verificar_alterar()
	{
		extract($_REQUEST);
		$x = 0;
		if(!isset($id_produto) || empty($id_produto)){
			$msg .= "Algo deu errado, tente novamente mais tarde! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}
		if(!isset($nome_produto) || empty($nome_produto)){
			$msg .= "Nome do produto não informado, favor informar um nome! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}
		if(!isset($data_fabricacao) || empty($data_fabricacao)){
			$msg .= "Data de fabricação não informada, favor informar uma data! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}
		if(!isset($data_validade) || empty($data_validade)){
			$msg .= "Data de validade não informada, favor informar uma data! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}
		if(!isset($situacao) || empty($situacao) || $situacao == "blank"){
			$msg .= "Situação do produto não informada, favor informar uma situação! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}
		if(!isset($preco_pago) || empty($preco_pago)){
			$msg .= "Preço pago pelo produto não informado, favor informar um preço! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}
		if(!isset($preco_venda) || empty($preco_venda)){
			$msg .= "Preço de venda do produto não informado, favor informar um preço! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}
		if($x == 1){
			session_start();
			$_SESSION['msg'] = $msg;
			header('Location: ../cadastro.php');
		}
		else{
			$produto = new produto($_SESSION['id_farmacia'],$nome_produto,$data_fabricacao,$data_validade,$situacao,$preco_pago,$preco_venda);
			$produto->setId_produto($id_produto);
			return $produto;
		}
	}

	public function incluir(){
		$produto = $this->verificar();

		$produtoDAO = new ProdutoDAO();

		try{
			$produtoDAO->incluir($produto);
		} catch (PDOException $e){
			$msg = "Não foi possível registrar o produto"."<br/>".$e->getMessage();
			echo $msg;
		}
	}
	public function alterar(){
		$produto = $this->verificar_alterar();

		$produtoDAO = new ProdutoDAO();

		try{
			$produtoDAO->alterar($produto);
			header('Location: ../produtos.php');
		} catch (PDOException $e){
			$msg = "Não foi possível registrar o produto"."<br/>".$e->getMessage();
			echo $msg;
		}
	}

	public function listarProdutos(){
		extract($_REQUEST);
		try{
			$produtoDAO = new ProdutoDAO();
			$produto = $produtoDAO->listarProdutos($id_farmacia);
			echo json_encode($produto);
		} catch (PDOException $e) {
            echo "ERROR na função listarProduto no ProdutoControle: " . $e->getMessage();
 		}
    }
    public function listarMeusProdutos(){
		extract($_REQUEST);
		try{
			$produtoDAO = new ProdutoDAO();
			$produto = $produtoDAO->listarMeusProdutos($_SESSION['id_farmacia']);
			$_SESSION['produtos'] = json_encode($produto);
			header('Location: ../produtos.php');
		} catch (PDOException $e) {
            echo "ERROR na função listarMeusProdutos no ProdutoControle: " . $e->getMessage();
 		}
    }
    public function listarMeusProdutosAjax(){
		extract($_REQUEST);
		try{
			$produtoDAO = new ProdutoDAO();
			$produto = $produtoDAO->listarMeusProdutos($_SESSION['id_farmacia']);
			echo json_encode($produto);
		} catch (PDOException $e) {
            echo "ERROR na função listarMeusProdutosAjax no ProdutoControle: " . $e->getMessage();
 		}
    }

    public function listarProdutosNoEstoque(){
		extract($_REQUEST);
		try{
			$produtoDAO = new ProdutoDAO();
			$produto = $produtoDAO->listarProdutosNoEstoque($id_farmacia);
			echo json_encode($produto);
		} catch (PDOException $e) {
            echo "ERROR na função listarProduto no ProdutoControle: " . $e->getMessage();
 		}
    }

    public function excluir()
	{
		extract($_REQUEST);
		$catalogoDAO = new CatalogoDAO();
		$estoqueDAO = new EstoqueDAO();
		$entradaDAO = new EntradaDAO();
		$saidaDAO = new SaidaDAO();
		$produtoDAO = new ProdutoDAO();
		echo $id_produto;
		try{
			$catalogoDAO->excluir_p($id_produto);

			$estoqueDAO->excluir($id_produto);

			$saidaDAO->excluir($id_produto);

			$entradaDAO->excluir($id_produto);

			$produtoDAO->excluir($id_produto);

		} catch (PDOException $e){
			$msg = "Não foi possível registrar o produto no catálogo"."<br/>".$e->getMessage();
			echo $msg;
		}
	}
}