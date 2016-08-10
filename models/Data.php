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
		$result = $stmt->execute(array('pageId' => $pageId));

		if(!$result) {
			return null;
		}

		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		foreach ($stmt as $row) {
			//array_push($items, $row);
			$items[$row['name']]['value'] = $row['value'];
			$items[$row['name']]['id'] = $row['id'];
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
		$result = $stmt->execute(array('pageId' => $pageId));

		if(!$result) {
			return null;
		}

		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		$counter = 0;
		foreach ($stmt as $row) {
			$items[$counter]['id'] = $row['id'];
			$items[$counter]['value'] = $row['value'];
			$counter++;
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

		$counter = 0;
		foreach ($stmt as $row) {
			$items[$counter]['id'] = $row['id'];
			$items[$counter]['value'] = $row['value'];
			$counter++;
		}

		return $items;
	}

	/**
	* Получение из БД списка Why
	**/
	public static function getWhyListItems()
	{
		$db = Db::getConnection();

		$item = array();

		$stmt = $db->query("SELECT * FROM data WHERE type='why_list'");
		if(!$stmt) return null;

		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		$row = $stmt->fetch();

		$item['id'] = $row['id'];
		$item['value'] = explode("\n", $row['value']);

		return $item;
	}

	/**
	* Получение из БД списка What
	**/
	public static function getWhatListItems()
	{
		$db = Db::getConnection();

		$item = array();

		$stmt = $db->query("SELECT * FROM data WHERE type='what_list'");
		if(!$stmt) return null;

		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		$row = $stmt->fetch();

		$item['id'] = $row['id'];
		$item['value'] = explode("\n", $row['value']);

		return $item;
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

		$counter = 0;
		foreach ($stmt as $row) {
			$items[$counter]['id'] = $row['id'];
			$items[$counter]['value'] = $row['value'];
			$counter++;
		}

		return $items;
	}


	/**
	* обновление данных
	**/
	public static function update($id, $text)
	{
		$db = Db::getConnection();

		$stmt = $db->prepare("UPDATE data SET value=:text WHERE id=:id");
		$result = $stmt->execute(array('text' => $text, 'id' => $id));

		if($result) {
			return "ok";
		}

		return "error";
	}
}