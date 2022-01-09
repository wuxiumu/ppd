<?php
$redis = new Redis();
$redis->connect('127.0.0.1',6379);
$redis->set('test','123456');
echo $redis->get('test');
echo "</br>";
//生存时间，默认返回-1
echo $redis->ttl('test');
echo "</br>";
//设置生存时间
$redis->setex('key', 7, 'val');
echo $redis->ttl('key');
echo "</br>";
//查找有返回1
echo $redis->exists('test');
echo "</br>///";



//移除
$redis->delete('test');
echo $redis->exists('test');
echo "///</br>";

//多值单存
$redis->mset(array('key0' => 'value0', 'key1' => 'value1'));
//多值单取
echo $redis->get('key0');
echo $redis->get('key1');
echo "</br>";
$redis->set('key1', 'value1');
$redis->set('key2', 'value2');
$redis->set('key3', 'value3');
//多值合并数组
print_r($redis->getMultiple(array('key1', 'key2', 'key3')));
echo "</br>";

//同时给多个key赋值
$redis->mset(array('x1' => 'a', 'y1' => 'b', 'z1' => 'c'));
print_r($redis->mget(array('x1', 'y1', 'z1')));
echo "</br>";


//向名称为h的hash中添加元素key1
$redis->hSet('h', 'key1', '111');
$redis->hSet('h', 'key2', '222');

echo $redis->hGet('h', 'key1');
echo "</br>";
echo $redis->hGet('h', 'key2');
echo "</br>";

print_r($redis->hKeys('h'));
echo "</br>";
print_r($redis->hVals('h'));
echo "</br>";

//名称为h的hash中是否存在键名字为key2的域
print_r($redis->hExists('h', 'key2'));//找到返回1   不然不返回
echo "</br>";

$redis->hMset('h', array('x' => 123, 'y' => 456, 'z' => 'abc'));
print_r($redis->hGet('h', 'x'));
echo "</br>";
print_r($redis->hMget('h', array('x', 'y')));