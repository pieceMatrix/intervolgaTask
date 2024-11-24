
<?php
class Student extends Orm
{
    // Возвращает имя таблицы, с которой работает данный класс.
    protected static function getTableName(): string
    {
        return 'students'; // Пример: имя таблицы с пользователями
    }

    // Возвращает список полей таблицы.
    protected static function getFields(): array
    {
        return ['id', 'fullname'];
    }

    // Дополнительные методы для работы с пользователями, если нужно
}