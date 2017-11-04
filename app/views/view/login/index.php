<?php
	$title = "Estoque de Móveis - Login";
	$footer = false;
	require_once("../head.php");
?>
	<h1 class="logo text-center fadein" id="logo"> Controle de Estoque de Móveis </h1>
	<div class="container half">
		<h2 class="text-center"> LOGIN </h2>
		<form class="flex" method="POST" action="?">
			<fieldset>
				<label for="usuario">Usuário</label>
				<input type="text" id="usuario" name="usuario" required>
				
				<label for="senha">Senha</label>
				<input type="password" id="senha" name="senha" required>
				
				<input class="button-primary" type="submit" value="Entrar" name="submitLogin">
				
				<div class="float-right">
					<h6 style="margin-top:10px"><a href="../cadastro">Não tem cadastro?</a></h6>
				</div>
			</fieldset>
		</form>
	</div>
	
	<script type="text/javascript">
		window.onload = function() {
    		document.getElementById("logo").className += " loaded";
		}
	</script>

<?php	
	require_once("../footer.php");
?>