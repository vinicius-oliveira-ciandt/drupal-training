<?php

namespace Drupal\dino_roar\Jurassic;

use Drupal\Core\KeyValueStore\KeyValueFactoryInterface;

/**
 *
 */
class RoarGenerator {

  private $keyValue;

  /**
   *
   */
  public function __construct(KeyValueFactoryInterface $keyValue) {
    $this->keyValue = $keyValue;
  }

  /**
   * @return string
   */
  public function getRoar($length) {
    $key = 'roar_' . $length;
    $store = $this->keyValue->get('dino');
    if ($store->has($key)) {
      return $store->get($key);
    }
    $string = 'R' . str_repeat('O', $length) . 'AR';
    $store->set($key, $string);

    return $string;
  }

}
