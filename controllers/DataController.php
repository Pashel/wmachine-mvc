<?php

/*
* до autoload -> include_once ROOT . '/models/Data.php';
*/

/**
* Базовый контроллер
*/
class DataController
{
	public function actionIndex()
	{
		$headers = Data::getAllHeaders();

		$paragraphs = Data::getAllParagraphs();

		$phones = Data::getAllPhones();

		$whyList = Data::getWhyListItems();

		$whatList = Data::getWhatListItems();

		$footerStrings = Data::getAllFooterStrings();

		require_once(ROOT . '/views/index.php');
	}

	public function actionService()
	{
		$headers = Data::getAllHeaders(2);

		$paragraphs = Data::getAllParagraphs(2);

		$footerStrings = Data::getAllFooterStrings();

		$serviceList = Service::getServicesList();

		require_once(ROOT . '/views/services.php');
	}

	public function actionContact()
	{
		$headers = Data::getAllHeaders(3);

		$paragraphs = Data::getAllParagraphs(3);

		$phones = Data::getAllPhones();

		$footerStrings = Data::getAllFooterStrings();

		require_once(ROOT . '/views/contacts.php');
	}
}