<?php


namespace Framework\Core;


use Closure;
use Framework\Core\Database\Connection;
use stdClass;

abstract class Bootstrap
{

    /** @var Bootstrap|Request|Connection */
    private static $instance;

    /**
     * @param stdClass $class
     * @param Closure|null $closure
     * @return Bootstrap|Connection|Request
     */
    public static function init($class, ?Closure $closure = null)
    {
        self::$instance = !self::$instance instanceof $class ?
            new $class : self::$instance;

        if ($closure instanceof Closure) {
            self::$instance->after($closure);
        }

        return self::i();
    }

    /**
     * @return Bootstrap|Request|Connection
     */
    public static function i()
    {
        return self::$instance;
    }

    public function after(Closure $closure)
    {
        $closure();
    }
}