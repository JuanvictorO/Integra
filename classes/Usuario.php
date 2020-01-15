<?php

/**
 * 
 */
class Usuario
{
	private $email;
	private $senha;

	public function get_email()
    {
        return $this->email;
    }
    public function get_senha()
    {
        return $this->senha;
    }
    public function set_email($email)
    {
        $this->email = $email;
    }
    public function set_senha($senha)
    {
        $this->senha = $senha;
    }
}