<?php
	$title = "Estoque de Móveis - Login";
	$footer = true;
	require(VIEW_PATH . "/home/head.php");
?>
	<div class="container half">
		<h2 class="text-center"> LOGIN </h2>
		<?php if(isset($dados)) echo "<center><span style='color: red;'> ". $dados . "</span></center>"; ?>
		<form class="flex" method="POST" action="/estoque-de-moveis/home/logar">
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
	require(VIEW_PATH . "/home/footer.php");
?>
