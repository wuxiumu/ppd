<?php

// 如果你使用php的依赖安装。可以使用以下方法自动载入
require 'vendor/autoload.php';

// intervention
use Intervention\Image\ImageManagerStatic as Image;

$variable = isset($_GET['id']) ? $_GET['id'] : 1;
switch ($variable) {
    case 1:
        $img = Image::make(__DIR__ . '/public/img/Sossusvlei.jpeg');
        echo $img->response('jpeg');
        break;

    case 2:
        $img = Image::make(__DIR__ . '/public/img/Sossusvlei.jpeg')->resize(600, 800);

        $img->text('「我喜欢跑步时听音乐」', 120, 220, function ($font) {

            $font->file(__DIR__ . '/public/tmp/SourceHanSansCN-Normal.ttf');

            $font->size(32);

            $font->valign('bottom');

            $font->color('#333333');
        });

        echo $img->response('jpeg');
        break;
    case 3:
        $img = Image::make(__DIR__ . '/public/img/Sossusvlei.jpeg')->resize(600, 800);

        $img->text('「我喜欢跑步时听音乐」', 120, 220, function ($font) {
            $font->file(__DIR__ . '/public/tmp/SourceHanSansCN-Normal.ttf');
            $font->size(32);
            $font->valign('bottom');
            $font->color('#333333');
        });

        // 获取第二个图片
        $erweimaimage = Image::make(__DIR__ . '/public/img/WechatIMG9.jpeg')->resize(200, 200);

        // 插入到底部，下边距 50 处
        $img->insert($erweimaimage, 'bottom', 0, 50);

        echo $img->response('jpeg');
        break;
    case 4:
        $xcxurl = __DIR__ . '/public/img/WechatIMG9.jpeg';
        $share['nickname'] = 'PPD';
        $share['face_img'] = __DIR__ . '/public/img/tx.jpeg';
        $book['name'] = 'PPDBook';
        $book['goods_img'] = __DIR__ . '/public/img/book.jpeg';
        $book['orig_price'] = 99;
        $book['price'] = 80;
        $book['group'] = [
            'price' => 49,
            'endtime' => '2022-01-30',
            'min_quantity' => 10,
        ];
        $background = [
            __DIR__ . '/public/img/Sossusvlei.jpeg',
            __DIR__ . '/public/img/00.png',
            __DIR__ . '/public/img/error-bg.png'
        ];

        $font_paths =  [
            __DIR__ . '/public/tmp/SourceHanSansCN-Normal.ttf',
            __DIR__ . '/public/tmp/SourceHanSansCN-Normal.ttf'
        ];

        $font_path = $font_paths[rand(0, 1)];
        $img = Image::make($background[rand(0, 2)])->resize(640, 1000);

        $face_img = Image::make($share['face_img'])
            ->resize(60, 60);
        // 头部加头像
        $img->insert(
            $face_img,
            'top-left',
            55,
            76
        );

        // 头部加昵称
        $img->text($share['nickname'] . '为你推荐', 131, 120, function ($font) use ($font_path) {
            $font->file($font_path);
            $font->size(32);
            $font->valign('bottom');
            $font->color('#333333');
        });

        // 图书图片区域
        $bodyimage = Image::canvas(533, 475, '#fe7e86');

        $goodsimage = Image::make($book['goods_img'])
            ->resize(531, 309);
        // echo $goodsimage;return;
        $bodyimage->insert($goodsimage, 'top-left', 1, 1);

        $bodybuttomimage = Image::canvas(531, 164, '#fff');
        // dump($book);return;
        $strings =  ['魔幻现实主义文学的代表作','诺贝尔文学奖作品'];

        $i = 0; //top position of string
        if (count($strings) == 1) {
            $bodybuttomimage->text($strings[0], 17, 44, function ($font) use ($font_path) {
                $font->file($font_path);
                $font->size(30);
                $font->valign('top');
                $font->color('#333333');
            });
        } else {
            foreach ($strings as $key => $string) {
                if ($key == 2) {
                    break;
                }
                // 标题部分
                $bodybuttomimage->text($string, 17, 16 + $i, function ($font) use ($font_path) {
                    $font->file($font_path);
                    $font->size(27);
                    $font->valign('top');
                    $font->color('#333333');
                });
                $i = $i + 43; //shift top postition down 42
            }
        }

        // 价格
        if ($book['orig_price']) {
            $price = $book['orig_price'];
        } else {
            $price = $book['price'];
        }
        $bodybuttomimage->text('原价：' . $price, 17, 118, function ($font) use ($font_path) {
            $font->file($font_path);
            $font->size(24);
            $font->valign('top');
            $font->color('#a3a3a3');
        });

        if ($book['group'] && $book['group']['endtime'] > date("Y-m-d H:i:s")) {
            $xianjiaString = '团购价：';
            $xianPrice = $book['group']['price'];

            $tuanButton = Image::canvas(107, 33, '#ff0000');

            $tuanButton->text($book['group']['min_quantity'] . '人团', 22, 6, function ($font) use ($font_path) {
                $font->file($font_path);
                $font->size(25);
                $font->align('left');
                $font->valign('top');
                $font->color('#fff');
            });

            $bodybuttomimage->insert($tuanButton, 'top-right', 30, 110);
        } else {
            $xianjiaString = '现价：';
            $xianPrice = $book['price'];
        }

        $bodybuttomimage->text($xianjiaString, 180, 118, function ($font) use ($font_path) {
            $font->file($font_path);
            $font->size(24);
            $font->valign('top');
            $font->color('#333333');
        });

        $bodybuttomimage->text('￥' . $xianPrice, 270, 118, function ($font) use ($font_path) {
            $font->file($font_path);
            $font->size(27);
            $font->valign('top');
            $font->color('#fe0000');
        });
        $bodyimage->insert($bodybuttomimage, 'top-left', 1, 310);
        $img->insert($bodyimage, 'top-left', 55, 154);

        // 底部二维码部分
        $dibuimage = Image::canvas(596, 308);

        $codeimage = Image::make(__DIR__ . '/public/img/WechatIMG9.jpeg')->resize(255, 255);
        $codesourceimage = Image::make($xcxurl)
            ->resize(249, 249);
        $codeimage->insert($codesourceimage, 'top-left', 3, 3);

        $dibuimage->insert($codeimage, 'top-left', 33, 23);

        $dibuimage->text('长按识别小程序码', 300, 110, function ($font) use ($font_path) {
            $font->file($font_path);
            $font->size(27);
            $font->valign('top');
            $font->color('#333333');
        });

        $dibuimage->text('立即抢购！', 370, 150, function ($font) use ($font_path) {
            $font->file($font_path);
            $font->size(27);
            $font->valign('top');
            $font->color('#333333');
        });

        $img->insert($dibuimage, 'top-left', 22, 650);
        // dump($img);return;
        echo $img->response('jpeg');
        break;
}
