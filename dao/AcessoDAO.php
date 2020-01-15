<?php
include_once '../classes/Usuario.php';
require_once'Conexao.php';
/**
 * 
 */
class AcessoDAO
{
	// Verifica se a senha corresponde ao email passado
	public function logar($email)
	{
		try{
			$pdo = Conexao::connect();
			$sql = "SELECT senha FROM farmacia WHERE email = :email";
			$sql = str_replace("'", "\'", $sql);
			$consulta = $pdo->prepare($sql);
			$consulta->execute(array(
				':email' => $email
			));
			while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
				$senha = $linha['senha'];
			}
			return $senha;
		} catch (PDOException $e){
			throw $e;
		}
	}
	public function verifica_email($email)
	{
		try{
			$pdo = Conexao::connect();
			$sql = "SELECT email FROM farmacia WHERE email = :email";
			$sql = str_replace("'", "\'", $sql);

			$consulta = $pdo->prepare($sql);
			$consulta->execute(array(
				':email' => $email
			));
			while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
				$email2 = $linha['email'];
			}
			return $email2;
		} catch (PDOException $e){
			throw $e;
		}
	}
	public function email_atual($id_farmacia)
	{
		try{
			$pdo = Conexao::connect();
			$sql = "SELECT email FROM farmacia WHERE id_farmacia = :id_farmacia";
			$sql = str_replace("'", "\'", $sql);

			$consulta = $pdo->prepare($sql);
			$consulta->execute(array(
				':id_farmacia' => $id_farmacia
			));
			while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
				$id = $linha['email'];
			}
			return $id;
		} catch (PDOException $e){
			throw $e;
		}
	}
	public function buscar_id($email){
		try{
			$pdo = Conexao::connect();
			$sql = "SELECT id_farmacia FROM farmacia WHERE email = :email";
			$sql = str_replace("'", "\'", $sql);

			$consulta = $pdo->prepare($sql);
			$consulta->execute(array(
				':email' => $email
			));
			while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
				$id_farmacia = $linha['id_farmacia'];
			}
			return $id_farmacia;
		} catch (PDOException $e){
			throw $e;
		}
	}
}