<?php
namespace CleverAge\Formation\View;

class PhpTemplateEngine
{
  private $templateDir;

  public function __construct($templateDir)
  {
    $this->templateDir = $templateDir;
  }

  public function render($template, array $parameters = [])
  {
    extract($parameters);

    ob_start();
    include $this->templateDir . DIRECTORY_SEPARATOR . $template;

    return ob_get_clean();
  }
}
