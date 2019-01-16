<?php
namespace CleverAge\Formation\Controller;

use CleverAge\Formation\Utils\Database\DatabaseConnection;
use CleverAge\Formation\View\PhpTemplateEngine;

/**
 * Base Controller.
 *
 * @package CleverAge\Formation\Controller
 */
abstract class ControllerBase {

  /**
   * @var DatabaseConnection
   */
  protected $db;

  /**
   * @var PhpTemplateEngine
   */
  protected $engine;

  /**
   * ControllerBase constructor.
   *
   * @param DatabaseConnection $db
   * @param PhpTemplateEngine $engine
   */
  public function __construct(DatabaseConnection $db, PhpTemplateEngine $engine) {
    $this->db = $db;
    $this->engine = $engine;
  }

  /**
   * Redirect to URI.
   *
   * @param string $uri
   */
  protected function redirectTo(string $uri) {
    header('Location: ' . $uri);
    exit();
  }
}
