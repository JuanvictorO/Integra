<?php

class Saida
{
	private $id_saida;
	private $id_produto;
	private $id_farmacia;
	private $qtd;

	public function __construct( $id_produto,$id_farmacia,$qtd )
	{
		$this->id_produto=$id_produto;
		$this->id_farmacia=$id_farmacia;
		$this->qtd=$qtd;
	}

	public function getId_saida(){
		return $this->id_saida;
	}
	public function getId_produto(){
		return $this->id_produto;
	}
	public function getId_farmacia(){
		return $this->id_farmacia;
	}
	public function get_qtd(){
		return $this->qtd;
	}

	public function setId_saida($id_saida){
		$this->id_saida = $id_saida;
	}
	public function setId_produto($id_produto){
		$this->id_produto = $id_produto;
	}
	public function setId_farmacia($id_farmacia){
		$this->id_farmacia = $id_farmacia;
	}
	public function set_qtd($qtd){
		$this->qtd = $qtd;
	}
}