<?php


class Farmacia
{
	private $id_farmacia;
	private $nome_farmacia;
	private $email;
	private $telefone;
	private $cpf_cnpj;
	private $crj;
    private $estado;
    private $cidade;
    private $endereco;
	private $senha;

public function __construct($nome_farmacia,$email,$telefone,$cpf_cnpj,$crj,$estado,$cidade,$endereco)
    {
        $this->nome_farmacia=$nome_farmacia;
        $this->email=$email;
        $this->telefone=$telefone;
        $this->cpf_cnpj=$cpf_cnpj;
        $this->crj=$crj;
        $this->estado=$estado;
        $this->cidade=$cidade;
        $this->endereco=$endereco;
    }

public function getId_farmacia()
    {
        return $this->id_farmacia;
    }

public function get_nome_farmacia()
    {
        return $this->nome_farmacia;
    }
    public function get_email()
    {
        return $this->email;
    }
    public function get_telefone()
    {
        return $this->telefone;
    }
    public function get_cpf_cnpj()
    {
        return $this->cpf_cnpj;
    }
    public function get_crj()
    {
        return $this->crj;
    }
    public function get_senha()
    {
        return $this->senha;
    }
    public function get_estado()
    {
        return $this->estado;
    }
    public function get_cidade()
    {
        return $this->cidade;
    }
    public function get_endereco()
    {
        return $this->endereco;
    }

    public function setId_farmacia($id_farmacia)
    {
        $this->id_farmacia = $id_farmacia;
    }
    public function set_nome_farmacia($nome_farmacia)
    {
        $this->nome_farmacia = $nome_farmacia;
    }
    public function set_email($email)
    {
        $this->email = $email;
    }
    public function set_telefone($telefone)
    {
        $this->telefone = $telefone;
    }
    public function set_cpf_cnpj($cpf_cnpj)
    {
        $this->cpf_cnpj = $cpf_cnpj;
    }
    public function set_crj($crj)
    {
        $this->crj = $crj;
    }
    public function set_senha($senha)
    {
        $this->senha = $senha;
    }
    public function set_estado($estado)
    {
        $this->estado = $estado;
    }
    public function set_cidade($cidade)
    {
        $this->cidade = $cidade;
    }
    public function set_endereco($endereco)
    {
        $this->endereco = $endereco;
    }

}

?>