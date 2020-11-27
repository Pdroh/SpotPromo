<?php
	
	include "../class/db.php";
	include "../class/produtos.php";
	$produto = new  SPOT_PROMO\produtos;
	$produto->cod_produto =  $_REQUEST['cod_produto'];
	$produto->cod_categoria =  $_REQUEST['cod_categoria'];
	$delete =  $produto->deleteProduto();
	if($delete!=""):
		echo "<div class='alert alert-warning' role='alert'>
  			  Produto excluído com exito!</div>".$delete;

	endif;
	die();
?> 