<?php

/**
* Контроллер входа на сайт
*/
class LoginController
{
	/**
	* Вывод формы для login
	**/
	public function actionIndex()
	{
		require_once(ROOT . '/views/login.php');
	}

	/**
	* Проверка юзера
	**/
	public function actionVerify()
	{
		if(isset($_POST['inputEmail']) && isset($_POST['inputPassword'])) {
			// вызываем метод проверки юзера
			$result = Login::verifyUser($_POST['inputEmail'], $_POST['inputPassword']);

			if($result) {
				$_SESSION['login'] = true;
			}
		}

		header("Location: /");
	}

	/**
	* Выход из режима администратора
	**/
	public static function actionLogout()
	{
		if(isset($_SESSION['login'])) {
			unset($_SESSION['login']);
		}

		header("Location: /");
	}
}