<?php

namespace Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use Models\TempDao;
use Controllers\BaseController as BaseControllers;
use Upload\File;
use Upload\Storage\FileSystem;
use Upload\Validation\Mimetype;
use Upload\Validation\Size;

class TempController extends BaseControllers
{

    /**
     * 学生列表
     *
     * 测试链接：
     *  - http://localhost:8099/temp/lists
     *
     */
    public function lists()
    {
        $model = new TempDao();
        $navigation = $model->select('students', '*', []); //dump($navigation);return;
        $this->assign('navigation', $navigation);
        $this->display('temp/lists');
    }
    /**
     * 学生添加页
     *
     * 测试链接：
     *  - http://localhost:8099/temp/add
     *
     */
    public function add()
    {
        $item = [
            "sno" => '108',
            "sname" => '曾华',
            "ssex" => '男',
            "sbirthday" =>  '1977-09-01 00:00:00',
            "class" => '95033',
        ];
        $this->assign('item', $item);
        $this->display('temp/add');
    }
    /**
     * 学生添加方法
     *
     * 测试链接：
     *  - http://localhost:8099/temp/insert
     *
     */
    public function insert()
    {
        $model = new TempDao();
        $res = $model->insert("students", [
            "sno" => $_POST['sno'],
            "sname" => $_POST['sname'],
            "ssex" => $_POST['ssex'],
            "sbirthday" => $_POST['sbirthday'],
            "class" => $_POST['class'],
        ]);
        if ($res) {
            redirect('/temp/lists');
        } else {
            echo json_encode($res);
        }
    }
    /**
     * 学生删除方法
     *
     * 测试链接：
     *  - http://localhost:8099/temp/del/108
     *
     */
    public function del($id)
    {
        $model = new TempDao();
        $res = $model->delete("students", [
            "sno" => $id,
        ]);
        if ($res) {
            redirect('/temp/lists');
        } else {
            echo json_encode($res);
        }
    }
    /**
     * 学生预览
     *
     * 测试链接：
     *  - http://localhost:8099/temp/view/1
     *
     */
    public function view($id)
    {

        $loader = new \Twig\Loader\FilesystemLoader('app/views');
        $twig = new \Twig\Environment($loader);
        $model = new TempDao();
        $data = $model->select('students', '*', ['sno' => $id]);
        echo $twig->render('temp/view.html', ['navigation' => $data]);
    }
    /**
     * 学生编辑页
     *
     * 测试链接：
     *  - http://localhost:8099/temp/edit/1
     *
     */
    public function edit($id)
    {

        $loader = new \Twig\Loader\FilesystemLoader('app/views');
        $twig = new \Twig\Environment($loader);
        $model = new TempDao();
        $data = $model->select('students', '*', ['sno' => $id]);
        echo $twig->render('temp/edit.html', ['navigation' => $data]);
    }
    /**
     * 学生更新方法
     *
     * 测试链接：
     *  - http://localhost:8099/paginator/update/1
     *
     */
    public function update($id)
    {
        $model = new TempDao();
        $res = $model->update("students", [
            "sname" => $_POST['sname'],
        ], [
            "sno" => $_POST['sno'],
        ]);
        if ($res) {
            redirect('/temp/view/' . $id);
        } else {
            echo json_encode($res);
        }
    }
    //
    /**
     * 文件上传
     *
     * 测试链接：
     *  - http://localhost:8099/temp/fileupload
     *
     */
    public function fileupload()
    {

        $path = PPDFRAME . '/public/tmp/uploader';
        $storage = new FileSystem($path);
        $file = new File('foo', $storage);
        // Optionally you can rename the file on upload
        $new_filename = uniqid();
        $file->setName($new_filename);

        // Validate file upload
        // MimeType List => http://www.iana.org/assignments/media-types/media-types.xhtml
        $file->addValidations(array(
            // Ensure file is of type 'image/png'
            new Mimetype(array('image/png', 'image/gif', 'image/jpg', 'image/jpeg')),
            //You can also add multi mimetype validation
            //new \Upload\Validation\Mimetype( array( 'image/png', 'image/gif' ) )
            // Ensure file is no larger than 5M ( use 'B', 'K', M', or 'G" )
            new Size('50M')
        ));
        // Access data about the file that has been uploaded
        $data = array(
            'name'       => $file->getNameWithExtension(),
            'extension'  => $file->getExtension(),
            'mime'       => $file->getMimetype(),
            'size'       => $file->getSize(),
            'md5'        => $file->getMd5(),
            'dimensions' => $file->getDimensions()
        );
        // Try to upload file
        $file_name = $path . '/' . $new_filename . '.' . $data['extension'];
        try {
            // Success!
            $file->upload();
            //添加水印裁剪
            // open an image file
            $img = Image::make($file_name);
            // resize image instance
            $img->resize(320, 240);
            // insert a watermark
            $img->insert($path . '/watermark.gif');
            // save image in desired format
            $img->save($path . '/' . $new_filename . '_1.' . $data['extension']);
        } catch (\Exception $e) {
            // Fail!
            $errors = $file->getErrors();
            dd($errors);
        }
    }

    /**
     * 文件上传
     *
     * 测试链接：
     *  - http://localhost:8099/temp/watermark
     *
     */
    public function watermark()
    {
        $new_filename = '6164ffef2bfb0';
        $path = PPDFRAME . '/public/tmp/uploader';
        $data['extension'] = 'jpg';
        $file_name = $path . '/' . $new_filename . '.jpg';
        // dump($file_name);return;
        $img = Image::make($file_name);
        // resize image instance
        $img->resize('top', 320, 240);
        // insert a watermark
        $img->insert($path . '/watermark.gif');
        // save image in desired format
        $img->save($path . '/' . $new_filename . '_1.' . $data['extension']);
    }
}
