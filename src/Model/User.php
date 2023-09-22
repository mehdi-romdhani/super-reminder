<?php

namespace App\Model;

class User extends ConnectDb
{
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
        // Implémentez votre logique d'enregistrement ici en utilisant les getters pour accéder aux propriétés.
        
        $req = "INSERT INTO users (login, firstname, lastname, password ) VALUES (:login-signin, :firstname-signin, :lastname-signin; :password-signin)";
        $stmt = $this->pdo->prepare($req);
        $stmt->bindParam(':login-singnin', $array['login-signin']);
        $stmt->bindParam(':firstname-singnin', $array['firstname-signin']);
        $stmt->bindParam(':lastname-singnin', $array['lastname-signin']);
        $stmt->bindParam(':password-singnin', $array['password-signin']);
        $stmt->execute();
        
    }
}
