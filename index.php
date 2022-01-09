<?php

require './vendor/autoload.php';

define('PPDFRAME', __DIR__); // 项目入口
define('DEBUG', true); // 调试

// 调试
require './app/config/debug.php';

// 路由配置
require './app/config/routes.php';