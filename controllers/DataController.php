<?php

/*
* до autoload -> include_once ROOT . '/models/Data.php';
*/

/**
* Базовый контроллер
*/
class DataController
{
	public function __construct()
	{
		$this->menu = Menu::getAllMenuItems();
		$this->footerStrings = Data::getAllFooterStrings();

		if(isset($_SESSION['login'])){
			$this->ordersCount = Order::getOrdersCount();
		}
	}

	public function actionIndex($pageId)
	{
		$headers = Data::getAllHeaders();

		$paragraphs = Data::getAllParagraphs();

		$phones = Data::getAllPhones();

		$whyList = Data::getWhyListItems();

		$whatList = Data::getWhatListItems();

		require_once(ROOT . '/views/index.php');
	}

	public function actionShowServices($pageId)
	{
		$headers = Data::getAllHeaders($pageId);

		$paragraphs = Data::getAllParagraphs($pageId);

		$serviceList = Service::getServicesList();

		require_once(ROOT . '/views/services.php');
	}

	public function actionShowContacts($pageId)
	{
		$headers = Data::getAllHeaders($pageId);

		$paragraphs = Data::getAllParagraphs($pageId);

		$phones = Data::getAllPhones();

		require_once(ROOT . '/views/contacts.php');
	}

	public function actionDeleteService($serviceId)
	{
		// если не режим админа
		if(!isset($_SESSION['login'])) {
			header("Location: /");
			return;
		}

		// удаляем ордер из таблицы
		$result = Service::deleteService($serviceId);

		// отображаем страницу ордеров
		header('Location: /services');
	}
}