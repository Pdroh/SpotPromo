<?php 
 
namespace SPOT_PROMO;

class produtos{
	use db;
	
	public $cod_categoria = null;
	public $cod_produto = null;
	public $descricao=null;

	public function listarProduto(){
	 
		if($this->cod_categoria):
			$sql ="	SELECT c.descricao categoria, p.cod_produto, p.descricao     FROM produto p 
					INNER JOIN categoria c ON  c.cod_categoria = p.cod_categoria WHERE p.cod_categoria=$this->cod_categoria order by p.descricao";
			$prod = $this->dbResultsObject($sql);
			if($prod):
				return $prod;
			else:
				return null;
			endif;
		endif;
	}
	public function saveProduto(){
		if($this->descricao):
			$descricao = addslashes($this->descricao);
			if($this->cod_produto!=''):
				$sql = "UPDATE produto SET cod_categoria=$this->cod_categoria,descricao='$descricao' WHERE cod_produto=$this->cod_produto";
			else:
				$sql = "INSERT INTO produto(cod_categoria,descricao) values($this->cod_categoria,'$descricao')";
			endif;
			
			$this->dbExec($sql);
			echo $this->tableProdutos();
		endif;
	}
	public function deleteProduto(){
		if($this->cod_produto):
			$sql = "DELETE FROM produto WHERE cod_produto=$this->cod_produto";
			 
			 $this->dbExec($sql);
			 echo $this->tableProdutos();
		endif;
	}
	public function tableProdutos(){

		$produto = $this->listarProduto();
		if(!$produto) return "";

		$htm='<table class="table table-sm">';
  		$htm.='<thead>';
    	$htm.='<tr>';      	
      	$htm.='<th scope="col">Cod Produto</th>';
      	$htm.='<th scope="col">Categoria</th>';
      	$htm.='<th scope="col">Descrição</th>';
		$htm.='<th scope="col"></th>';
		$htm.='<th scope="col"></th>';
    	$htm.='</tr>';
  		$htm.='</thead>';
  		$htm.='<tbody>';
		foreach ($produto as $key => $value):
			$htm.="<tr>";
			$htm.="<th scope='row'>$value->cod_produto</th>";
			$htm.="<td>$value->categoria</td>";
			$htm.="<td>$value->descricao</td>";
			$htm.="<td><a href='#' class='btnExcluir' cod='$value->cod_produto'>Excluir</a></td>";
			$htm.="<td><a href='#' class='btnAlterar' cod='$value->cod_produto' descricao='$value->descricao'>Alterar</a></td>";
			$htm.="</tr>";
		endforeach;     
  		$htm.="</tbody>";
		$htm.="</table>";
		return $htm;
	}
	 
}