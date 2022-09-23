<?php

namespace Model;

use mysqli;

class DatabaseConnect
{
    private static $instance = null;
    private $mysqli;

    private function __construct()
    {
        $this->mysqli = new mysqli("localhost", "root", "root", "Task13");
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new DatabaseConnect();
        }
        return self::$instance;
    }

    public function getMysqliConnection()
    {
        return $this->mysqli;
    }
}