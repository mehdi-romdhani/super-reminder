<?php

require '../../vendor/autoload.php'; //Autoloader 

use App\Controller\ControllerUser;

$insertUser = new ControllerUser();

if (isset($_GET['register'])) { // Vérifiez si le formulaire a été soumis
    $insertUser->controllerRegister($_POST); // Appelez la méthode controllerRegister()
    die();
}

?>



<form method="POST" id="form-signin">

    <button type="button" class="close-button">X</button>
    
    <label for="login">Login</label>
    <input type="text" id="login" name="login-signin" ><br><br>

    <label for="firstname">Nom</label>
    <input type="text" id="firstname" name="firstname-signin" ><br><br>

    <label for="lastname">Prenom</label>
    <input type="text" id="lastname" name="lastname-signin" ><br><br>

    <label for="password">Mot de Passe</label>
    <input type="password" id="password" name="password-signin" ><br><br>

    <input type="submit" value="S'inscrire"><br>
     <p id="mess_error"></p>
</form>