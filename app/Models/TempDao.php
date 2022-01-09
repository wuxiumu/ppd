<?php

namespace Models;

class TempDao extends  BaseDao
{
    public function getList()
    {
        $data = $this->select('students', '*', ['sno' => '108']);
        return $data;
    }
}
