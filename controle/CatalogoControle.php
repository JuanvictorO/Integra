<?php
session_start();
include_once '../classes/Catalogo.php';
include_once '../dao/CatalogoDAO.php';
include_once '../dao/FarmaciaDAO.php';

class CatalogoControle
{
	public function verificar()
	{
		extract($_REQUEST);
		$x = 0;
		if(!isset($id_produto) || empty($id_produto)){
			$x = 1;
		}
		if(!isset($_SESSION['id_farmacia']) || empty($_SESSION['id_farmacia'])){
			$x = 1;
		}
		if($x == 1){
			return false;
		}
		else{
			$produto = new catalogo($id_produto,$_SESSION['id_farmacia']);
			return $produto;
		}
	}

	public function incluir()
	{
		$catalogo = $this->verificar();

		$catalogoDAO = new CatalogoDAO();

		try{
			$catalogoDAO->incluir($catalogo);
		} catch (PDOException $e){
			$msg = "Não foi possível registrar o produto no catálogo"."<br/>".$e->getMessage();
			echo $msg;
		}
	}

	public function listarCatalogos(){
		try{
			$catalogoDAO = new CatalogoDAO();
			$catalogo = $catalogoDAO->listarCatalogos();

			$farmaciaDAO = new FarmaciaDAO();
			$farmacia = $farmaciaDAO->listarFarmaciasCatalogo();

			$_SESSION['catalogo'] = $catalogo;
			$_SESSION['farmacia'] = $farmacia;

			header('Location: ../catalogos.php');
		} catch (PDOException $e) {
            echo "ERROR na função listarMeuCatalogo no CatalogoControle: " . $e->getMessage();
 		}
    }

	public function listarMeuCatalogo(){
		try{
			$catalogoDAO = new CatalogoDAO();
			$catalogo = $catalogoDAO->listarMeuCatalogo($_SESSION['id_farmacia']);
			$_SESSION['catalogo'] = json_encode($catalogo);
			header('Location: ../catalogo.php');
		} catch (PDOException $e) {
            echo "ERROR na função listarMeuCatalogo no CatalogoControle: " . $e->getMessage();
 		}
    }
    public function listarMeuCatalogoAjax(){
		try{
			$catalogoDAO = new CatalogoDAO();
			$catalogo = $catalogoDAO->listarMeuCatalogo($_SESSION['id_farmacia']);
			echo json_encode($catalogo);
		} catch (PDOException $e) {
            echo "ERROR na função listarMeuCatalogo no CatalogoControle: " . $e->getMessage();
 		}
    }

    public function excluir()
	{
		extract($_REQUEST);
		$catalogoDAO = new CatalogoDAO();
		try{
			$catalogoDAO->excluir($id_catalogo);
		} catch (PDOException $e){
			$msg = "Não foi possível registrar o produto no catálogo"."<br/>".$e->getMessage();
			echo $msg;
		}
	}
}