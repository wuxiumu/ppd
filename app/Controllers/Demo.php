<?php

namespace Controllers;

use Models\TempDao;

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
    public function tt()
    {
        dump([
            'getenv' => getenv(),
            '_ENV' => $_ENV,
            '_SERVER' => $_SERVER,
        ]);
    }
    public function captcha()
    {
        captcha();
    }
    public function login()
    {
        json($code = 200, $msg = 'success', $_POST);
    }

    public function articlesInsert()
    {
        $model = new TempDao();
        $is_show = isset($_POST['is_show'])?1:0;
        $res = $model->insert("articles", [
            "title" => $_POST['title'],
            "desc" => $_POST['desc'],
            "content" => $_POST['content'],
            "is_show" => $is_show,
            "created_at" => $_POST['created_at'],
            "name" => 'admin',
        ]);
        if ($res) {
            json($code = 200, $msg = 'success', $res);
        } else {
            json($code = 400, $msg = 'errot',$res);
        }
    }
    public function articlesList()
    {
        $model = new TempDao();
        $res = $model->select('articles', ['id','title'], []);
        if ($res) {
            json($code = 200, $msg = 'success', $res);
        } else {
            json($code = 400, $msg = 'errot',$res);
        }
    }
    public function articlesView($id)
    {
        $model = new TempDao();
        $res = $model->get('articles', '*', [
            "id" => $id
        ]);
        if ($res) {
            json($code = 200, $msg = 'success', $res);
        } else {
            json($code = 400, $msg = 'errot',$res);
        }
    }
    public function articlesUpdate($id)
    {
        $model = new TempDao();
        $is_show = isset($_POST['is_show'])?1:0;
        $res = $model->update('articles', '*', [
            "title" => $_POST['title'],
            "desc" => $_POST['desc'],
            "content" => $_POST['content'],
            "is_show" => $is_show,
            "created_at" => $_POST['created_at'],
            "name" => 'admin',
            "updated_at" => date("Y-m-d H:i:s"),
        ]);
        if ($res) {
            json($code = 200, $msg = 'success', $res);
        } else {
            json($code = 400, $msg = 'errot',$res);
        }
    }
    public function articlesDelete($id)
    {
        $model = new TempDao();
        $res = $model->delete('articles', '*', [
            "id" => $id
        ]);
        if ($res) {
            json($code = 200, $msg = 'success', $res);
        } else {
            json($code = 400, $msg = 'errot',$res);
        }
    }
}
