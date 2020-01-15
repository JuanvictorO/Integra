<?php

class Entrada
{
	private $id_entrada;
	private $id_produto;
	private $id_farmacia;
	private $qtd;

	public function __construct( $id_produto,$id_farmacia,$qtd )
	{
		$this->id_produto=$id_produto;
		$this->id_farmacia=$id_farmacia;
		$this->qtd=$qtd;
	}

	public function getId_entrada(){
		return $this->id_entrada;
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

	public function setId_entrada($id_entrada){
		$this->id_entrada = $id_entrada;
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