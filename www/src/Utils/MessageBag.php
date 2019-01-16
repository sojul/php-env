<?php
namespace CleverAge\Formation\Utils;

class MessageBag {

  /**
   * @param $message
   */
  public function addMessage($message) {
    $messages = $this->getMessages();
    $messages[] = $message;

    $_SESSION['messages'] = $messages;
  }

  /**
   * @param bool $flush
   * @return array
   */
  public function getMessages($flush = FALSE) {
    $messages = $_SESSION['messages'] ?? [];

    if ($flush) {
      // Delete messages.
      unset($_SESSION['messages']);
    }

    return $messages;
  }

}
