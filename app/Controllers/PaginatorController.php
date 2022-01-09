<?php

namespace Controllers;

use JasonGrimes\Paginator;

class PaginatorController extends  BaseController
{

    /**
     * 分页
     *
     * 测试链接：
     *  - http://localhost:8099/paginator/lists/1
     *
     */
    public function lists($num)
    {
        $totalItems = 1000;
        $itemsPerPage = 50;
        $currentPage = $num ?? 8;
        $urlPattern = '/paginator/lists/(:num)';
        $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
        $this->assign('paginator', $paginator);
        $this->display('paginator/index');
    }
}
