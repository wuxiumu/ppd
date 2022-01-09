<?php

namespace Controllers;

class Demo
{

    /**
     * 首页
     *
     * 测试链接：
     *  - http://localhost:8099/
     *
     */
    public function index()
    {
        echo '<a href="/temp/lists">My Webpage</a>';
    }

    /**
     * 列表页
     *
     * 测试链接：
     *  - http://localhost:8099/page
     *
     */
    public function page()
    {

        echo 'page';
    }

    /**
     * 预览页
     *
     * 测试链接：
     *  - http://localhost:8099/view/108
     *
     */
    public function view($id)
    {
        switch ($id) {
            case 99:
                dump([
                    'getenv' => getenv(),
                    '_ENV' => $_ENV,
                    '_SERVER' => $_SERVER,
                ]);
                break;

            default:
                echo $id;
                break;
        }
    }
}
