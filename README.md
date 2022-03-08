# ppd

证明自己 
1. 简单的blog 
2. 简单的视频素材管理
3. 分享，评论
4. 注册，权限
5. 通知

思路
```
路由 noahbuscher/macaw
数据模型 catfan/medoo
视图 twig/twig
分页应用库 jasongrimes/paginator
文件图片上传 brandonsavage/Upload
图片水印  Intervention/image
```

单个文件自动加载helpers.php

TODO 验证码，图片，文件，邮件，登录，权限，及时通信，发布订阅，秒杀，团购，sass
```
run php -S localhost:8099
```
Autoload 自动载入 
```
composer dump-autoload
```
composer.json
```
{
    "require": {
        "catfan/medoo": "^2.1",
        "twig/twig": "^3.3",
        "filp/whoops": "^2.14",
        "erusev/parsedown": "^1.7",
        "vlucas/phpdotenv": "^5.3",
        "symfony/var-dumper": "^5.3",
        "phpoffice/phpspreadsheet": "*",
        "ext-json": "*",
        "ext-curl": "*",
        "noahbuscher/macaw": "dev-master",
        "jasongrimes/paginator": "~1.0",
        "codeguy/upload": "1.3.2",
        "intervention/image": "^2.7"
    },
    "autoload": {
        "psr-4": {
            "Controllers\\": "app/Controllers/", 
            "Models\\": "app/Models/"
        },
        "files": [
            "app/helpers.php"
        ]
    }
}

```
