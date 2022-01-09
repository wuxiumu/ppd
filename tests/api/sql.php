<?php

// 如果你使用php的依赖安装。可以使用以下方法自动载入
require '../../vendor/autoload.php';
 
use Medoo\Medoo;

// 初始化配置
$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'sql50',
    'server' => '127.0.0.1',
    'username' => 'root',
    'password' => '123456',
    'charset' => 'utf8'
]);
$data['code']=200;
$data['msg']='ok'; 
$data['data'] = $database->query($_POST['content'])->fetchAll();
 
header('Content-Type:application/json; charset=utf-8');

echo json_encode($data);