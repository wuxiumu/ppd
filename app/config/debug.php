<?php
// 开发模式，提供更多的错误信息
if ($_ENV['APP_DEBUG']) {
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
    ini_set('display_error', 'On');
} else {
    error_reporting(0);
}
