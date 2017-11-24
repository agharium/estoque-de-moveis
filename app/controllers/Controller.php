<?php

	class Controller
	{

		public function renderizar($view, $dados=null)
		{
			require_once VIEW_PATH. "/". $view .".php";
		}
	}
