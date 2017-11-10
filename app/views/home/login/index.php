<?php
	$title = "Estoque de Móveis - Login";
	$footer = true;
	require(HOME_PATH . "head.php");
?>
	
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
					<h6 class="link-wrapper">
						<a class="link" href="/estoque-de-moveis/home/cadastro">
							Não tem cadastro?
						</a>
					</h6>
				</div>
			</fieldset>
		</form>
	</div>
	
<?php	
	require(HOME_PATH . "footer.php");
?>