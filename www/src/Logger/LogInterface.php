<?php

namespace CleverAge\Formation\Logger;

/**
 * Interface LogInterface
 * @package CleverAge\Formation\Interfaces
 */
interface LogInterface
{
    /**
     * @param $message
     */
    public function log($message): void;
}