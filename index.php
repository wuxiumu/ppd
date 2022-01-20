<?php

require './vendor/autoload.php';

define('PPDFRAME', __DIR__); // 项目入口

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// 调试
require './app/config/debug.php';

// 路由配置
require './app/config/routes.php';