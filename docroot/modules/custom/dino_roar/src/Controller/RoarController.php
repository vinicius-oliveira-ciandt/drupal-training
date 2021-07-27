<?php

namespace Drupal\dino_roar\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\dino_roar\Jurassic\RoarGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 *
 */
class RoarController extends ControllerBase {

  /**
   * @var \Drupal\dino_roar\Jurassic\RoarGenerator
   */
  private $roarGenerator;

  /**
   * @var \Drupal\Core\Logger\LoggerChannelFactoryInterface
   */
  protected $loggerFactory;

  /**
   *
   */
  public function __construct(RoarGenerator $roarGenerator, LoggerChannelFactoryInterface $loggerFactory) {
    $this->roarGenerator = $roarGenerator;
    $this->loggerFactory = $loggerFactory;
  }

  /**
   * @var \Symfony\Component\DependencyInjection\ContainerInterface $container
   */
  public static function create(ContainerInterface $container) {
    $roarGenerator = $container->get('dino_roar.roar_generator');
    $loggerFactory = $container->get('logger.factory');

    return new static($roarGenerator, $loggerFactory);
  }

  /**
   * @return \Symfony\Component\HttpFoundation\Response
   */
  public function roar() {
    return new Response('Rooooar!');
  }

  /**
   * @return \Symfony\Component\HttpFoundation\Response
   */
  public function roarCount($count) {
    $roar = $this->roarGenerator->getRoar($count);

    $keyValueStore = $this->keyValue('dino');
    $keyValueStore->set('roar_string', $roar);

    $roar = $keyValueStore->get('roar_string');

    $this->loggerFactory->get('default')->debug($roar);
    return new Response($roar);
  }

}
