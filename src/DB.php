<?php

namespace App;

class DB
{
    private static $instance = null;

    /**
     * @return \mysqli
     */
    public static function connection()
    {
        if (is_null(self::$instance)) {
            self::$instance = new \mysqli(getenv('DB_HOST'), getenv('DB_USERNAME'), getenv('DB_PASSWORD'), getenv('DB_NAME'));
        }

        return self::$instance;
    }
}
