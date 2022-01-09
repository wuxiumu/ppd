<?php

namespace Models;

use Medoo\Medoo;

class BaseDao extends Medoo
{
    function __construct()
    {
        $options = [
            'type' => $_ENV['DB_CONNECTION'],
            'host' => $_ENV['DB_HOST'],
            'database' => $_ENV['DB_DATABASE'],
            'username' => $_ENV['DB_USERNAME'],
            'password' => $_ENV['DB_PASSWORD'],
            'port'=> $_ENV['DB_PORT'],
        ];
        parent::__construct($options);
    }
}
