<?php

class Product
{
  protected static $data = [];

  public static function set($key, $value)
  {
    self::$data[$key] = $value;
  }

  public static function get($key)
  {
    return isset(self::$data[$key]) ? self::$data[$key] : null;
  }

  final public static function remove($key)
  {
    if(array_key_exists($key, self::$data)) {
      unset(self::$data[$key]);
    }
  }
}

Product::set('name', 'Kate');
var_dump(Product::get('name'));

Product::remove('name');
var_dump(Product::get('name'));

?>
