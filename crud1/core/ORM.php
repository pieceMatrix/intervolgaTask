<?php
abstract class Orm
{
    // Абстрактный метод для получения имени таблицы.
    abstract protected static function getTableName(): string;

    // Абстрактный метод для получения полей таблицы.
    abstract protected static function getFields(): array;

    // Удаление записи по ID.
    public static  function deleteRecord(int $id)
    {
        // Формирование SQL-запроса для удаления записи.
        $sql = 'DELETE FROM ' . $this->getTableName() . 'WHERE' . "id = :id";
        Database::prepare($sql)->execute([':id' => $id]);
        // TODO: Здесь должен быть вызов для выполнения SQL-запроса.
    }

   
    public static function getRecords()
    {

        // Формирование SQL-запроса для выбора всех данных из таблицы.
        $sql = 'SELECT * FROM ' . static::getTableName();
        $statment = Database::query("$sql");
        $statment->execute();
        return $statment->fetchall();

        // TODO: Здесь должен быть вызов для выполнения SQL-запроса.
    }

    public static function createRecords($array){
       
        if(count(static::getFields())-1!=count($array))
         return '';
        
        $sql='INSERT INTO '. static::getTableName().'('. implode(', ', static::getFields()) . ") VALUES (". implode(', ', array_map(fn($el) => ":$el", static::getFields())).')';
        var_dump($sql);
        array_unshift($array, 'NULL');
        var_dump(array_combine(static::getFields(), $array));
       Database::prepare($sql)->execute(array_combine(static::getFields(), $array));
    }
    public static function updateRecords($id, $array){
       
        if(count(static::getFields())-1!=count($array))
         return '';
        
        $sql='UPDATE INTO '. static::getTableName(). "SET ". implode(', ', array_map(fn($el) => "$el = :$el", static::getFields())).'WHERE' . "id = :id";
        var_dump($sql);
        array_unshift($array, $id);
        var_dump(array_combine(static::getFields(), $array));
       Database::prepare($sql)->execute(array_combine(static::getFields(), $array));
    }
   
}