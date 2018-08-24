<?php
namespace app\controller;

use coc\View;
use coc\Cache;
use app\model\Articles;

class HomeController extends BaseController
{
  public function index()
  {
    View::make('index')->withTitle('Welcome')
                       ->withMain('Hello, Welcome to COC')
                       ->display();
    //Cache::init()->get('name');
  }
}