<?php

class Database
{
	private static $instance = null;
	private $connection = null;

	// Закрываем конструктор, чтобы предотвратить создание экземпляров класса
	   protected function __construct()
    {
        $this->connection = new \PDO(
            "mysql:dbname=dbtu1;host=localhost",
            'root',
            '',
        );
    }

	public static function getInstance(): Database
    {
        if(null === self::$instance) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    public static function connection(): \PDO
    {
        return static::getInstance()->connection;
    }

    public static function prepare($statement): \PDOStatement
    {
        return static::connection()->prepare($statement);
    }

    public static function query($statement): \PDOStatement
    {
        return static::connection()->query($statement);
    }

    public static function lastInsertId(): int
    {
        return intval(static::connection()->lastInsertId());
    }

    protected function __clone()
    {
    }

    public function __wakeup()
    {
        throw new \BadMethodCallException('Unable to deserialize database connection');
    }
}