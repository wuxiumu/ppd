<?php
namespace Models;

use Medoo\Medoo;

class BaseDao extends Medoo {
    function __construct() {
        $options = [
            'type' => 'mysql',
            'host' => '127.0.0.1',
            'database' => 'sql50',
            'username' => 'root',
            'password' => '123456'
        ];
        parent::__construct( $options );
    }
}