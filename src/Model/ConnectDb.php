<?php

namespace App\Model;
use PDo;
use PDOException;

class ConnectDb
{
    //First Variable 

    protected $pdo;

        public function __construct()
    {
        try {
            $host = "localhost";
            $dbname = "super-reminder";
            $username = "root";
            $password = "";
        
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        
            // Set error handling to throw exceptions
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            // Perform database operations here
            
        } catch (PDOException $e) {
            // Handle the exception/error here
            echo "Connection failed: " . $e->getMessage();
        }
        
    }
}
