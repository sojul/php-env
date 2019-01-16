<?php
namespace CleverAge\Formation\Controller;

use CleverAge\Formation\Utils\Database\DatabaseConnection;
use CleverAge\Formation\Utils\MessageBag;
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
   * @var MessageBag
   */
  protected $message_bag;

  /**
   * ControllerBase constructor.
   *
   * @param DatabaseConnection $db
   * @param PhpTemplateEngine $engine
   */
  public function __construct(DatabaseConnection $db, PhpTemplateEngine $engine, MessageBag $message_bag) {
    $this->db = $db;
    $this->engine = $engine;
    $this->message_bag = $message_bag;
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
