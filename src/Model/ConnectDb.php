<?php

use PDO;
use PDOException;

class ConnectDb{

    protected ?string $pdo;

    public function __construct(){

        try{
            $host = "localhost";
            $dbname = "super-reminder";
            $username = "root";
            $password = "";  

            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        
            // Set error handling to throw exceptions
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo" connexion reussi";
        }catch (PDOException $e) {
            // Handle the exception/error here
            echo "Connection failed: " . $e->getMessage();
        }


        
    }

    
}