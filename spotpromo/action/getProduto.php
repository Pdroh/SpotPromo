<?php
 
include "../class/db.php";
include "../class/produtos.php";
$produto = new  SPOT_PROMO\produtos;
$produto->cod_categoria =  $_REQUEST['cod_categoria'];
 
echo $produto->tableProdutos(); 