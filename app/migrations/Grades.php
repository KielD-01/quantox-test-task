<?php


namespace Application\Migrations;


use Framework\Core\Database\Connection;
use Framework\Core\Interfaces\Migratable;
use Illuminate\Database\Schema\Blueprint;

class Grades extends Connection implements Migratable
{

    protected static $table = 'grades';

    public static function create(): string
    {
        if (!static::exists(self::$table)) {
            static::db()::schema()
                ->create(static::$table, function (Blueprint $table) {
                    $table->integer('id')->autoIncrement();
                    $table->integer('student_id')->nullable(false);
                    $table->enum('grade', range(1, 12))->nullable(false);
                });

            return "Table \033[1;33m" . self::$table . "\033[0m has been successfully created" . PHP_EOL;
        }

        return "Table \033[1;33m" . self::$table . "\033[0m already exists" . PHP_EOL;
    }

    public static function drop(): string
    {
        if (static::exists(self::$table)) {
            static::db()::schema()
                ->drop(static::$table);

            return "Table \033[1;33m" . self::$table . "\033[0m has been successfully dropped" . PHP_EOL;
        }

        return "Table \033[1;33m" . self::$table . "\033[0m already exists" . PHP_EOL;
    }
}