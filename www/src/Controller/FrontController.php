<?php
namespace CleverAge\Formation\Controller;

use CleverAge\Formation\Utils\Database\DatabaseConnection;
use CleverAge\Formation\View\PhpTemplateEngine;
use CleverAge\Formation\Utils\MessageBag;

class FrontController {

  /**
   * @var string
   */
  protected $action;

  /**
   * @var string
   */
  protected $controller;

  /**
   * @var DatabaseConnection $db
   */
  protected $db;

  /**
   * @var PhpTemplateEngine $engine
   */
  protected $engine;


  /**
   * @var MessageBag $message_bag
   */
  protected $message_bag;

  /**
   * App constructor.
   *
   * @param DatabaseConnection $db
   * @param PhpTemplateEngine $engine
   * @param MessageBag $message_bag
   */
  public function __construct(DatabaseConnection $db, PhpTemplateEngine $engine, MessageBag $message_bag) {
    $this->db = $db;
    $this->engine = $engine;
    $this->message_bag = $message_bag;
  }

  /**
   * Checks that current URI match a controller/action.
   */
  public function checkUri() {
    // Get Path as requested by the client
    // @see .htaccess
    $path = $_GET['_path'];

    // Remove _patch from query string after use. There is no need to let other
    // functions / methods see that it exists.
    unset($_GET['_path']);

    // Ensure that we have controller & action names in the URL.
    // For an URL like http://localhost:4444/trainee/list
    //  - 'trainee' will be the controller
    //  - 'list' will be the action
    $path_parts = explode('/', $path);
    if (count($path_parts) !== 2) {
      die("No controller/action found for the requested URL");
    }

    list($controller, $action) = $path_parts;

    // Generate a full namespace based on the controller name.
    $controller_class = sprintf('\\CleverAge\\Formation\\Controller\\%sController', ucfirst($controller));

    // Ensure that the class exists
    if (!class_exists($controller_class)) {
      die("There is no controller $controller_class");
    }

    // Instantiate controller and inject needed objects in constructor.
    // @see ControllerBase for needed arguments.
    // @see bootstrap.php for elements instantiation.
    $this->controller = new $controller_class($this->db, $this->engine, $this->message_bag);

    if (!method_exists($this->controller, $action)) {
      die("There is no action $action in the controller $controller_class");
    }

    // Store action method name to use later with self::run().
    $this->action = $action;
  }

  /**
   *
   */
  public function run() {
    $action = $this->action;

    // Use return from the Controller action as content in the page layout.
    $content = $this->controller->$action();

    // Get all messages from message bag and flush it.
    $messages = $this->message_bag->getMessages(true);

    $message_rendered = $this->engine->render('messages.html.php', [
      'messages' => $messages,
    ]);

    echo $this->engine->render('page.html.php', [
      'content' => $content,
      'messages' => $message_rendered,
    ]);
  }
}
