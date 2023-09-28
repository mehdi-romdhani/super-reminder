<?php
require '../../vendor/autoload.php';

use App\Controller\ControllerUser;

$connectUser = new ControllerUser();

// var_dump($_POST);

if(isset($_GET['login'])){
    $connectUser->controllerConnexion($_POST);
    die();
}

?>


<form  id= "formConnect" method="POST">

    <button type="button" class="close-button">X</button>
    
    <label for="login">Login</label>
    <input type="text" id="login" name="login-signup" ><br><br>

    <label for="password">Mot de Passe</label>
    <input type="password" id="password" name="password-signup" ><br><br>

    <input type="submit" value="Connexion">
    <p id="messConnect"></p>


</form>