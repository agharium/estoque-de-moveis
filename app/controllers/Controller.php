<?php

	class Controller
	{

		public function renderizar($view)
		{
			require_once HOME_PATH. $view .".php";
		}
	}