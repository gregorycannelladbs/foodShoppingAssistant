<?php

class Dbh {

    private static $server;
    private static $user;
    private static $pass;
    private static $db;

    protected static function connect() {
        self::$server = "localhost";
        self::$user = "root";
        self::$pass = "root";
        self::$db = "food_shopping";

        $conn = new mysqli(self::$server, self::$user, self::$pass, self::$db); 
        //$conn->set_charset('utf8mb4');
        return $conn;
    }
    
}