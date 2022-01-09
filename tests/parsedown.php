<?php
// 如果你使用php的依赖安装。可以使用以下方法自动载入
require 'vendor/autoload.php';

$Parsedown = new Parsedown();

echo $Parsedown->text('Hello _Parsedown_!'); # prints: <p>Hello <em>Parsedown</em>!</p>