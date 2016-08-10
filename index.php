<?php
	
	// Front Controller


	// 1. Общие настройки
	ini_set('display_errors', 1);
	error_reporting(E_ALL);

	// старт сессии
	session_start();

	// 2. Подключение файлов системы
	define('ROOT', dirname(__FILE__));
	require_once(ROOT . '/components/autoload.php');

	/*
	* --Старый вариант подключения--
	* require_once(ROOT . '/components/Router.php');
	* require_once(ROOT . '/components/Db.php');
	*
	*/


	// 3. Вызов Router
	$router = new Router();
	$router->run();
