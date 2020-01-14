<?php


namespace Framework\Core\Database;


use Framework\Core\Bootstrap;
use Illuminate\Database\Capsule\Manager;

class Connection extends Bootstrap
{
    /** @var Manager */
    private static $db;

    public function connect()
    {
        self::$db = new Manager;
        self::$db->addConnection([
            'driver' => 'mysql',
            'host' => '127.0.0.1',
            'database' => 'sg',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci'
        ]);

        self::$db->setAsGlobal();
        self::$db->bootEloquent();
    }

    /**
     * @return Manager
     */
    public static function db()
    {
        return self::$db;
    }

    /**
     * @return bool
     */
    public static function exists($table)
    {
        return static::db()::schema()
            ->hasTable($table);
    }
}