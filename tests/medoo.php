<?php

// 如果你使用php的依赖安装。可以使用以下方法自动载入
require 'vendor/autoload.php';
 
use Medoo\Medoo;

// 初始化配置
$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'test',
    'server' => '116.196.115.98:33068',
    'username' => 'root',
    'password' => '123456',
    'charset' => 'utf8'
]);
 
dump($database);
 