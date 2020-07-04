<?php


namespace App\SBlog\Core;


class BlogApp
{
    public static $app;

    public static function get_instance(){
        self::$app = Registry::instance();
        self::getParams();
        return self::$app;
    }
    private static function getParams(){
        $params = include CONF . '/params.php';

        if(!empty($params))
            foreach ($params as $k => $i){
                self::$app->setProperty($k , $i);
            }
    }


}
