<?php

namespace CleverAge\Formation\Utils\Database;

class DatabaseConfiguration
{
    /**
     * @var string
     */
    private $host;

    /**
     * @var int
     */
    private $port;

    /**
     * @var string
     */
    private $databaseName;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    public function __construct(string $host, int $port, string $databaseName, string $username, string $password)
    {
        $this->host = $host;
        $this->port = $port;
        $this->databaseName = $databaseName;
        $this->username = $username;
        $this->password = $password;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getPort(): int
    {
        return $this->port;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getDatabaseName(): string
    {
        return $this->databaseName;
    }

    /**
     * @param string $databaseName
     */
    public function setDatabaseName(string $databaseName): void
    {
        $this->databaseName = $databaseName;
    }

    public function getHostAndPort(): string
    {
        return "{$this->host}:{$this->port}";
    }

    public function __toString()
    {
        return '<strong>Host : </strong>' . $this->host . '<br>' .
            '<strong>Port : </strong>' . $this->port . '<br>' .
            '<strong>Database : </strong>' . $this->databaseName . '<br>' .
            '<strong>Username : </strong>' . $this->username . '<br>' .
            '<strong>Password : </strong>' . $this->password . '<br>';
    }

    public function getDsn()
    {
        return sprintf('mysql:host=%s;dbname=%s', $this->getHostAndPort(), $this->databaseName);
    }

}