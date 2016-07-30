<?php

/**
* Модель доступа к таблице услуг
*/
class Service
{
	/**
	* Список услуг и их цены
	**/
	public static function getServicesList()
	{
		$db = Db::getConnection();

		$items = array();

		$stmt = $db->query("SELECT * FROM services");
		if(!$stmt) return null;

		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		foreach ($stmt as $row) {
			$items[$row['name']] = $row['price'];
		}

		return $items;
	}

}
