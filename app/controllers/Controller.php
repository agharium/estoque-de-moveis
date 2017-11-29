<?php

	class Controller
	{

		public function renderizar($view, $dados=null, $pagBusca = false)
		{
			require_once VIEW_PATH. "/". $view .".php";
		}
	}
