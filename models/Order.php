<?php

/**
* Модель доступа к таблице с пользователями
*/
class Order
{
	/**
	* Проверка пользователя
	**/
	public static function addNewOrder($name, $phone, $message)
	{
		$db = Db::getConnection();
		
		$stmt = $db->prepare("INSERT INTO orders (name, phone, message) VALUES (:name, :phone, :message)");
		$result = $stmt->execute(array('name' => $name, 'phone' => $phone, 'message' => $message));

		if(!$result) {
			return false;
		}

		return true;
	}

	/**
	* Получение всех заявок
	**/
	public static function getAllorders()
	{
		$db = Db::getConnection();

		$items = array();
		
		$stmt = $db->query("SELECT * FROM orders");
		if(!$stmt) return null;

		foreach ($stmt as $row) {
			array_push($items, $row);
		}

		return $items;
	}

	/**
	* Получение числа заявок
	**/
	public static function getOrdersCount()
	{
		$db = Db::getConnection();

		$stmt = $db->query("SELECT COUNT(*) as count FROM orders");
		if(!$stmt) return null;

		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		$row = $stmt->fetch();

		return $row['count'];
	}

	/**
	* Удаление ордера
	**/
	public static function deleteOrder($orderId)
	{
		$db = Db::getConnection();

		$stmt = $db->prepare("DELETE FROM orders WHERE id=:id");
		$result = $stmt->execute(array('id' => $orderId));

		return $result;
	}
}
