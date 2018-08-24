<?php
namespace coc;

class Cache
{
    public static $type;
    public static $handler;
    private function __construct(){}
    public static function init()
    {
        self::$type = require ROOT_PATH . '/config/cache.php';
        $conf = self::$type[self::$type['type']];
        $className = '\coc\Driver\\' . self::$type['type'];
        self::$handler = new $className($conf);
        return self::$handler;
    }
}