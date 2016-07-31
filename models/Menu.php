<?php

/**
* Модель доступа к таблице Menu 
*/
class Menu
{
	/**
	* Получение из БД всех пунктов меню сайта
	**/
	public static function getAllMenuItems()
	{
		$db = Db::getConnection();

		$items = array();
		$item = array();

		$stmt = $db->query("SELECT * FROM menu");
		if(!$stmt) return null;

		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		foreach ($stmt as $row) {
			array_push($items, $row);
		}

		return $items;
	}

}
