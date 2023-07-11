<?php

/**
 * Conectica class.
 * PHP Version 7.4.
 *
 * @see       https://github.com/mei0nuttzz/conectica/ The PHP GitHub project
 *
 * @author    Mihaila Ionut
 */

namespace Conectica\Conectica;

use mysqli;

class Conn
{
    private $host;
    private $username;
    private $password;
    private $database;
    private $port = 3306;
    private $connection;

    public function __construct($host, $username, $password, $database, $port = 3306)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->port = $port;
        $this->open();
    }

    private function open()
    {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database, $this->port);

        if ($this->connection->connect_error) {
            throw new \Exception('Failed to connect to MySQL: ' . $this->connection->connect_error);
        }
    }

    public function close()
    {
        $this->connection->close();
    }

    public function query($query)
    {
        return $this->connection->query($query);
    }

    public function insertId()
    {
        return $this->connection->insert_id;
    }

    public function prepare($query)
    {
        return $this->connection->prepare($query);
    }

    public function escape($string)
    {
        return $this->connection->real_escape_string($string);
    }
}