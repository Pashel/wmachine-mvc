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
			array_push($items, $row);
		}

		return $items;
	}

	/**
	* обновление данных
	**/
	public static function update($id, $text, $price)
	{
		$db = Db::getConnection();

		$stmt = $db->prepare("UPDATE services SET name=:text, price=:price WHERE id=:id");
		$result = $stmt->execute(array('text' => $text, 'price' => $price, 'id' => $id));

		if($result) {
			return "ok";
		}

		return "error";
	}


	/**
	* добавление новой услуги
	**/
	public static function create($text, $price)
	{
		$db = Db::getConnection();
		
		$stmt = $db->prepare("INSERT INTO services (name, price) VALUES (:name, :price)");
		$result = $stmt->execute(array('name' => $text, 'price' => $price));

		if($result) {
			return "ok";
		}

		return "error";
	}

	/**
	* Удаление услуги
	**/
	public static function deleteService($serviceId)
	{
		$db = Db::getConnection();

		$stmt = $db->prepare("DELETE FROM services WHERE id=:id");
		$result = $stmt->execute(array('id' => $serviceId));

		return $result;
	}
}
