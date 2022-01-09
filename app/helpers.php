<?php
/* ========================================================================
 * 全局函数
 * ======================================================================== */
// 打印数据 
function ddp($var){ echo "<pre>"; print_r($var); echo "</pre>";}
 
function ddd($array)
{
    call_user_func_array('ddp', func_get_args());
     
}

if (!function_exists('dd')) {
    function dd(...$vars)
    {
        foreach ($vars as $v) {
            dump($v);
        }

        die(1);
    }
}
if (!function_exists('dump')) {
    /**
     * @author Nicolas Grekas <p@tchwork.com>
     */
    function dump($var, ...$moreVars)
    {
        var_dump($var);
        foreach ($moreVars as $v) {
            var_dump($v);
        }

        if (1 < func_num_args()) {
            return func_get_args();
        }
        return $var;
    }
}
 