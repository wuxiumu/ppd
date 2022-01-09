<?php

// 如果你使用php的依赖安装。可以使用以下方法自动载入
require 'vendor/autoload.php';

use Upload\File;
use Upload\Storage\FileSystem;
use Upload\Validation\Mimetype;
use Upload\Validation\Size;

/**
 * 是否是AJAx提交的
 * @return bool
 */
function isAjax()
{
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        return true;
    } else {
        return false;
    }
}
/**
 * 是否是GET提交的
 */
function isGet()
{
    return $_SERVER['REQUEST_METHOD'] == 'GET' ? true : false;
}


// upload
error_reporting(E_ALL ^ E_DEPRECATED);
if (isGet() == false) {
    $path = __DIR__ . '/cache/temp';
    $storage = new FileSystem($path);


    $file = new File('foo', $storage);

    // Optionally you can rename the file on upload
    $new_filename = uniqid();
    $file->setName($new_filename);

    // Validate file upload
    // MimeType List => http://www.iana.org/assignments/media-types/media-types.xhtml
    $file->addValidations(array(
        // Ensure file is of type "image/png"
        new Mimetype('image/png'),

        //You can also add multi mimetype validation
        //new \Upload\Validation\Mimetype(array('image/png', 'image/gif'))

        // Ensure file is no larger than 5M (use "B", "K", M", or "G")
        new Size('5M')
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
    // header('Content-Type:application/json; charset=utf-8');
    // echo json_encode($file);
    // return;
    // Try to upload file
    try {
        // Success!
        $file->upload();
        header('Content-Type:application/json; charset=utf-8');
        echo json_encode(['code' => 200, 'msg' => 'ok']);
    } catch (\Exception $e) {
        // Fail!
        $errors = $file->getErrors();
        header('Content-Type:application/json; charset=utf-8');
        echo json_encode($errors);
    }
}else{
?>
<!DOCTYPE html>
<html>

<body>
    <form method="POST" enctype="multipart/form-data" action="/upload.php">
        <input type="file" name="foo" value="" />
        <input type="submit" value="Upload File" />
    </form>
</body>

</html>
<?php
}
?>