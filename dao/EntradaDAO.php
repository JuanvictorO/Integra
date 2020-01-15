<?php

include_once '../classes/Entrada.php';
require_once 'Conexao.php'; 

class EntradaDAO
{
	public function incluir($entrada){
		try{
			$pdo = Conexao::connect();

			$sql = 'INSERT INTO entrada( id_produto, id_farmacia, qtd)
					VALUES(:id_produto, :id_farmacia, :qtd)';
			$sql = str_replace("'","\'",$sql);

			$stmt = $pdo->prepare($sql);

			$id_produto = $entrada->getId_produto();
			$id_farmacia = $entrada->getId_farmacia();
			$qtd = $entrada->get_qtd();

			$stmt->bindParam(':id_produto',$id_produto);
			$stmt->bindParam(':id_farmacia',$id_farmacia);
			$stmt->bindParam(':qtd',$qtd);

			$stmt->execute();
		} catch (PDOException $e) {
			echo 'Error: <b> na Função inserir entrada = ' . $sql . '</b><br/><br/>' . $e->getMessage();
		}
	}

	public function excluir($id_produto){
		try{

			$pdo = Conexao::connect();

			$sql = 'DELETE FROM entrada WHERE id_produto = :id_produto';
			$sql = str_replace("'","\'",$sql);

			$stmt = $pdo->prepare($sql);

			$stmt->bindParam(':id_produto',$id_produto);

			$stmt->execute();
		} catch (PDOException $e) {
			echo 'Error: <b> na Função excluir entrada = ' . $sql . '</b><br/><br/>' . $e->getMessage();
		}
	}
}