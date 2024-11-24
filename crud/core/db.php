<?php

class Database
{
	private static $instance = null;
	private $connection = null;

	// Закрываем конструктор, чтобы предотвратить создание экземпляров класса
	protected function __construct()
	{
		try {
			$this->connection = new \PDO(
				"mysql:dbname=dbtu1;host=tu1.ivsupport",
				'bitrix',
				'[,1YxN3iLi6RS\'qC' // Экранирование одинарной кавычки
			);
			// Устанавливаем режим обработки ошибок
			$this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		} catch (\PDOException $e) {
			echo "Ошибка подключения: " . $e->getMessage();
		}
	}

	// Метод для получения экземпляра класса

}