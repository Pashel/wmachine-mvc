<?php

/**
* Базовая модель
*/
class Data
{
	/**
	* Извлечение заголовков из базы данных
	**/
	public static function getAllheaders($pageId = 1)
	{
		$db = Db::getConnection();

		$items = array();

		$stmt = $db->prepare("SELECT * FROM data WHERE type='header' AND page_id=:pageId");
		$stmt->execute(array('pageId' => $pageId));

		if(!$stmt) return null;

		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		foreach ($stmt as $row) {
			$items[$row['name']] = $row['value'];
		}

		return $items;
	}

	/**
	* Получение из БД всех текстовых полей
	**/
	public static function getAllParagraphs($pageId = 1)
	{
		$db = Db::getConnection();

		$items = array();

		$stmt = $db->prepare("SELECT * FROM data WHERE type='paragraph' AND page_id=:pageId");
		$stmt->execute(array('pageId' => $pageId));

		if(!$stmt) return null;

		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		foreach ($stmt as $row) {
			array_push($items, $row['value']);
		}

		return $items;
	}

	/**
	* Получение из БД всех телефонных номеров
	**/
	public static function getAllPhones()
	{
		$db = Db::getConnection();

		$items = array();

		$stmt = $db->query("SELECT * FROM data WHERE type='phone'");
		if(!$stmt) return null;

		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		foreach ($stmt as $row) {
			array_push($items, $row['value']);
		}

		return $items;
	}

	/**
	* Получение из БД списка Why
	**/
	public static function getWhyListItems()
	{
		$db = Db::getConnection();

		$items = array();

		$stmt = $db->query("SELECT * FROM data WHERE type='why_list'");
		if(!$stmt) return null;

		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		$str = $stmt->fetch()['value'];

		// разбиваем текст на строки
		$items = explode("\n", $str);

		return $items;
	}

	/**
	* Получение из БД списка What
	**/
	public static function getWhatListItems()
	{
		$db = Db::getConnection();

		$items = array();

		$stmt = $db->query("SELECT * FROM data WHERE type='what_list'");
		if(!$stmt) return null;

		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		$str = $stmt->fetch()['value'];

		// разбиваем текст на строки
		$items = explode("\n", $str);

		return $items;
	}

	/**
	* Получение из БД строк в footer-е
	**/
	public static function getAllFooterStrings()
	{
		$db = Db::getConnection();

		$items = array();

		$stmt = $db->query("SELECT * FROM data WHERE type='footer'");
		if(!$stmt) return null;

		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		foreach ($stmt as $row) {
			array_push($items, $row['value']);
		}

		return $items;
	}
}