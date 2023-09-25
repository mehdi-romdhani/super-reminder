<?php

namespace App\Model;

class User extends ConnectDb
{

    protected ?string $table = "users";

    public ?int $id;
    public ?string $login;
    public ?string $firstname;
    public ?string $lastname;
    public ?string $password;



    function __construct()
    {
        parent::__construct();
    }

    public function setId(?int $id)
    {
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setLogin(?string $login)
    {
        $this->login = $login;
    }
    public function getLogin(): ?string
    {
        return $this->login;
    }

    // Setter pour $firstname
    public function setFirstname(?string $firstname)
    {
        $this->firstname = $firstname;
    }

    // Getter pour $firstname
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    // Setter pour $lastname
    public function setLastname(?string $lastname)
    {
        $this->lastname = $lastname;
    }

    // Getter pour $lastname
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    // Setter pour $password
    public function setPassword(?string $password)
    {
        $this->password = $password;
    }

    // Getter pour $password
    public function getPassword(): ?string
    {
        return $this->password;
    }
    public function registerUser(array $array)
    {
        $req = "INSERT INTO $this->table(login,firstname,lastname,password) VALUES(:logins,:firstnames,:lastnames,:passwords)";
        // echo "Requête SQL : $req"; // Affichez la requête SQL pour le débogage

        $stmt = $this->pdo->prepare($req);
        $stmt->bindParam(':logins', $array['login-signin']);
        $stmt->bindParam(':firstnames', $array['firstname-signin']);
        $stmt->bindParam(':lastnames', $array['lastname-signin']);
        $stmt->bindParam(':passwords', $array['password-signin']);
        $stmt->execute();

        // echo "Paramètres : ";
        // print_r($array); // Affichez les valeurs des paramètres pour le débogage

    }

    public function verifUser(string $login)
    {
        $req = "SELECT login FROM $this->table WHERE login = :login ";
        $stmt = $this->pdo->prepare($req);
        $stmt->bindParam(':login', $login);
        $stmt->execute();
        $result = $stmt->fetchAll($this->pdo::FETCH_ASSOC);
        if (count($result) == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function connect(string $login)
    {

        $req = "SELECT * FROM $this->table WHERE login = :login";
        $stmt = $this->pdo->prepare($req);
        $stmt->bindParam(':login', $login);
        $stmt->execute();
        $result = $stmt->fetch($this->pdo::FETCH_ASSOC);
        // var_dump($result);
        return $result;
       
    }

  
}
