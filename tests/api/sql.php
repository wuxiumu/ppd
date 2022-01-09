<?php

// 如果你使用php的依赖安装。可以使用以下方法自动载入
require '../../vendor/autoload.php';

use Medoo\Medoo;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../../');
$dotenv->load();

// 初始化配置
$database = new Medoo([
    'database_type' => $_ENV['DB_CONNECTION'],
    'server' => $_ENV['DB_HOST'],
    'port'=> $_ENV['DB_PORT'],
    'database_name' => $_ENV['DB_DATABASE'],
    'username' => $_ENV['DB_USERNAME'],
    'password' => $_ENV['DB_PASSWORD'],
    'charset' => 'utf8'
]);
$data['code']=200;
$data['msg']='ok';
$data['data'] = $database->query($_POST['content'])->fetchAll();

header('Content-Type:application/json; charset=utf-8');

echo json_encode($data);