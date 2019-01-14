<?php

namespace CleverAge\Formation\Exception;

use Exception;
use DateTime;

/**
 * Class FistNameException
 *
 * @author Antoine Cusset <a.cusset@gmail.com>
 * @link https://github.com/acusset
 * @category
 * @license
 */
class FistNameException extends Exception {

    protected $date;

    public function __construct(string $message = "")
    {
        $this->date = new DateTime();
        parent::__construct("Fist name problem", 0);
    }

    /**
     * @return DateTime
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

}