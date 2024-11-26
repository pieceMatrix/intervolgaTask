
<?php
class Student extends Orm
{
    // Возвращает имя таблицы, с которой работает данный класс.
    protected  function getTableName(): string
    {
        return 'students'; // Пример: имя таблицы с пользователями
    }

    // Возвращает список полей таблицы.
    protected  function getFields(): array
    {
        return ['id','id_group','fullname',];
    }

	protected function getCondition($objects):string{
		if($objects=='groups')
			return 'id_student';
		else//дописать условие для связи с предметами!
			return 'id_subject';
	}
    // Дополнительные методы для работы с пользователями, если нужно
}