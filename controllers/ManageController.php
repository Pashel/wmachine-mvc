<?php

/**
* Контроллер для редактирования информации
*/
class ManageController
{
	/**
	* Обновить управляемое поле
	**/
	public function actionUpdate()
	{
		// если не режим админа
		if(!isset($_SESSION['login'])) {
			header("Location: /");
			return;
		}

		// если нету POST данных
		if(!isset($_POST['table']) || !isset($_POST['id']) || !isset($_POST['text'])) {
			header("Location: /");
			return;
		}

		// получаем имя контроллера(таблицы)
		$controllerName = ucfirst($_POST['table']);

		// отдельный случай для таблицы услуг
		if($controllerName == "Service") {

			if(!isset($_POST['price'])) {
				return;
			}

			// добавление новой
			if($_POST['id'] == "-1") {
				$result = Service::create($_POST['text'], $_POST['price']);
			}
			else {
				// изменение существующей 
				$result = Service::update($_POST['id'], $_POST['text'], $_POST['price']);
			}

			echo $result;
			return;
		}

		// базовый сценарий изменения 1-го поля
		$result = $controllerName::update($_POST['id'], $_POST['text']);
		echo $result;
	}

}