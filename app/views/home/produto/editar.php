<?php
	require_once 'app/helper/sessions.php';

	$title = "Estoque de Móveis - Painel de Controle";
	$footer = false;
	require(VIEW_PATH . "/home/head.php");
?>
<div class="container">
	<h2 class="text-center"> <?php echo $dados->getNome(); ?> </h2>

	<form action="/estoque-de-moveis/produto/update" method="post" enctype="multipart/form-data">

	<div style="display: flex; width: 75%; margin: 0 auto; padding: 25px;">
		<div style="justify-content: left; align-self: center;">
			<input type="hidden" name="codigoProduto" value="<?php echo $dados->getCodigo(); ?>">
			<input type="hidden" name="imgProduto" value="<?php echo $dados->getImg(); ?>">
			<img id="imgProd" src="
			<?php
				if (strpos($dados->getImg(), 'http') !== false){
					echo $dados->getImg();
				} else{
					echo "/estoque-de-moveis/" . $dados->getImg();
				}
			?>
			" style="width:250px;">
		</div>
		<div style="justify-content: right; align-self: center; margin-left: 50px; width: 100%">
			<div style="display: flex; margin-bottom: 15px;">
				<div style="justify-content: left; align-self: center;">
					<b> Nome </b>
				</div>
				<div style="width: 100%; margin-left: 10px; ">
					<input style="margin-bottom: 0px; width: 385px; float: right;" type="text" name="nomeUpdate" value="<?php echo $dados->getNome(); ?>" />
				</div>
			</div>

			<div style="display: flex; margin-bottom: 15px;">
				<div style="justify-content: left; align-self: center;">
					<b> Descrição </b>
				</div>
				<div style="width: 100%; margin-left: 10px; ">
					<textarea style="margin-bottom: 0px; width: 385px; float: right;" name="descricaoUpdate"><?php echo $dados->getDescricao(); ?></textarea>
				</div>
			</div>

			<div style="display: flex; margin-bottom: 15px;">
				<div style="justify-content: left; align-self: center;">
					<b> Preço </b>
				</div>
				<div style="width: 100%; margin-left: 10px; ">
					<input style="margin-bottom: 0px; width: 385px; float: right;" type="text" name="precoUpdate" value="<?php echo $dados->getPreco(); ?>" />
				</div>
			</div>

			<div style="display: flex; margin-bottom: 15px;">
				<div style="justify-content: left; align-self: center;">
					<b> Quantidade </b>
				</div>
				<div style="width: 100%; margin-left: 10px; ">
					<input style="margin-bottom: 0px; width: 385px; float: right;" type="number" name="quantidadeUpdate" value="<?php echo $dados->getQuantidade(); ?>" />
				</div>
			</div>

			<div style="display: flex; margin-bottom: 15px;">
				<div style="justify-content: left; align-self: center;">
					<b> Imagem </b>
				</div>
				<div style="width: 100%; margin-left: 10px; ">
					<input style="margin-bottom: 0px; width: 385px; float: right;" type="file" name="imagemUpdate" accept="image/*" onchange="loadFile(event)" />
				</div>
			</div>

		</div>
	</div>
	<center><button type="submit"> SALVAR </button></center>
	</form>
</div>

<script>
  var loadFile = function(event) {
    var output = document.getElementById('imgProd');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>

<?php
	require(VIEW_PATH . "/home/footer.php");
?>
