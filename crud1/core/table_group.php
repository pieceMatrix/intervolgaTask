<?php

class Group extends Orm
{
    // Возвращает имя таблицы, с которой работает данный класс.
    protected static function getTableName(): string
    {
        return 'groups'; // Пример: имя таблицы с пользователями
    }

    // Возвращает список полей таблицы.
    protected static function getFields(): array
    {
        return ['id', 'name'];
    }


    // Дополнительные методы для работы с пользователями, если нужно
}