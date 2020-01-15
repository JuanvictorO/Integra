<?php

include_once '../classes/Saida.php';
require_once 'Conexao.php'; 

class SaidaDAO
{
	public function incluir($saida){
		try{
			$pdo = Conexao::connect();

			$sql = 'INSERT INTO saida( id_produto, id_farmacia, qtd)
					VALUES(:id_produto, :id_farmacia, :qtd)';
			$sql = str_replace("'","\'",$sql);

			$stmt = $pdo->prepare($sql);

			$id_produto = $saida->getId_produto();
			$id_farmacia = $saida->getId_farmacia();
			$qtd = $saida->get_qtd();

			$stmt->bindParam(':id_produto',$id_produto);
			$stmt->bindParam(':id_farmacia',$id_farmacia);
			$stmt->bindParam(':qtd',$qtd);

			$stmt->execute();
		} catch (PDOException $e) {
			echo 'Error: <b> na Função inserir saida = ' . $sql . '</b><br/><br/>' . $e->getMessage();
		}
	}

	public function excluir($id_produto){
		try{

			$pdo = Conexao::connect();

			$sql = 'DELETE FROM saida WHERE id_produto = :id_produto';
			$sql = str_replace("'","\'",$sql);

			$stmt = $pdo->prepare($sql);

			$stmt->bindParam(':id_produto',$id_produto);

			$stmt->execute();
		} catch (PDOException $e) {
			echo 'Error: <b> na Função excluir saida = ' . $sql . '</b><br/><br/>' . $e->getMessage();
		}
	}
}