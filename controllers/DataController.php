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
	}

	public function actionIndex($pageId)
	{
		$headers = Data::getAllHeaders();

		$paragraphs = Data::getAllParagraphs();

		$phones = Data::getAllPhones();

		$whyList = Data::getWhyListItems();

		$whatList = Data::getWhatListItems();

		//$footerStrings = Data::getAllFooterStrings();

		require_once(ROOT . '/views/index.php');
	}

	public function actionService($pageId)
	{
		$headers = Data::getAllHeaders($pageId);

		$paragraphs = Data::getAllParagraphs($pageId);

		//$footerStrings = Data::getAllFooterStrings();

		$serviceList = Service::getServicesList();

		require_once(ROOT . '/views/services.php');
	}

	public function actionContact($pageId)
	{
		$headers = Data::getAllHeaders($pageId);

		$paragraphs = Data::getAllParagraphs($pageId);

		$phones = Data::getAllPhones();

		//$footerStrings = Data::getAllFooterStrings();

		require_once(ROOT . '/views/contacts.php');
	}
}