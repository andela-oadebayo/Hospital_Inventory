<?php
/**
 * Created by PhpStorm.
 * User: OluwadamilolaAdebayo
 * Date: 6/23/15
 * Time: 1:12 AM
 */

namespace Helpers;


class Helper {
    public static function hello(){
        return 'hello';
    }

    public static function format_message($message,$type)
    {
        return '<p class="alert alert-'.$type.'">'.$message.'</p>';
    }

}