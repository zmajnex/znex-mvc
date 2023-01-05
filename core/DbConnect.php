<?php

namespace Plutonium\Core;
use \PDO;
class DbConnect
{
    // Hold the class instance.
    private static $instance = null;
    private $conn;

    private function __construct()
    {
        $this->conn = $this->connect();
    }

    // The object is created from within the class itself
    // only if the class has no instance.
    public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new DbConnect();
        }

        return self::$instance;
    }

    // Create connection
    private function connect()
    {
        // Read configuration
        $config = $this->readConfig();

        // Connect to the database
        try
        {
            $conn = new PDO("mysql:host={$config['host']};dbname={$config['database']}", $config['username'], $config['password']);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e)
        {
            die("Failed to connect to the database: " . $e->getMessage());
        }

        // Return connection
        return $conn;
    }

    // Read configuration from config.php or .env file
    private function readConfig()
    {
        // Check if config.php exists
        if (file_exists(__DIR__ . '/../config.php'))
        {
            // Read configuration from config.php
            $config = include __DIR__ . '/../config.php';
        }
        return $config;
    }

    // Get the database connection
    public function getConnection()
    {
        return $this->conn;
    }
}
