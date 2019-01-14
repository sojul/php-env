<?php

namespace CleverAge\Formation\Logger;

/**
 * Class FileLogger
 *
 * @author Antoine Cusset <a.cusset@gmail.com>
 * @link https://github.com/acusset
 * @category
 * @license
 */
class FileLogger implements LogInterface
{
    public function log($message) : void {
        // Ouvrir le fichier de log
        // Ecrire le message
        echo "Je log : $message dans le fichier de log" . PHP_EOL;
        // Fermer le fichier
    }
}
