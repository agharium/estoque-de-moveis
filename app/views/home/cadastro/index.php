<?php
	$title = "Estoque de Móveis - Cadastro";
	$footer = true;
	require(VIEW_PATH . "/home/head.php");
?>
	<div class="container half">
		<h2 class="text-center"> CADASTRO </h2>
		<form class="flex" method="POST" action="/estoque-de-moveis/home/cadastrar">
			<fieldset>
				<label for="nome">Nome</label>
				<input type="text" id="nome" name="nome" required>

				<label for="usuario">E-mail</label>
				<input type="text" id="usuario" name="usuario" required>

				<label for="senha">Senha</label>
				<a style="cursor: pointer" onclick="generatePassword()">Gerar senha</a>
				<input type="password" id="senha" name="senha" required>

				<label for="senhaConfirmacao">Confirme a senha</label>
				<input type="password" id="senhaConfirmacao" name="senhaConfirmacao" required>

				<label for="Permissao">Tipo da Conta</label>
				<select name="permissao">
					<option value="2">Gerente</option>
					<option value="3">Vendedor</option>
				</select>


				<input class="button-primary" type="submit" value="Criar" style="float:right" name="submitCadastro">

				<!-- <div class="float-right">
					<h6 class="link-wrapper">
						<a class="link" href="/estoque-de-moveis/home/login">
							Já é cadastrado?
						</a>
					</h6>
				</div> -->
			</fieldset>
		</form>
	</div>

	<!-- gerar senha -->
	<script type="text/javascript">
		function generatePassword() {
				var num = Math.random();
				var hash = num.toString(36);
				var senha = hash.substr(2,hash.length);
				var senhaFinal = senha.substr(0,5);

				document.getElementById('senha').type = "text";
				document.getElementById('senhaConfirmacao').type = "text";

				document.getElementById('senha').value = senhaFinal;
				document.getElementById('senhaConfirmacao').value = senhaFinal;

				document.getElementById('senha').select();

				// decodificar
				// parseInt(string, 36);
		};
	</script>
<?php
	require(VIEW_PATH . "/home/footer.php");
?>
