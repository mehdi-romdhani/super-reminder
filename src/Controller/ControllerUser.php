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

    public function verifUserExist(array $array){

        
    }
}
