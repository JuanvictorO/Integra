<?php

include_once '../classes/Farmacia.php';
require_once'Conexao.php';

/**
 * 
 */
class FarmaciaDAO
{
	public function incluir($farmacia)
	{
		try{
			$pdo = Conexao::connect();

			$sql = 'INSERT INTO farmacia(
				nome_farmacia, email, telefone, cpf_cnpj, crj, estado, cidade, endereco, senha)
				VALUES( :nome_farmacia, :email, :telefone, :cpf_cnpj, :crj, :estado, :cidade, :endereco, :senha)';
			$sql = str_replace("'", "\'", $sql);

			$stmt = $pdo->prepare($sql);

			$nome_farmacia = $farmacia->get_nome_farmacia();
			$email = $farmacia->get_email();
			$telefone = $farmacia->get_telefone();
			$cpf_cnpj = $farmacia->get_cpf_cnpj();
			$crj = $farmacia->get_crj();
			$estado = $farmacia->get_estado();
			$cidade = $farmacia->get_cidade();
			$endereco = $farmacia->get_endereco();
			$senha = $farmacia->get_senha();

			$stmt->bindParam(':nome_farmacia',$nome_farmacia);
			$stmt->bindParam(':email',$email);
			$stmt->bindParam(':telefone',$telefone);
			$stmt->bindParam(':cpf_cnpj',$cpf_cnpj);
			$stmt->bindParam(':crj',$crj);
			$stmt->bindParam(':estado',$estado);
			$stmt->bindParam(':cidade',$cidade);
			$stmt->bindParam(':endereco',$endereco);
			$stmt->bindParam(':senha',$senha);

			$stmt->execute();		
		}catch (PDOException $e) {
			echo 'Error: <b> na tabela farmacia = ' . $sql . '</b><br/><br/>' . $e->getMessage();
		}
	}
	public function listarNome($id_farmacia){
		try{
			$pdo = Conexao::connect();
			$sql = 'SELECT nome_farmacia FROM farmacia WHERE id_farmacia = :id_farmacia';
			$sql = str_replace("'", "\'", $sql);
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':id_farmacia',$id_farmacia);
			$stmt->execute();

			while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
				$nome_farmacia = $linha['nome_farmacia'];
			}
			return $nome_farmacia;
		} catch(PDOExeption $e){
            echo 'Erro na função listarNome no DAO: ' .  $e->getMessage();
        }
	}
	public function listarFarmacia($id_farmacia){
		try{
			$pdo = Conexao::connect();
			$sql = 'SELECT nome_farmacia, email, telefone, cpf_cnpj, crj, estado, cidade, endereco FROM farmacia WHERE id_farmacia = :id_farmacia';
			$sql = str_replace("'", "\'", $sql);
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':id_farmacia',$id_farmacia);
			$stmt->execute();

			$farmacia = array();
			$x = 0;
			while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
				$farmacia[$x] = array(
					'nome_farmacia'=>$linha['nome_farmacia'],
					'email'=>$linha['email'],
					'telefone'=>$linha['telefone'],
					'cpf_cnpj'=>$linha['cpf_cnpj'],
					'crj'=>$linha['crj'],
					'estado'=>$linha['estado'],
					'cidade'=>$linha['cidade'],
					'endereco'=>$linha['endereco']
				);
				$x++;
			}
			return json_encode($farmacia);

		} catch(PDOExeption $e){
            echo 'Erro: ' .  $e->getMessage();
        }
	}
	public function listarFarmaciaa($id_farmacia){
		try{
			$pdo = Conexao::connect();
			$sql = 'SELECT nome_farmacia, email, telefone, estado, cidade, endereco FROM farmacia WHERE id_farmacia = :id_farmacia';
			$sql = str_replace("'", "\'", $sql);
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':id_farmacia',$id_farmacia);
			$stmt->execute();

			$farmacia = array();
			$x = 0;
			while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
				$farmacia[$x] = array(
					'nome_farmacia'=>$linha['nome_farmacia'],
					'email'=>$linha['email'],
					'telefone'=>$linha['telefone'],
					'estado'=>$linha['estado'],
					'cidade'=>$linha['cidade'],
					'endereco'=>$linha['endereco']
				);
				$x++;
			}
			return json_encode($farmacia);

		} catch(PDOExeption $e){
            echo 'Erro: ' .  $e->getMessage();
        }
	}
	public function listarFarmacias($id_farmacia){
		try{
			$pdo = Conexao::connect();
			$sql = 'SELECT id_farmacia, nome_farmacia, estado, cidade, telefone FROM farmacia';
			$sql = str_replace("'", "\'", $sql);
			$stmt = $pdo->prepare($sql);
			$stmt->execute();

			$farmacia = array();
			$x = 0;
			while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
				if($linha['id_farmacia'] != $id_farmacia){
					$farmacia[$x] = array(
						'id_farmacia'=>$linha['id_farmacia'],
						'nome_farmacia'=>$linha['nome_farmacia'],
						'estado'=>$linha['estado'],
						'cidade'=>$linha['cidade'],
						'telefone'=>$linha['telefone']
					);
				}
				$x++;
			}
			return json_encode($farmacia);

		} catch(PDOExeption $e){
            echo 'Erro: ' .  $e->getMessage();
        }
	}
	public function listarFarmaciasCatalogo(){
		try{
			$pdo = Conexao::connect();
			$sql = 'SELECT id_farmacia, nome_farmacia, estado, cidade, telefone, email, endereco FROM farmacia';
			$sql = str_replace("'", "\'", $sql);
			$stmt = $pdo->prepare($sql);
			$stmt->execute();

			$farmacia = array();
			while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
					$farmacia[$linha['id_farmacia']] = array(
						'nome_farmacia'=>$linha['nome_farmacia'],
						'estado'=>$linha['estado'],
						'cidade'=>$linha['cidade'],
						'telefone'=>$linha['telefone'],
						'email'=>$linha['email'],
						'endereco'=>$linha['endereco']
					);
			}
			return json_encode($farmacia);

		} catch(PDOExeption $e){
            echo 'Erro: ' .  $e->getMessage();
        }
	}

	public function alterar($farmacia)
	{
		try{
			$pdo = Conexao::connect();

			$sql = 'UPDATE farmacia SET nome_farmacia = :nome_farmacia, email = :email, telefone = :telefone, cpf_cnpj = :cpf_cnpj, crj = :crj, estado = :estado, cidade = :cidade, endereco = :endereco WHERE id_farmacia = :id_farmacia';
			$sql = str_replace("'", "\'", $sql);

			$stmt = $pdo->prepare($sql);

			$id_farmacia = $farmacia->getId_farmacia();
			$nome_farmacia = $farmacia->get_nome_farmacia();
			$email = $farmacia->get_email();
			$telefone = $farmacia->get_telefone();
			$cpf_cnpj = $farmacia->get_cpf_cnpj();
			$crj = $farmacia->get_crj();
			$estado = $farmacia->get_estado();
			$cidade = $farmacia->get_cidade();
			$endereco = $farmacia->get_endereco();

			$stmt->bindParam(':nome_farmacia',$nome_farmacia);
			$stmt->bindParam(':email',$email);
			$stmt->bindParam(':telefone',$telefone);
			$stmt->bindParam(':cpf_cnpj',$cpf_cnpj);
			$stmt->bindParam(':crj',$crj);
			$stmt->bindParam(':estado',$estado);
			$stmt->bindParam(':cidade',$cidade);
			$stmt->bindParam(':endereco',$endereco);
			$stmt->bindParam(':id_farmacia',$id_farmacia);

			$stmt->execute();		
		}catch (PDOException $e) {
			echo 'Error: <b> na tabela farmacia = ' . $sql . '</b><br/><br/>' . $e->getMessage();
		}
	}
}

?>