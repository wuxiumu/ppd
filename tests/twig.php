<?php
// 如果你使用php的依赖安装。可以使用以下方法自动载入
require 'vendor/autoload.php';
 
// $loader = new \Twig\Loader\ArrayLoader([
//     'index' => 'Hello {{ name }}!',
// ]);
// $twig = new \Twig\Environment($loader);

// echo $twig->render('index', ['name' => 'Fabien']);


$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/tests/templates');
$twig = new \Twig\Environment($loader);
 
$words = ['sky', 'mountain', 'falcon', 'forest', 'rock', 'blue'];
$sentence = 'today is a windy day';

echo $twig->render('index.html',
    ['words' => $words, 'sentence' => $sentence]);
 