<?php
// 如果你使用php的依赖安装。可以使用以下方法自动载入
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '.env.demo');
$dotenv->load();

dump([
    'getenv'=>getenv(),
    '_ENV'=>$_ENV,
    '_SERVER'=>$_SERVER,
]);

 