<?php

class Catalogo
{
	private $id_catalogo;
	private $id_produto;
	private $id_farmacia;

	public function __construct($id_produto,$id_farmacia){
		$this->id_produto=$id_produto;
		$this->id_farmacia=$id_farmacia;
	}

	public function getId_catalogo(){
		return $this->id_catalogo;
	}
	public function getId_produto(){
		return $this->id_produto;
	}
	public function getId_farmacia(){
		return $this->id_farmacia;
	}

	public function setId_catalogo($id_catalogo){
		$this->id_catalogo = $id_catalogo;
	}
	public function setId_produto($id_produto){
		$this->id_produto=$id_produto;
	}
	public function setId_farmacia($id_farmacia){
		$this->id_farmacia=$id_farmacia;
	}
}