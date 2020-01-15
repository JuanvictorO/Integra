<?php

include_once '../classes/Estoque.php';
require_once 'Conexao.php';

class EstoqueDAO
{
	public function formatoDataDMY($data)
    {
        $data_arr = explode("-", $data);
        
        $data = $data_arr[2] . '/' . $data_arr[1] . '/' . $data_arr[0];
        
        return $data;
    }

	public function listarMeuEstoque($id_farmacia){
		try{
			$estoque = array();
			$pdo = Conexao::connect();
			$sql = "SELECT e.id_produto, p.nome_produto, e.qtd, p.data_fabricacao, p.data_validade, p.preco_pago, p.situacao FROM estoque e INNER JOIN produto p ON p.id_produto = e.id_produto WHERE e.id_farmacia = :id_farmacia ORDER BY p.nome_produto ASC, p.data_validade";
			$stmt = $pdo->prepare($sql);

			$stmt->bindParam(':id_farmacia',$id_farmacia);

			$stmt->execute();
			$x = 0;
			while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
				$estoque[$x] = array(
					'id_produto'=>$linha['id_produto'],
					'nome_produto'=>$linha['nome_produto'],
					'qtd'=>$linha['qtd'],
					'preco_pago'=>$linha['preco_pago'],
					'situacao'=>$linha['situacao'],
					'data_fabricacao'=>$this->formatoDataDMY($linha['data_fabricacao']),
					'data_validade'=>$this->formatoDataDMY($linha['data_validade'])
				);
				$x++;
			}
			return $estoque;
		} catch(PDOExeption $e){
        	echo 'Erro: ' .  $e->getMessage();
        }
	}
	public function excluir($id_produto){
		try{	
			$pdo = Conexao::connect();

			$sql = 'DELETE FROM estoque WHERE id_produto = :id_produto';
			$sql = str_replace("'","\'",$sql);

			$stmt = $pdo->prepare($sql);

			$stmt->bindParam(':id_produto',$id_produto);

			$stmt->execute();
		} catch (PDOException $e) {
			echo 'Error: <b> na Função inserir catalogo = ' . $sql . '</b><br/><br/>' . $e->getMessage();
		}
	}	
}