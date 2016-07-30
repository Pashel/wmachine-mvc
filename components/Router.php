<?php

/**
*	Router - осуществляет вызов соответствующего контролера 
*/
class Router
{
	private $routes;

	function __construct()
	{
		$routesPath = ROOT.'/config/routes.php';
		$this->routes = include($routesPath);
	}

	private function getURI()
	{
		if(!empty($_SERVER['REQUEST_URI'])){
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	} 

	public function run()
	{
		// получить строку запроса
		$uri = $this->getURI();

		// проверить наличие такого адреса в routes.php
		foreach ($this->routes as $uriPattern => $path) {
			
			// сравниваем $uriPattern и $uri
			if(preg_match("~$uriPattern~", $uri)){

				// получаем внутренний путь из внешнего по правилу в routes
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);

				// Определить controller, action, параметры
				$segments = explode('/', $internalRoute);

				$controllerName = array_shift($segments).'Controller';
				$controllerName = ucfirst($controllerName);

				$actionName = 'action'.ucfirst(array_shift($segments));

				$params = $segments; 

				// подключить файл класса контроллера
				$controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

				if(file_exists($controllerFile)){
					include_once($controllerFile);
				}

				// создать объект и вызвать action
				$controllerObject = new $controllerName;
				
				//$controllerObject->$actionName($params);
				call_user_func_array(array($controllerObject, $actionName), $params);

				break;
			}

		}

	}
}