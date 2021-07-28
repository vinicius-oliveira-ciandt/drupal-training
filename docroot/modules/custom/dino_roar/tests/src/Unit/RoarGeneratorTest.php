<?php

namespace Drupal\Tests\dino_roar\Unit;

use Drupal\Core\KeyValueStore\KeyValueFactoryInterface;
use Drupal\Core\KeyValueStore\KeyValueStoreInterface;
use Drupal\Tests\UnitTestCase;
use Drupal\dino_roar\Jurassic\RoarGenerator;

/**
 * RoarGeneratorTest.
 *
 * @ingroup dino_roar
 *
 * @group dino_roar
 */
class RoarGeneratorTest extends UnitTestCase {

  /**
   *
   */
  public function testGetRoarWithoutCache() {
    $prophecy = $this->prophesize(KeyValueFactoryInterface::class);
    $prophecyDatabaseStorage = $this->prophesize(KeyValueStoreInterface::class);
    $prophecy->get('dino')->willReturn($prophecyDatabaseStorage->reveal());
    $prophecyDatabaseStorage->has('roar_10')->willReturn(FALSE);
    $prophecyDatabaseStorage->set('roar_10', 'ROOOOOOOOOOAR')->willReturn(NULL);

    $roar = new RoarGenerator($prophecy->reveal());
    $this->assertSame(13, strlen($roar->getRoar(10)));
  }

  /**
   *
   */
  public function testGetRoarWithCache() {
    $prophecy = $this->prophesize(KeyValueFactoryInterface::class);
    $prophecyDatabaseStorage = $this->prophesize(KeyValueStoreInterface::class);
    $prophecy->get('dino')->willReturn($prophecyDatabaseStorage->reveal());
    $prophecyDatabaseStorage->has('roar_10')->willReturn(TRUE);
    $prophecyDatabaseStorage->get('roar_10')->willReturn('ROOOOOOOOOOAR');

    $roar = new RoarGenerator($prophecy->reveal());
    $this->assertSame(13, strlen($roar->getRoar(10)));
  }

}
