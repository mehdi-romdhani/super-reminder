<?php


require 'vendor/autoload.php'; //Autoloader 7
use App\Model\ConnectDb;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mooli&display=swap" rel="stylesheet">
    <script src="./public/js/menu.js" defer></script>
    <script src="./public/js/script.js" defer></script>
    <script src="./public/js/script_control_form.js" defer></script>
    <script src="./public/js/connexion.js" defer></script>
    <title>Organize Me</title>
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <a href="#"><img src="./public/img/logo-website.png" alt="Logo"></a>
            </div>
            <div class="menu-toggle" id="menu-toggle">&#9776;</div>
            <div class="menu-overlay" id="menu-overlay">
                <div class="menu">
                    <div class="menu-close" id="menu-close">&times;</div>
                    <ul>
                        <li><a href="#">SignIn</a></li>
                        <li><a  href="#">SignUp</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="content">
        <div class="presentation">
            <h1>Bienvenue sur Organize Me</h1>
            <p>La solution parfaite pour gérer vos tâches quotidiennes.</p>
        </div>
        <div class="buttons">
            <a href="#" class="signin-button">Inscription</a>
            <a href="#" id="test" class="signup-button">Connexion</a>
        </div>
        <div class="container-form">

        </div>
    </main>

</body>
</html>




