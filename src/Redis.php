<?php

namespace App;

class Redis
{
    private static $instance = null;

    /**
     * @return \Predis\Client
     */
    public static function connection()
    {
        if (is_null(self::$instance)) {
            self::$instance = new \Predis\Client([
                'scheme' => getenv('REDIS_SCHEME'),
                'host' => getenv('REDIS_HOST'),
                'port' => getenv('REDIS_PORT'),
            ]);
        }

        return self::$instance;
    }
}
