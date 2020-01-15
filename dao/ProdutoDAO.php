<?php

include_once '../classes/Produto.php';
require_once 'Conexao.php';

/**
 * 
 */
class ProdutoDAO
{
	public function formatoDataDMY($data)
    {
        $data_arr = explode("-", $data);
        
        $data = $data_arr[2] . '/' . $data_arr[1] . '/' . $data_arr[0];
        
        return $data;
    }
	
	public function incluir($produto)
	{
		try{
			$pdo = Conexao::connect();

			$sql = 'INSERT INTO produto(
				id_farmacia_produto, nome_produto, data_fabricacao, data_validade, situacao, preco_pago, preco_venda)
				VALUES( :id_farmacia_produto, :nome_produto, :data_fabricacao, :data_validade, :situacao, :preco_pago, :preco_venda)';
			$sql = str_replace("'", "\'", $sql);

			$stmt = $pdo->prepare($sql);

			$id_farmacia_produto = $produto->getId_farmacia_produto();
			$nome_produto = $produto->get_nome_produto();
			$data_fabricacao = $produto->get_data_fabricacao();
			$data_validade = $produto->get_data_validade();
			$situacao = $produto->get_situacao();
			$preco_pago = $produto->get_preco_pago();
			$preco_venda = $produto->get_preco_venda();

			$stmt->bindParam(':id_farmacia_produto',$id_farmacia_produto);
			$stmt->bindParam(':nome_produto',$nome_produto);
			$stmt->bindParam(':data_fabricacao',$data_fabricacao);
			$stmt->bindParam(':data_validade',$data_validade);
			$stmt->bindParam(':situacao',$situacao);
			$stmt->bindParam(':preco_pago',$preco_pago);
			$stmt->bindParam(':preco_venda',$preco_venda);

			$stmt->execute();
		} catch (PDOException $e) {
			echo 'Error: <b> na Função inserir produto = ' . $sql . '</b><br/><br/>' . $e->getMessage();
		}
	}

	public function alterar($produto)
	{
		try{
			$pdo = Conexao::connect();

			$sql = 'UPDATE produto SET id_farmacia_produto = :id_farmacia_produto,nome_produto = :nome_produto, data_fabricacao = :data_fabricacao, data_validade =:data_validade, situacao = :situacao, preco_pago =:preco_pago, preco_venda = :preco_venda WHERE id_produto = :id_produto';
			$sql = str_replace("'", "\'", $sql);

			$stmt = $pdo->prepare($sql);

			$id_farmacia_produto = $produto->getId_farmacia_produto();
			$nome_produto = $produto->get_nome_produto();
			$data_fabricacao = $produto->get_data_fabricacao();
			$data_validade = $produto->get_data_validade();
			$situacao = $produto->get_situacao();
			$preco_pago = $produto->get_preco_pago();
			$preco_venda = $produto->get_preco_venda();
			$id_produto = $produto->getId_produto();

			$stmt->bindParam(':id_farmacia_produto',$id_farmacia_produto);
			$stmt->bindParam(':nome_produto',$nome_produto);
			$stmt->bindParam(':data_fabricacao',$data_fabricacao);
			$stmt->bindParam(':data_validade',$data_validade);
			$stmt->bindParam(':situacao',$situacao);
			$stmt->bindParam(':preco_pago',$preco_pago);
			$stmt->bindParam(':preco_venda',$preco_venda);
			$stmt->bindParam(':id_produto',$id_produto);

			$stmt->execute();
		} catch (PDOException $e) {
			echo 'Error: <b> na Função inserir produto = ' . $sql . '</b><br/><br/>' . $e->getMessage();
		}
	}

	public function listarProdutos($id_farmacia){
		try{
			$produtos = array();
			$pdo = Conexao::connect();
			$sql = "SELECT id_produto, nome_produto, data_fabricacao, data_validade, preco_pago FROM produto WHERE id_farmacia_produto = :id_farmacia_produto";
			$stmt = $pdo->prepare($sql);

			$stmt->bindParam(':id_farmacia_produto',$id_farmacia);

			$stmt->execute();
			$x = 0;
			while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
				$produtos[$x] = 
				array(
					'id_produto'=>$linha['id_produto'], 
					'nome_produto'=>$linha['nome_produto'], 
					'data_fabricacao'=>$this->formatoDataDMY($linha['data_fabricacao']),
					'data_validade'=>$this->formatoDataDMY($linha['data_validade']),
					'preco_pago'=>$linha['preco_pago']
				);
				$x++;
			}
			return $produtos;

		} catch(PDOExeption $e){
        	echo 'Erro: ' .  $e->getMessage();
        }
    }
    public function listarMeusProdutos($id_farmacia){
		try{
			$produtos = array();
			$pdo = Conexao::connect();
			$sql = "SELECT id_produto, nome_produto, data_fabricacao, data_validade, situacao, preco_pago, preco_venda FROM produto WHERE id_farmacia_produto = :id_farmacia_produto";
			$stmt = $pdo->prepare($sql);

			$stmt->bindParam(':id_farmacia_produto',$id_farmacia);

			$stmt->execute();
			
			$catalogoDAO = new CatalogoDAO();
			while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
				$x = 0;
				$id_produto = $catalogoDAO->verifica_produto($linha['id_produto']);
				if($id_produto == $linha['id_produto']){
					$x = 1;
				}
				$produtos[$linha['id_produto']] = 
				array(
					'id_produto'=>$linha['id_produto'], 
					'nome_produto'=>$linha['nome_produto'], 
					'data_fabricacao'=>$this->formatoDataDMY($linha['data_fabricacao']),
					'data_validade'=>$this->formatoDataDMY($linha['data_validade']),
					'situacao'=>$linha['situacao'],
					'preco_pago'=>$linha['preco_pago'],
					'preco_venda'=>$linha['preco_venda'],
					'catalogo'=>$x
				);
				$x++;
			}
			return $produtos;

		} catch(PDOExeption $e){
        	echo 'Erro: ' .  $e->getMessage();
        }
    }
    public function listarProdutosNoEstoque($id_farmacia){
		try{
			$produtos = array();
			$pdo = Conexao::connect();
			$sql = "SELECT p.id_produto, p.nome_produto, p.data_fabricacao, p.data_validade, p.preco_pago, e.qtd FROM produto p INNER JOIN estoque e ON e.id_produto = p.id_produto WHERE p.id_farmacia_produto = :id_farmacia_produto";
			$stmt = $pdo->prepare($sql);

			$stmt->bindParam(':id_farmacia_produto',$id_farmacia);

			$stmt->execute();

			while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
				$produtos[$linha['id_produto']] = 
				array(
					'id_produto'=>$linha['id_produto'], 
					'nome_produto'=>$linha['nome_produto'], 
					'data_fabricacao'=>$this->formatoDataDMY($linha['data_fabricacao']),
					'data_validade'=>$this->formatoDataDMY($linha['data_validade']),
					'preco_pago'=>$linha['preco_pago'],
					'qtd'=>$linha['qtd']
				);
			}
			return $produtos;

		} catch(PDOExeption $e){
        	echo 'Erro: ' .  $e->getMessage();
        }
    }

    public function excluir($id_produto){
		try{

			$pdo = Conexao::connect();

			$sql = 'DELETE FROM produto WHERE id_produto = :id_produto';
			$sql = str_replace("'","\'",$sql);

			$stmt = $pdo->prepare($sql);

			$stmt->bindParam(':id_produto',$id_produto);

			$stmt->execute();
		} catch (PDOException $e) {
			echo 'Error: <b> na Função inserir catalogo = ' . $sql . '</b><br/><br/>' . $e->getMessage();
		}
	}
}
?>
