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
        $arr = [];
        foreach ($arr as $key => $value) {
            # code...
        }
        echo 'home';
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
        echo $id;
    }
}
