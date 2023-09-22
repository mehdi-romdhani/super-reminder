<?php

namespace App\Controller;
use App\Model\User;

class UserController
{

    public function __construct(){
        // empty
    }

    public function controllerSignin(array $array): void
    {
        //all variable
        $login = htmlspecialchars(trim($array['login-signin']));
        $firstname = htmlspecialchars(trim($array['firstname-signin']));
        $lastname = htmlspecialchars(trim($array['lastname-signin']));
        $pass = htmlspecialchars(trim($array['password-signin']));
        
        $password = password_hash($pass, PASSWORD_DEFAULT);

        $mess = [];

        $newUser = new User();

        //all logic

        if(empty($login) && empty($firstname) && empty($lastname) && empty($pass)){
            $mess['champsEmpty'] = "Veuillez saisir tous les champs";
        }else if(!empty($login) && !empty($firstname) && !empty($lastname) && !empty($pass)){
            $newUser->registerUser($array['login-signin'], $array['firstname-signin'],$array['lastname-signin'],$array['password-signin']);
            $mess['success'] = "Inscription réussie";
        }

        echo json_encode($mess);

    }


    public function controllerConnect(){

        
    }
   

}