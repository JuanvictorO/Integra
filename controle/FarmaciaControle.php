<?php
session_start();
include_once '../classes/Farmacia.php';
include_once '../dao/FarmaciaDAO.php';
include_once '../classes/Usuario.php';
include_once '../dao/AcessoDAO.php';
include_once '../classes/Estoque.php';
include_once '../dao/EstoqueDAO.php';
/**
 * 
 */
class FarmaciaControle
{
	
	public function verificar()
	{
		extract($_REQUEST);
		$x = 0;
		if(!isset($nome_farmacia) || empty($nome_farmacia)){
			$msg .= "Nome da farmácia não informado, favor informar um nome! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}
		if(!isset($email) || empty($email)){
			$msg .= "Email não informado, favor informar um email! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}
		if(!isset($telefone) || empty($telefone)){
			$msg .= "Telefone não informado, favor informar um telefone! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}
		if(!isset($cpf_cnpj) || empty($cpf_cnpj)){
			$msg .= "CPF ou CNPJ não informado, favor informar um CPF/CNPJ! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}
		if(!isset($crj) || empty($crj)){
			$msg .= "CRF não informado, favor informar um CRJ! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}
		if(isset($crj) && strlen($crj) != 5){
			$msg .= "CRF inválido, favor informar um CRJ válido! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}
		if(isset($estado) && empty($estado)){
			$msg .= "Estado não informado, favor informar um estado! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}
		if(isset($estado) && strlen($estado) != 2){
			$msg .= "Estado inválido, favor informar um estado válido! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}
		if(isset($cidade) && empty($cidade)){
			$msg .= "Cidade não informada, favor informar uma cidade! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}
		if(isset($endereco) && empty($endereco)){
			$msg .= "Endereço não informado, favor informar um endereço! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}
		if(!isset($senha) || empty($senha)){
			$msg .= "Senha não informada, favor informar uma senha! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}
		if(!isset($rsenha) || empty($rsenha)){
			$msg .= "Repetição de senha não informada, favor informar uma senha! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}
		if(isset($senha) && isset($rsenha) && $senha != $rsenha){
			$msg .= "Senha e Repetição de senha estão diferentes, favor inserir a mesma senha nos dois campos! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}

		$acesso2DAO = new AcessoDAO();
		try{
			$verifica_email = $acesso2DAO->verifica_email($email);
		} catch (PDOException $e){
			echo "ERRO no AcessoDAO na function 'verifica_email':".$e->getMessage();
		}
		if($verifica_email == $email){
			$msg .= "Este email já está cadastrado em nosso sistema!<i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
			//EMAIL JÁ ENCONTRADO;
		}
		
		if($x == 1){
			session_start();
			$_SESSION['msg'] = $msg;
			header('Location: ../cadastro.php');
		}
		else{
			$farmacia = new farmacia($nome_farmacia,$email,$telefone,$cpf_cnpj,$crj,$estado,$cidade,$endereco);
			$senha = md5($senha);
			$farmacia->set_senha($senha);
			return $farmacia;
		}
	}

	public function verificar_alterar()
	{
		extract($_REQUEST);
		$x = 0;
		$msg = "";
		if(isset($_SESSION['id_farmacia'])){
			if(!isset($nome_farmacia) || empty($nome_farmacia)){
				$msg .= "Nome da farmácia não informado, favor informar um nome! <i class='fas fa-exclamation-circle'></i><br/>";
				$x = 1;
			}
			if(!isset($email) || empty($email)){
				$msg .= "Email não informado, favor informar um email! <i class='fas fa-exclamation-circle'></i><br/>";
				$x = 1;
			}
			if(!isset($telefone) || empty($telefone)){
				$msg .= "Telefone não informado, favor informar um telefone! <i class='fas fa-exclamation-circle'></i><br/>";
				$x = 1;
			}
			if(!isset($cpf_cnpj) || empty($cpf_cnpj)){
				$msg .= "CPF não informado, favor informar um CPF! <i class='fas fa-exclamation-circle'></i><br/>";
				$x = 1;
			}
			if(!isset($crj) || empty($crj)){
				$msg .= "CRF não informado, favor informar um CRJ! <i class='fas fa-exclamation-circle'></i><br/>";
				$x = 1;
			}
			if(isset($crj) && strlen($crj) != 5){
				$msg .= "CRF inválido, favor informar um CRJ válido! <i class='fas fa-exclamation-circle'></i><br/>";
				$x = 1;
			}
			if(isset($estado) && empty($estado)){
			$msg .= "Estado não informado, favor informar um estado! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}
		if(isset($estado) && strlen($estado) != 2){
			$msg .= "Estado inválido, favor informar um estado válido! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}
		if(isset($cidade) && empty($cidade)){
			$msg .= "Cidade não informada, favor informar uma cidade! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}
		if(isset($endereco) && empty($endereco)){
			$msg .= "Endereço não informado, favor informar um endereço! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}
			$acessoDAO = new AcessoDAO();
			try{
				$verifica_email = $acessoDAO->verifica_email($email);
				$email_atual = $acessoDAO->email_atual($_SESSION['id_farmacia']);
			} catch (PDOException $e){
				echo "ERRO no AcessoDAO na function 'verifica_email':".$e->getMessage();
			}
			if($email_atual != $email && $verifica_email == $email){
				$msg .= "Este email já está cadastrado em nosso sistema!<i class='fas fa-exclamation-circle'></i><br/>";
				$x = 1;
				//EMAIL JÁ ENCONTRADO;
			} 
			
			if($x == 1){
				session_start();
				$_SESSION['msg'] = $msg;
				header('Location: ../estoque.php');
			} else{
				$farmacia = new farmacia($nome_farmacia,$email,$telefone,$cpf_cnpj,$crj,$estado,$cidade,$endereco);
				$farmacia->setId_farmacia($_SESSION['id_farmacia']);
				return $farmacia;	
			}
		} else{
			header('Location: deslogar.php');
		}
	}

	public function incluir(){
		$farmacia = $this->verificar();
		$farmaciaDAO = new FarmaciaDAO();

		try{
			$farmaciaDAO->incluir($farmacia);
			session_start();
			$_SESSION['sucesso'] = "Você foi cadastrado com sucesso!<i class='fas fa-check-circle'></i>";
			header('Location: ../login.php');
		} catch (PDOException $e){
			$msg = "Não foi possível registrar a farmácia"."<br/>".$e->getMessage();
			echo $msg;
		}
	}

	public function alterar(){
		$farmacia = $this->verificar_alterar();

		$farmaciaDAO = new FarmaciaDAO();

		try{
			$farmaciaDAO->alterar($farmacia);

			header('Location: ../estoque.php');
		} catch (PDOException $e){
			$msg = "Não foi possível registrar a farmácia"."<br/>".$e->getMessage();
			echo $msg;
		}
	}

	public function listarNome(){
		extract($_REQUEST);
		try{
			$farmaciaDAO = new FarmaciaDAO();
			$nome_farmacia = $farmaciaDAO->listarNome($id_farmacia);
			session_start();
			$_SESSION['nome_farmacia'] = $nome_farmacia;
			header('Location: ../sistema.php');
		} catch (PDOException $e) {
            echo "ERROR na função listarNome no FarmaciaControle: " . $e->getMessage();
        }
	}

	public function listarFarmacia(){
		try{
			$farmaciaDAO = new FarmaciaDAO();
			$farmacia = $farmaciaDAO->listarFarmacia($_SESSION['id_farmacia']);
			$_SESSION['farmacia'] = $farmacia;
			header('Location: ../estoque.php');
		} catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
 		}
	}
	public function listarFarmaciaa(){
		extract($_REQUEST);
		try{
			$farmaciaDAO = new FarmaciaDAO();
			$estoqueDAO = new EstoqueDAO();
			$farmaciaa = $farmaciaDAO->listarFarmaciaa($farmacia);
			$estoque = $estoqueDAO->listarMeuEstoque($farmacia);
			$_SESSION['farmacia'] = $farmaciaa;
			$_SESSION['estoque'] = json_encode($estoque);
			header('Location: ../farmacia.php?farmacia='.$farmacia);
		} catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
 		}
	}
	public function listarFarmacias(){
		try{
			$farmaciaDAO = new FarmaciaDAO();
			$farmacia = $farmaciaDAO->listarFarmacias($_SESSION['id_farmacia']);
			$_SESSION['farmacias'] = $farmacia;
			header('Location: ../farmacias.php');
		} catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
 		}
	}
}