<?php 
 
namespace SPOT_PROMO;

class categorias{
	use db;
	
	public $id_categoria = null;

	public function listarCategoria(){

		$sql ="SELECT cod_categoria,descricao FROM categoria ";
		$cat = $this->dbResultsObject($sql);
		if($cat):
			return $cat;
		else:
			return null;
		endif;
	}
 	
	public function selectCategorias(){

		$categorias = $this->listarCategoria();
		$htm =  "<label for categoria>Categoria<br><select class='form-control' id='categoria'><option value=''>Selecione uma Categoria</option>";
		
		foreach ($categorias as $key => $value):
			$htm.= "<option value='$value->cod_categoria'>$value->descricao</option>";
		endforeach;

		$htm.= "</select></label>";
		return $htm;
	}
	 
}