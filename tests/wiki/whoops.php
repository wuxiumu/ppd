<?php
// 如果你使用php的依赖安装。可以使用以下方法自动载入
require 'vendor/autoload.php';

// run whoops.php
define('DEBUG',true);
 
// 开发模式，提供更多的错误信息
if(DEBUG){
	$whoops = new \Whoops\Run;
	$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
	$whoops->register();
	ini_set('display_error', 'On');
}else{
	ini_set('display_error', 'Off');
}