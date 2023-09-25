<?php


namespace App\Controller; // namespace

use App\Model\User;


/**
 * Undocumented class
 */
class ControllerUser
{

    private $user;

    public function controllerRegister(array $array): void
    {
        $login = htmlspecialchars(trim($array['login-signin']));
        $firstname = htmlspecialchars(trim($array['firstname-signin']));
        $lastname = htmlspecialchars(trim($array['lastname-signin']));
        $pass = htmlspecialchars(trim($array['password-signin']));
    
        $password = password_hash($pass, PASSWORD_DEFAULT);
    
        $mess = [];
    
        $newUser = new User();
    
        $formData = [
            'login-signin' => $login,
            'firstname-signin' => $firstname,
            'lastname-signin' => $lastname,
            'password-signin' => $password
        ];
    
        if (empty($login) || empty($firstname) || empty($lastname) || empty($password)) {
            $mess['mailFail'] = "Required Champs";
        } else {
            $newUser->registerUser($formData); 
            $mess['valid'] = "Successful registration";
        }
        
        echo json_encode($mess);
    }

    public function controllerConnexion(array $array)
    {
        $login = htmlspecialchars(trim($array['login-signup']));
        $pass = htmlspecialchars(trim($array['password-signup']));
        $mess = [];
    
        $newUser = new User();
        $user = $newUser->connect($login);
        $verifUser = $newUser->verifUser($login);
    
        if (empty($login) || empty($pass)) {
            $mess['connectEmpty'] = "Veuillez saisir tous les champs";
        } else {
            if ($verifUser) {
                $mess['checkLogin'] = "Ce login n'existe pas";
            } else if (!$verifUser && password_verify($pass, $user['password'])) {
                $mess['validConnect'] = "Successfull connection";
                session_start();
                $_SESSION['id']= $user['id'];
                $_SESSION['login']= $user['login'];
                $_SESSION['password']= $user['password'];
                // header('Location: ./users');

            }
        }
    
        echo json_encode($mess);
    }
    

    public function disconnect(){
        session_start();
        session_destroy();
        header('Location: home');
    }
}
