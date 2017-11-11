<?php
	$title = "Estoque de Móveis - Painel de Controle";
	$footer = false;
	require(HOME_PATH . "head.php");
?>
	<div class="container">
		<h2 class="text-center"> PRODUTOS </h2>
		<div class="padding">
			<table id="table">
				<thead>
					<tr>
						<th></th>
						<th>ID</th>
						<th>Nome</th>
						<th>Preço</th>
						<th>Quantidade</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><input type="radio" name="select"></td>
						<td>1</td>
						<td>Produto 1</td>
						<td>R$ 100</td>
						<td>10</td>
					</tr>
					<tr>
						<td><input type="radio" name="select"></td>
						<td>2</td>
						<td>Produto 2</td>
						<td>R$ 200</td>
						<td>20</td>
					</tr>
					<tr>
						<td><input type="radio" name="select"></td>
						<td>3</td>
						<td>Produto 3</td>
						<td>R$ 300</td>
						<td>30</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	</div>

	<div class="slideout-sidebar">
		<ul>
			<li><i class="fa fa-home"></i> Home</li>
			<li><i class="fa fa-user"></i> About Us</li>
			<li><i class="fa fa-book"></i> Blog</li>
			<li><i class="fa fa-envelope"></i> Contact</li>
		</ul>
	</div>

	<script src="https://use.fontawesome.com/62b09b342d.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		var selectedRadio = null;
		var lastSelectedRow = null;

		$(document).ready(function(){
			$("tbody tr").hover(function() {
				var rowRadio = $(":first-child > :first-child", this);

				if (!rowRadio.is(':checked')){
					$(this).toggleClass("tr-hover");
				}
		    });

			$("tbody tr").click(function() {
				var rowRadio = $(":first-child > :first-child", this);

				if(!rowRadio.is(':checked')){
					document.cookie = "produto=" + $(this).find('td:nth-child(2)').html();
					console.log("Cookie adicionado: " + document.cookie);
			        
			        rowRadio.prop("checked", true);
			        $("#menu-toggle").prop("checked", true);
			        selectedRadio = rowRadio;
			        
			        if (lastSelectedRow){
			        	lastSelectedRow.toggleClass("tr-hover");
			        }
			        lastSelectedRow = $(this);

				} else if (rowRadio.is(':checked')) {
					document.cookie = "produto=" + 0;
					console.log("Cookie removido: " + document.cookie);

			        rowRadio.prop("checked", false);
			        $("#menu-toggle").prop("checked", false);
			        selectedRadio = null;
			        lastSelectedRow = null;
				}
		    });
		});
	</script>

	<style type="text/css">
		input[name="selected"] {
  			
		}
	</style>











	<style>
body {
  margin: 0;
}

/* -- main content -- */
.content-container {
  position: relative;
  z-index: 0;
  margin: 0 auto;
  overflow: hidden;
  transition: all 300ms ease-in-out;
}

/* -- Slideout Sidebar -- */

.slideout-sidebar {
  position: fixed;
  top: 0;
  left: -190px;
  z-index: 0;
  width: 150px;
  height: 100%;
  padding: 20px;
  background-color: #212121;
  transition: all 300ms ease-in-out;
}

.slideout-sidebar ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

.slideout-sidebar ul li {
  cursor: pointer;
  padding: 18px 0;
  border-bottom: 1px solid rgba(244,244,244,0.4);
  color: rgba(244,244,244,0.7);
}

.slideout-sidebar ul li:last-child {
  border-bottom: 0;
}

.slideout-sidebar ul li:hover {
  color: rgba(244,244,244,1);
}

/* -- Menu Icon -- */

#menu-toggle {
  display: none;
}

.menu-icon {
  position: absolute;
  top: 18px;
  left: 30px;
  font-size: 24px;
  z-index: 1;
  transition: all 300ms ease-in-out;
}



/*-- The Magic --*/
#menu-toggle:checked ~ .slideout-sidebar {
  left: 0px;
}

#menu-toggle:checked + .menu-icon {
  left: 210px;
}

#menu-toggle:checked ~ .content-container {
  padding-left: 190px;
}

/* -- Media Queries -- */

@media (max-width: 991px) {
  
  .content-container {
    max-width: 480px;
  }
  
}

@media (max-width: 767px) {
  
  .content-container {
    max-width: 100%;
    margin: 30px auto 0;
  }
  
  #menu-toggle:checked ~ .content-container {
    padding-left: 0;
  }
  
  .slideout-sidebar ul {
    text-align: center;
    max-width: 200px;
    margin: 30px auto 0;
  }
  
  .menu-icon {
    left: 20px
  }
  
  #menu-toggle:checked ~ .slideout-sidebar {
    width: 100%;
  }
  
  #menu-toggle:checked + .menu-icon {
    left: 87%;
    color: #fafafa;
  }
  
  @media screen  
    and (max-width: 736px) 
    and (orientation: landscape) {
      
      .slideout-sidebar {
        padding: 0;
      }
      
      .slideout-sidebar ul {
        max-width: 100%;
        margin: 60px auto 0;
      }
      
      .slideout-sidebar ul li {
        display: inline-block;
        border-bottom: 0;
        width: 72px;
        padding: 18px 24px;
        margin: 0 6px 12px;
        color: #ffffff;
        background-color: #777;
      }

  }
  
}
</style>

<?php	
	require(HOME_PATH . "footer.php");
?>