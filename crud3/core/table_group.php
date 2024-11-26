<?php

class Group extends Orm
{
    // Возвращает имя таблицы, с которой работает данный класс.
    protected  function getTableName(): string
    {
        return 'groups'; // Пример: имя таблицы с пользователями
    }

    // Возвращает список полей таблицы.
    protected  function getFields(): array
    {
        return ['id', 'name'];
    }
	protected function getCondition($objects):string{
		if($objects=='students')
			return 'id_subject';
		else//дописать условие для студента
			return 'id_subject';
	}

    // Дополнительные методы для работы с пользователями, если нужно
}