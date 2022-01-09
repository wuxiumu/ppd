<?php

// 如果你使用php的依赖安装。可以使用以下方法自动载入
require 'vendor/autoload.php';
 
// phpspreadsheet

use PhpOffice\PhpSpreadsheet\Spreadsheet;

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



$step = 1;
switch ($step) {
    case '1':
        demo();
        break;
    
    default:
        echo 'hello phpspreadsheet';
        break;
}

function demo(){
    $spreadsheet = new Spreadsheet();

    $sheet = $spreadsheet->getActiveSheet();
    
    $sheet->setCellValue('A1', 'Hello World !');
    
    $writer = new Xlsx($spreadsheet);
    
    $writer->save(__DIR__.'/cache/temp/hello world.xlsx');

    dump($writer);
}