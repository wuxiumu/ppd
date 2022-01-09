<?php
// 证明自己 思路
// 路由 noahbuscher/macaw
// 数据模型 catfan/medoo
// 视图 twig/twig
// 分页应用库 jasongrimes/paginator
// 文件图片上传 brandonsavage/Upload
// 图片水印  Intervention/image
// 单个文件自动加载helpers.php
// TODO 验证码，图片，文件，邮件，登录，权限，及时通信，发布订阅，秒杀，团购，sass
// run php -S localhost:8099
// Autoload 自动载入 composer dump-autoload

require './vendor/autoload.php';

define('PPDFRAME', __DIR__); // 项目入口
define('DEBUG', true); // 调试

// 调试
require './app/config/debug.php';

// 路由配置
require './app/config/routes.php';
