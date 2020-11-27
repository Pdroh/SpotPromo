<?php
	
	include "../class/db.php";
	include "../class/produtos.php";
	$produto = new  SPOT_PROMO\produtos;
	$dados = (object)$_REQUEST['dados'];
		
	$produto->cod_categoria =  $dados->cod_categoria;
	$produto->cod_produto =  $dados->cod_produto;
	$produto->descricao =  $dados->descricao;	
	echo $produto->saveProduto();
 

?> 