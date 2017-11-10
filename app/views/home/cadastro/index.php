<?php
	$title = "Estoque de Móveis - Cadastro";
	$footer = true;
	require(HOME_PATH . "head.php");
?>
	<div class="container half">
		<h2 class="text-center"> CADASTRO </h2>
		<form class="flex" method="POST" action="?">
			<fieldset>
				<label for="usuario">Usuário</label>
				<input type="text" id="usuario" name="usuario" required>
				
				<label for="senha">Senha</label>
				<input type="password" id="senha" name="senha" required>

				<label for="senhaConfirmacao">Confirme a senha</label>
				<input type="password" id="senhaConfirmacao" name="senhaConfirmacao" required>
				
				<input class="button-primary" type="submit" value="Começar" name="submitCadastro">
				
				<div class="float-right">
					<h6 class="link-wrapper">
						<a class="link" href="/estoque-de-moveis/home/login">
							Já é cadastrado?
						</a>
					</h6>
				</div>
			</fieldset>
		</form>
	</div>

<?php	
	require(HOME_PATH . "footer.php");
?>