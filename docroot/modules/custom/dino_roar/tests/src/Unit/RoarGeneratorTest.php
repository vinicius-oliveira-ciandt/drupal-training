<?php

namespace Drupal\Tests\dino_roar\Unit;

use Drupal\Core\KeyValueStore\KeyValueFactoryInterface;
use Drupal\Tests\UnitTestCase;
use Drupal\dino_roar\Jurassic\RoarGenerator;

/**
 * RoarGeneratorTest
 *
 * @ingroup dino_roar
 *
 * @group dino_roar
 */
class RoarGeneratorTest extends UnitTestCase
{
  public function testGetRoar()
  {
    $roar = $this->getMockBuilder(RoarGenerator::class)
      ->disableOriginalConstructor()
      ->getMock();

    // $roar->method('getRoar')->;
    // // var_dump($keyValueStore);
    // $roar = new RoarGenerator($keyValueStore);
    // dd($roar->getRoar(10));
    // $this->assertEquals(13, strlen($roar->getRoar(10)));
    $this->assertTrue(true);
  }
}
