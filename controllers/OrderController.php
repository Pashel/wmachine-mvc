<?php

/**
* Контроллер для добавления ордера
*/
class OrderController
{

	public function __construct()
	{
		$this->menu = Menu::getAllMenuItems();
		$this->footerStrings = Data::getAllFooterStrings();

		if(isset($_SESSION['login'])){
			$this->ordersCount = Order::getOrdersCount();
		}
	}

	/**
	* Показать существующие заявки
	**/
	public function actionShow($pageId = 0)
	{
		// если не режим админа
		if(!isset($_SESSION['login'])) {
			header("Location: /");
			return;
		}

		$orders = Order::getAllorders();

		require_once(ROOT . '/views/orders.php');
	}

	/**
	* Добавление нового заказа
	**/
	public function actionAdd($pageId = 0)
	{
		// если не режим админа
		if(!isset($_SESSION['login'])) {
			header("Location: /");
			return;
		}

		// если нету POST данных
		if(!isset($_POST['name']) || !isset($_POST['phone']) || !isset($_POST['message'])) {
			header("Location: /");
			return;
		}

		// Телефон не указан
		if($_POST['phone'] == "") {
			header("Location: /");
			return;
		}

		// добавляем заявку в бд
		$result = Order::addNewOrder($_POST['name'], $_POST['phone'], $_POST['message']);

		if($result) {
			$message = "Ваша заявка успешно добавлена, ждите звонка мастера!";
		}
		else {
			$message = "Добавить заявку не удалось, попробуйте еще раз.";
		}

		require_once(ROOT . '/views/new-order.php');
	}

	/**
	* Удаление ордера
	**/
	public function actionDelete($orderId)
	{
		// если не режим админа
		if(!isset($_SESSION['login'])) {
			header("Location: /");
			return;
		}

		// удаляем ордер из таблицы
		$result = Order::deleteOrder($orderId);

		// отображаем страницу ордеров
		header('Location: /orders');
	}
}