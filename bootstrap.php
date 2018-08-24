<?php
use Illuminate\Database\Capsule\Manager as Capsule;

//定义 ROOT_PATH
define('ROOT_PATH', __DIR__);
//定义 VIEW_PATH
define('VIEW_PATH', __DIR__.'/app/view/');

//Autoload 自动载入
require ROOT_PATH.'/vendor/autoload.php';

//Eloquent ORM
$capsule = new Capsule;
$capsule->addConnection(require ROOT_PATH.'/config/database.php');
$capsule->bootEloquent();

//whoops 错误提示
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();