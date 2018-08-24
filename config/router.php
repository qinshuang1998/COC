<?php
use NoahBuscher\Macaw\Macaw;

Macaw::get('', 'app\controller\HomeController@index');

Macaw::$error_callback = function(){
  throw new Exception("路由无匹配项 404 Not Found");
};

Macaw::dispatch();