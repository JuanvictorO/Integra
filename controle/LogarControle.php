<?php
include_once '../classes/Usuario.php';
include_once '../dao/AcessoDAO.php';
/**
 * 
 */
class LogarControle
{
	
	public function verificar()
	{
		extract($_REQUEST);
		$x = 0;
		if(!isset($email) || empty($email)){
			$msg .= "Email não informado, favor informar um email! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}
		if(!isset($senha) || empty($senha)){
			$msg .= "Senha não informada, favor informar uma senha! <i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
		}

		$acesso2DAO = new AcessoDAO();
		try{
			$verifica_email = $acesso2DAO->verifica_email($email);
		} catch (PDOException $e){
			echo "ERRO no AcessoDAO na function 'verifica_email':".$e->getMessage();
		}
		if($verifica_email != $email){
			$msg .= "Este email não está cadastrado em nosso sistema!<i class='fas fa-exclamation-circle'></i><br/>";
			$x = 1;
			//echo "Diferença de email foi encontrado";
		}

		if($x == 1){
			session_start();
			$_SESSION['msg'] = $msg;
			header('Location: ../login.php');
		} else{
			$senha = md5($senha);

			$usuario = new Usuario();
			$usuario->set_email($email);
			$usuario->set_senha($senha);
			return $usuario;
		}
	}
	public function logar(){
		extract($_REQUEST);
		$usuario = $this->verificar();
		$acessoDAO = new AcessoDAO();
		try{
			$password = $acessoDAO->logar($usuario->get_email());
			if($password == $usuario->get_senha()){
				
				try{

					$id_farmacia = $acessoDAO->buscar_id($usuario->get_email());
					session_start();
					$_SESSION['id_farmacia'] = $id_farmacia;
					header('Location: ../sistema.php');
				} catch (PDOException $e){
					echo "ERROR ao pegar ao ID do Usuário: " . $e->getMessage();
				}

			} else{
				session_start();
				$_SESSION['msg'] = "Esta senha não corresponde ao email! <i class='fas fa-exclamation-circle'></i>";
				header('Location: ../login.php');
			}
		} catch (PDOException $e){
			echo "ERROR: " . $e->getMessage();
		}
	}
}