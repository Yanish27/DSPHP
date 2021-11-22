<?php

class Autoloader {
static function register()
{
spl_autoload_register(array(__CLASS__, 'autoload'));
}

static function autoload($class)
{
echo 'class' .$class . '/<br>';

$class = str_replace('\\', '/', $class);
echo 'class' . $class .'/<br>';

require 'Model/' . $class . '.php';

}

}