<?php

namespace CleverAge\Formation\Logger;

/**
 * Class DBLogger
 *
 * @author Antoine Cusset <a.cusset@gmail.com>
 * @link https://github.com/acusset
 * @category
 * @license
 */
class DBLogger implements LogInterface {

    public function log($message): void
    {
        // Ouvrir la connexion à la base de données
        echo "Je log : $message dans la base de données" . PHP_EOL;
        // Fermer la connexion
    }

}