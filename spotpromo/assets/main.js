	$(".btnAlterar").on("click", function() {
	    let cod_produto = $(this).attr('cod');
	    let descricao = $(this).attr('descricao');
	    $("#cod_produto").val(cod_produto);
	    $("#descricao").val(descricao);
	    $("#frmProduto").show('slow');
	});

	$(".btnExcluir").on("click", function() {
	    let cod_produto = $(this).attr('cod');
	    let descricao = $(this).closest('td').prev('td').text();
	    let confirmar = confirm('Deseja realmente Excluir?\n' + descricao);
	    if (confirmar) {
	        deleteProduto(cod_produto);
	    }
	});

	function deleteProduto(cod_produto) {
	    let cod_categoria = $("#categoria").val();
	    $.ajax({
	        type: 'post',
	        url: 'action/deleteProduto.php',
	        data: { cod_produto: cod_produto, cod_categoria: cod_categoria },
	        success: function(response) {
	            $("#msg").html(response);
	            var fileref = document.createElement('script');
	            fileref.setAttribute("type", "text/javascript");
	            fileref.setAttribute("src", "assets/main.js");
	            document.getElementsByTagName("head")[0].appendChild(fileref);
	        },
	        beforeSend: function() {
	            $("#msg").html('Excluindo...');
	        }
	    }); // final ajax

	} //final function