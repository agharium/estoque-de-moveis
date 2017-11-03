<?php
Class App{

	protected $controller = "home"; //Default home

	protected $method = "index";//Default metodo

	protected $param = [];

	public function __construct()
	{
		if (isset($_GET["url"])) {
			$this->init();	
		}else{
			require_once "app/views/home.php";
		}

	}

	private function init()
	{

		$url = self::parseUrl($_GET["url"]);

		if(file_exists("app/controllers/" .$url[0] . ".php")){
			$this->controller = $url[0];
			unset($url[0]);
		}else{
			echo "error 404.";
			exit();
		}

		require_once "app/controllers/" . $this->controller . ".php";
		$this->controller = new $this->controller;

		if(isset($url[1]) && method_exists($this->controller, $url[1])){
			$this->method = $url[1];
			unset($url[1]);
		}

		$this->param = $url ? array_values($url):[];

		call_user_func_array([$this->controller, $this->method], $this->param);

	}

	private function parseUrl($url)
	{
		return explode("/",filter_var(rtrim($url), FILTER_SANITIZE_URL));
	}
}