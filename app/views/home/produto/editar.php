<?php
	require_once 'app/helper/sessions.php';

	$title = "Estoque de Móveis - Painel de Controle";
	$footer = false;
	require(VIEW_PATH . "/home/head.php");
?>
<div class="container">
	<h2 class="text-center"> <?php echo $dados->getNome(); ?> </h2>
	<div style="display: flex; width: 75%; margin: 0 auto; padding: 25px;">
		<div style="justify-content: left; align-self: center;">
			<img src="http://via.placeholder.com/250x250">
		</div>
		<div style="justify-content: right; align-self: center; margin-left: 50px; width: 100%">
			<div style="display: flex; margin-bottom: 15px;">
				<div style="justify-content: left; align-self: center;">
					<b> ID </b>
				</div>
				<div style="width: 100%; margin-left: 10px; ">
					<input style="margin-bottom: 0px; width: 385px; float: right;" type="text" placeholder="<?php echo $dados->getCodigo(); ?>" />
				</div>
			</div>

			<div style="display: flex; margin-bottom: 15px;">
				<div style="justify-content: left; align-self: center;">
					<b> Nome </b>
				</div>
				<div style="width: 100%; margin-left: 10px; ">
					<input style="margin-bottom: 0px; width: 385px; float: right;" type="text" placeholder="<?php echo $dados->getNome(); ?>" />
				</div>
			</div>

			<div style="display: flex; margin-bottom: 15px;">
				<div style="justify-content: left; align-self: center;">
					<b> Preço </b>
				</div>
				<div style="width: 100%; margin-left: 10px; ">
					<input style="margin-bottom: 0px; width: 385px; float: right;" type="text" placeholder="<?php echo $dados->getPreco(); ?>" />
				</div>
			</div>

			<div style="display: flex; margin-bottom: 15px;">
				<div style="justify-content: left; align-self: center;">
					<b> Quantidade </b>
				</div>
				<div style="width: 100%; margin-left: 10px; ">
					<input style="margin-bottom: 0px; width: 385px; float: right;" type="number" placeholder="<?php echo $dados->getQuantidade(); ?>" />
				</div>
			</div>
		</div>
	</div>
	<button> SALVAR </button>

</div>
<?php
	require(VIEW_PATH . "/home/footer.php");
?>
