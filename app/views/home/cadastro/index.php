<?php
	$title = "Estoque de Móveis - Cadastro";
	$footer = true;
	require(HOME_PATH. "head.php");
?>
	<h1 class="logo text-center fadein" id="logo"> Controle de Estoque de Móveis </h1>
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
	
	<script type="text/javascript">
		window.onload = function() {
    		document.getElementById("logo").className += " loaded";
		}
	</script>

	<style type="text/css">
		@import url('https://fonts.googleapis.com/css?family=Roboto+Slab:100');

		body {
			padding: 50px;
		}

		footer, .padding {
			margin: 50px; 
		}

		.half {
			width: 50vh;
		}

		.half-plus-half {
			width: 90vh;
		}

		.flex {
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.text-center {
			text-align: center;
		}

		/* logo */

		.logo {
			font-family: 'Roboto Slab', serif;
			margin-bottom: 50px;
		}

		.fadein {
		    opacity: 0;
		    -moz-transition: opacity 1.5s;
		    -webkit-transition: opacity 1.5s;
		    -o-transition: opacity 1.5s;
		    transition: opacity 1.5s;
		}

		.loaded {
		    opacity: 1 !important;
		}

		footer {
			padding: 25px;
		}
	</style>

<?php	
	require(HOME_PATH. "footer.php");
?>