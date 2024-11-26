<?php

class Grade extends Orm
{
	// Возвращает имя таблицы, с которой работает данный класс.
	protected  function getTableName(): string
	{
		return 'grades'; // Пример: имя таблицы с пользователями
	}

	// Возвращает список полей таблицы.
	protected  function getFields(): array
	{
		return ['id', 'grade', 'id_student','id_subject'];
	}
	protected function getCondition($objects):string{
		if($objects=='subjects')
		return 'id_subject';
		else//дописать условие для студента
			return 'id_student';
	}

	// Дополнительные методы для работы с пользователями, если нужно
}
