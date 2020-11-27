<!DOCTYPE html>
<html lang="pt_BR">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type='text/javascript' src='assets/jQuery/jquery.min.js'></script>
		<script type='text/javascript' src='assets/main.js?v=44'></script>
		<link rel='stylesheet'  href='assets/bootstrap/css/bootstrap.min.css' type='text/css' media='all' />
		<link rel='stylesheet'  href='assets/style.css' type='text/css' media='all' />
		<title>SPOT PROMO</title>
	</head>
	<body>
		<div class='container'>
			<div class="jumbotron">
				<h1 class="display-4">SPOT PROMO</h1>
				<p class="lead">Teste de desenvolvimento de formulário com CRUD em PHP</p>
				<hr class="my-4">
				<div class='side'>		
					<?php
						include "class/db.php";
						include "class/categorias.php"; 
						include "class/produtos.php"; 
						$categorias = new  SPOT_PROMO\categorias;
					 	echo "<div>".$categorias->selectCategorias()."</div>"; 		 
					?>	
					<div><a class='btn btn-link' href='#' id='btnInserir' role='button'>Inserir Produto</a></div>
				</div>
				<div id='frmProduto' style='display:none'>	
					<input type='hidden' id='cod_produto' value=''>
					<div class="form-group">					 
						<input type="text" class="form-control" id="descricao" placeholder="Descrição do Produto">
						<small id="emailHelp" class="form-text text-muted">Insira acima a descrição do produto</small>
					</div>				
					<button type="button" id="btnSalvar" class="btn btn-primary">Salvar Produto</button>
					<button type="button" id="btnCancelar" class="btn btn-default">Cancelar</button>				 
				</div>
			</div> 
				<div id='msg'></div>
		</div> 
	</body>
</html>

<script>
	(function($) 
	{
	    $(document).ready(function() {			
			// Selecionar o codigo da categoria
			$("#categoria").on("change",function(){				
				let cod_categoria = $(this).val(); 
				console.log(cod_categoria);

				getProdutos(cod_categoria);
			});			
			$("#btnInserir").on("click",function(){				
				$(this).hide('slow');
				$("#frmProduto").show('slow');	
				$("#cod_produto").val('');
				$("#descricao").val('');
			});
			$("#btnCancelar").on("click",function(){				
					$("#btnInserir").show('slow');
					$("#frmProduto").hide('slow');						
					$("#descricao").val('');				 
			});

			$("#btnSalvar").on("click",function(){
				let categoria = $("#categoria");			 
				let descricao = $("#descricao");

				if(categoria.val()==''){
					alert('Favor selecionar uma categoria');
					categoria.focus();
					return "";
				}
				if(descricao.val()==''){
					alert('Favor digite a descrição do produto');
					descricao.focus();
					return "";
				}
				$("#btnInserir").show('slow');
				$("#frmProduto").hide('slow');
				SalvarProdutos();
			 
			});
			function updateScript(){
				var fileref=document.createElement('script');
				fileref.setAttribute("type","text/javascript");
				fileref.setAttribute("src", "assets/main.js");
				document.getElementsByTagName("head")[0].appendChild(fileref);
			}
			function SalvarProdutos(){
				let dados = {
							'cod_categoria': $("#categoria").val(),
							'descricao': $("#descricao").val(),
							'cod_produto': $("#cod_produto").val()
				};
 
  				$.ajax({
	                type: 'post',
	                url: 'action/saveProduto.php',
	                data: { dados: dados },
	                success: function(response) {	                    
						$("#msg").html(response);
						updateScript();
	                },
	                beforeSend: function() {
						$("#msg").html('Salvando...');	                    
	                }
	            }); // final ajax
	        
			}//final function
			function getProdutos(cod_categoria){
			 
  				$.ajax({
	                type: 'post',
	                url: 'action/getProduto.php',
	                data: { cod_categoria: cod_categoria},
	                success: function(response) {	                    
						$("#msg").html(response);
						updateScript();
	                },
	                beforeSend: function() {
	                    $("#msg").html('Aguarde...');
	                }
	            }); // final ajax
	        
			}//final function
   		}); 
	}(jQuery));

</script>