<?php
abstract class Orm
{
    // Абстрактный метод для получения имени таблицы.
    abstract protected  function getTableName(): string;
    protected string $sql;
    // Абстрактный метод для получения полей таблицы.
    abstract protected  function getFields(): array;
 abstract protected  function getCondition($objects):string;
    // Удаление записи по ID.
    public   function deleteRecord(int $id)
    {
        // Формирование SQL-запроса для удаления записи.
        $sql = 'DELETE FROM ' . $this->getTableName() . ' WHERE ' . "id = :id";
        Database::prepare($sql)->execute([':id' => $id]);
        // TODO: Здесь должен быть вызов для выполнения SQL-запроса.
    }

   
     public  function getRecords(): array
    {

        // Формирование SQL-запроса для выбора всех данных из таблицы.
        $sql = 'SELECT * FROM ' . $this->getTableName();
        $statment = Database::query("$sql");
        $statment->execute();
        return $statment->fetchall();


    }

	public function where(string $rec, $val): array {
		$this->sql .= ' WHERE ' . $rec . ' = :value';
		var_dump($this->sql);
		$statement = Database::prepare($this->sql);
		$statement->bindValue(':value', $val);

		$statement->execute();

		return $statement->fetchAll();
	}

	public  function select()
	{
		$this->sql = 'SELECT * FROM ' . $this->getTableName();
		//$statment = Database::query("$sql");
		//$statment->execute();

		return $this;
	}


    public  function createRecords($array){
       
        if(count($this->getFields())-1!=count($array))
         return '';
        
        $sql='INSERT INTO '. $this->getTableName().'('. implode(', ', $this->getFields()) . ") VALUES (". implode(', ', array_map(fn($el) => ":$el", $this->getFields())).')';
        var_dump($sql);
        array_unshift($array, 'NULL');
        var_dump(array_combine($this->getFields(), $array));
       Database::prepare($sql)->execute(array_combine($this->getFields(), $array));
	}
    public  function updateRecords($id, $array){
       
        if(count($this->getFields())-1!=count($array))
         return '';
        
        $sql='UPDATE '. $this->getTableName(). " SET ". implode(', ', array_map(fn($el) => "$el = :$el", $this->getFields())).' WHERE ' . 'id = :id';
       // var_dump($sql);
        array_unshift($array, $id);
       // var_dump(array_combine($this->getFields(), $array));
		//echo('новыйzaproc');
		var_dump($sql);
		//echo('новый2');
		var_dump(array_combine($this->getFields(), $array));
		Database::prepare($sql)->execute(array_combine($this->getFields(), $array));
    }
	public function getJoinRecords(array $objects){
		$obj1=$this->getTableName();
		foreach($objects as $obj){

			$sql .=  ' JOIN ' . $obj->getTableName() . ' ON ' .  $obj->getTableName() . '.id=' . getCondition($obj);
         $obj1=$obj;
		}
		$sql= 'SELECT * FROM ' . $this->getTableName() . $sql;
		echo("Зпрос");
		var_dump($sql);

		$statment = Database::query("$sql");
		$statment->execute();
		return $statment->fetchall();
	}
   
}