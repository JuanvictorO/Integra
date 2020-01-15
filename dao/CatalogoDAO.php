<?php

include_once '../classes/Catalogo.php';
require_once 'Conexao.php';

class CatalogoDAO
{

	public function formatoDataDMY($data)
    {
        $data_arr = explode("-", $data);
        
        $data = $data_arr[2] . '/' . $data_arr[1] . '/' . $data_arr[0];
        
        return $data;
    }

	public function incluir($catalogo){
		try{	
			$pdo = Conexao::connect();

			$sql = 'INSERT INTO catalogo( id_produto, id_farmacia)
					VALUES(:id_produto, :id_farmacia)';
			$sql = str_replace("'","\'",$sql);

			$stmt = $pdo->prepare($sql);

			$id_produto = $catalogo->getId_produto();
			$id_farmacia = $catalogo->getId_farmacia();

			$stmt->bindParam(':id_produto',$id_produto);
			$stmt->bindParam(':id_farmacia',$id_farmacia);

			$stmt->execute();
		} catch (PDOException $e) {
			echo 'Error: <b> na Função inserir catalogo = ' . $sql . '</b><br/><br/>' . $e->getMessage();
		}
	}

	public function listarCatalogos(){
		try{
			$pdo = Conexao::connect();
			$sql = 'SELECT c.id_farmacia, p.nome_produto, p.preco_venda,p.data_validade, f.nome_farmacia FROM catalogo c INNER JOIN produto p ON c.id_produto = p.id_produto INNER JOIN farmacia f ON f.id_farmacia = c.id_farmacia';
			$sql = str_replace("'", "\'", $sql);
			$stmt = $pdo->prepare($sql);
			$stmt->execute();

			$x=0;
			$catalogo = array();
			while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
				$catalogo[$x] = array(
					'id_farmacia'=>$linha['id_farmacia'],
					'nome_produto'=>$linha['nome_produto'],
					'data_validade'=>$linha['data_validade'],
					'preco_venda'=>$linha['preco_venda'],
					'nome_farmacia'=>$linha['nome_farmacia']
				);
				$x++;
			}
			return json_encode($catalogo);
		} catch(PDOExeption $e){
            echo 'Erro: ' .  $e->getMessage();
        }
	}

	public function listarMeuCatalogo($id_farmacia){
		try{
			$pdo = Conexao::connect();
			$sql = 'SELECT c.id_catalogo, p.nome_produto, p.data_fabricacao ,p.data_validade, p.preco_venda FROM catalogo c RIGHT JOIN produto p ON c.id_produto = p.id_produto WHERE c.id_farmacia = :id_farmacia';
			$sql = str_replace("'", "\'", $sql);

			$stmt = $pdo->prepare($sql);

			$stmt->bindParam(':id_farmacia',$id_farmacia);

			$stmt->execute();

			$catalogo = array();
			$x = 0;
			while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
				$catalogo[$x] = array(
					'id_catalogo'=>$linha['id_catalogo'],
					'nome_produto'=>$linha['nome_produto'],
					'data_fabricacao'=>$this->formatoDataDMY($linha['data_fabricacao']),
					'data_validade'=>$this->formatoDataDMY($linha['data_validade']),
					'preco_venda'=>$linha['preco_venda']
				);
				$x++;
			}
			return $catalogo;
		} catch(PDOExeption $e){
            echo 'Erro: ' .  $e->getMessage();
        }
	}
	public function verifica_produto($id_produto)
	{
		try{
			$pdo = Conexao::connect();
			$sql = "SELECT id_produto FROM catalogo WHERE id_produto = :id_produto";
			$sql = str_replace("'", "\'", $sql);

			$consulta = $pdo->prepare($sql);
			$consulta->execute(array(
				':id_produto' => $id_produto
			));
			$id = 0;
			while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
				$id = $linha['id_produto'];
			}
			return $id;
		} catch (PDOException $e){
			throw $e;
		}
	}

	public function excluir($id_catalogo){
		try{	
			$pdo = Conexao::connect();

			$sql = 'DELETE FROM catalogo WHERE id_catalogo = :id_catalogo';
			$sql = str_replace("'","\'",$sql);

			$stmt = $pdo->prepare($sql);

			$stmt->bindParam(':id_catalogo',$id_catalogo);

			$stmt->execute();
		} catch (PDOException $e) {
			echo 'Error: <b> na Função inserir catalogo = ' . $sql . '</b><br/><br/>' . $e->getMessage();
		}
	}

	public function excluir_p($id_produto){
		try{	
			$pdo = Conexao::connect();

			$sql = 'DELETE FROM catalogo WHERE id_produto = :id_produto';
			$sql = str_replace("'","\'",$sql);

			$stmt = $pdo->prepare($sql);

			$stmt->bindParam(':id_produto',$id_produto);

			$stmt->execute();
		} catch (PDOException $e) {
			echo 'Error: <b> na Função inserir catalogo = ' . $sql . '</b><br/><br/>' . $e->getMessage();
		}
	}

}