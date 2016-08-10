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

		$stmt = $db->query("SELECT * FROM menu");
		if(!$stmt) return null;

		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		foreach ($stmt as $row) {
			array_push($items, $row);
		}

		return $items;
	}

	/**
	* обновление данных
	**/
	public static function update($id, $text)
	{
		$db = Db::getConnection();

		$stmt = $db->prepare("UPDATE menu SET value=:text WHERE id=:id");
		$result = $stmt->execute(array('text' => $text, 'id' => $id));

		if($result) {
			return "ok";
		}

		return "error";
	}
}
