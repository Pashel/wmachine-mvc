<?php

/**
* Модель доступа к таблице с пользователями
*/
class Login
{
	/**
	* Проверка пользователя
	**/
	public static function verifyUser($user, $password)
	{
		$db = Db::getConnection();

		$stmt = $db->query("SELECT * FROM users");
		if(!$stmt) return null;

		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		foreach ($stmt as $row) {
			// проверяем совпадение данных
			if($row['user'] == $user && password_verify($password, $row['password'])) {
				return true;
			}
		}

		return false;
	}
}
