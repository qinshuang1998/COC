<?php
namespace coc\Driver;

use Predis\Client;

class Redis
{
  private $conf;
  private $handler;
  public function __construct($conf)
  {
    $this->conf = $conf;
  }
  public function init()
  {
    $this->handler = new Client($this->conf);
  }
  public function set($key, $value, $time=NULL)
  {
    $this->init();
    return ($time)? $this->_setex($key, $value, $time): $this->handler->set($key, $value);
  }
  public function get($key)
  {
    $this->init();
    return $this->handler->get($key);
  }
  public function delete($key)
  {
    $this->init();
    return $this->handler->del($key);
  }
  private function _setex($key,$value,$time)
  {
    return $this->handler->setex($key,$time,$value);
  }
}