<?php
/**
 *
 */

namespace CleverAge\Formation\Model;

abstract class Entity
{

  /**
   * Entity constructor.
   * @param array $data
   */
  public function __construct($data = []) {
    foreach ($data as $name => $value) {
      $method = 'set' . $this->underscoreToCamelCase($name, true);
      if (method_exists($this, $method)) {
        $this->$method($value);
      }
    }
  }

  protected function underscoreToCamelCase($string, $capitalizeFirstCharacter = false) {
    $str = str_replace('_', '', ucwords($string, '_'));
    if (!$capitalizeFirstCharacter) {
      $str = lcfirst($str);
    }

    return $str;
  }
}
