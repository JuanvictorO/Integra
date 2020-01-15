<?php

class Produto
{
	private $id_produto;
	private $id_farmacia_produto;
	private $nome_produto;
	private $data_fabricacao;
	private $data_validade;
	private $situacao;
	private $preco_pago;
	private $preco_venda;

	public function __construct($id_farmacia_produto,$nome_produto,$data_fabricacao,$data_validade,$situacao,$preco_pago,$preco_venda)
	{
		$this->id_farmacia_produto=$id_farmacia_produto;
		$this->nome_produto=$nome_produto;
		$this->data_fabricacao=$data_fabricacao;
		$this->data_validade=$data_validade;
		$this->situacao=$situacao;
		$this->preco_pago=$preco_pago;
		$this->preco_venda=$preco_venda;
	}

	public function getId_produto(){
		return $this->id_produto;
	}
	public function getId_farmacia_produto(){
		return $this->id_farmacia_produto;
	}
	public function get_nome_produto(){
		return $this->nome_produto;
	}
	public function get_data_fabricacao(){
		return $this->data_fabricacao;
	}
	public function get_data_validade(){
		return $this->data_validade;
	}
	public function get_situacao(){
		return $this->situacao;
	}
	public function get_preco_pago(){
		return $this->preco_pago;
	}
	public function get_preco_venda(){
		return $this->preco_venda;
	}

	public function setId_produto($id_produto)
	{
		$this->id_produto = $id_produto;
	}
	public function setId_farmacia_produto($id_farmacia_produto)
	{
		$this->id_farmacia_produto = $id_farmacia_produto;
	}
	public function set_nome_produto($nome_produto)
	{
		$this->nome_produto = $nome_produto;
	}
	public function set_data_fabricacao($data_fabricacao)
	{
		$this->data_fabricacao = $data_fabricacao;
	}
	public function set_data_validade($data_validade)
	{
		$this->data_validade = $data_validade;
	}
	public function set_situacao($situacao)
	{
		$this->situacao = $situacao;
	}
	public function set_preco_pago($preco_pago)
	{
		$this->preco_pago = $preco_pago;
	}
	public function set_preco_venda($preco_venda)
	{
		$this->preco_venda = $preco_venda;
	}
}