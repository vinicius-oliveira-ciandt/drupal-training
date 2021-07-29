<?php

namespace Drupal\sandwich\Plugin;

use Drupal\Component\Plugin\PluginInspectionInterface;

/**
 * Defines an interface for Sandwich plugin plugins.
 */
interface SandwichPluginInterface extends PluginInspectionInterface {

  /**
   * Gets the plugin_id of the plugin instance.
   *
   * @return string
   *   A string description of the Sandwich
   */
  public function getDescription();

  /**
   * Gets the definition of the plugin implementation.
   *
   * @return float
   *   The number of calories per serving.
   */
  public function getCalories();

  /**
   * Place an order for a sandwich.
   *
   * @param array $extras
   *
   * @return string
   */
  public function order(array $extras);

}
