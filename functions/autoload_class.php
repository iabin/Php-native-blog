<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/Blog/config/config.php';
spl_autoload_register(function ($class) {
  if(in_array($class, NORMAL_CLASS))
    return require DIR . "/Blog/class/$class/$class.class.php";
  elseif (strpos($class, 'Message') !== false)
    require DIR . "/Blog/class/Message/$class.class.php";
  else
    require DIR . "/Blog/class/Article/$class.class.php";
});
