<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/4/15
 * Time: 10:22 AM
 */

class Composer {
    function __construct()
    {
        include("./vendor/autoload.php");
    }

    public function log($type, $text){
        $log = new Monolog\Logger($type);
        $log->pushHandler(new Monolog\Handler\StreamHandler('app.log', Monolog\Logger::INFO));
        $log->addInfo($text);
    }

}