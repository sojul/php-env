<?php
/**
 *
 */

namespace CleverAge\Formation\Utils\Database;

use PDO;


class DatabaseConnection extends PDO
{
    /**
     * @var DatabaseConfiguration
     */
    private $configuration;

    /**
     * @param DatabaseConfiguration $config
     */
    public function __construct(DatabaseConfiguration $config)
    {
        $this->configuration = $config;
        parent::__construct($this->configuration->getDsn(),
            $this->configuration->getUsername(),
            $this->configuration->getPassword(),
            [
              PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );
    }
}
