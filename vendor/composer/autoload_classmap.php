<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'app\\controller\\BaseController' => $baseDir . '/app/controller/BaseController.php',
    'app\\controller\\HomeController' => $baseDir . '/app/controller/HomeController.php',
    'app\\model\\Articles' => $baseDir . '/app/model/Articles.php',
    'coc\\Cache' => $baseDir . '/service/Cache.php',
    'coc\\Driver\\Redis' => $baseDir . '/service/Cache/Redis.php',
    'coc\\View' => $baseDir . '/service/View.php',
);