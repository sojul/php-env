<?php
namespace CleverAge\Formation\Utils;

use CleverAge\Formation\View\PhpTemplateEngine;

class Mail {

  /**
   * @var PhpTemplateEngine $engine
   */
  protected $engine;

  /**
   * Expeditor.
   *
   * @var array
   */
  protected $from = [];

  /**
   * Recipient(s).
   *
   * @var array
   */
  protected $to = [];

  /**
   * Subject.
   *
   * @var string
   */
  protected $subject;

  /**
   * Body of the message.
   *
   * @var string
   */
  protected $body;

  /**
   * Mail constructor.
   * @param PhpTemplateEngine $engine
   */
  public function __construct(PhpTemplateEngine $engine) {
    $this->engine = $engine;
  }

  /**
   * Set expeditor.
   *
   * @param $from
   */
  public function setFrom($from) {
    $this->from = $from;
  }

  /**
   * Set recipient(s).
   *
   * @param $to
   */
  public function setTo($to) {
    $this->to = $to;
  }

  /**
   * Set subject.
   *
   * @param $subject
   */
  public function setSubject($subject) {
    $this->subject = $subject;
  }

  /**
   * Render body template and send mail.
   *
   * @param $template_name
   * @param $parameters
   */
  public function sendFromTemplate($template_name, $parameters) {
    $this->body = $this->engine->render($template_name, $parameters);

    $this->send();
  }

  /**
   *
   */
  protected function send() {
    // Create the Transport
    $transport = new \Swift_SmtpTransport('smtp.free.fr', 25);

    // Create the Mailer using your created Transport
    $mailer = new \Swift_Mailer($transport);

    // Create a message
    $message = (new \Swift_Message($this->subject))
      ->setFrom($this->from)
      ->setTo($this->to)
      ->setBody($this->body, 'text/html');
    ;

    // Send the message
    $mailer->send($message);
  }
}
