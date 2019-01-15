<?php
namespace CleverAge\Formation\Logger;

use CleverAge\Formation\Utils\Database\DatabaseConnection;

class DbLogger implements LogInterface {

  /**
   * @var DatabaseConnection $db
   */
  private $db;

  public function __construct(DatabaseConnection $db) {
    $this->db = $db;
  }

  public function log($message): void {
    $statement = $this->db->prepare('INSERT INTO logs (message, timestamp) VALUES (:message, :timestamp)');
    $statement->execute([
      'message' => $message,
      'timestamp' => time(),
    ]);
  }

}
