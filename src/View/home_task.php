<?php

session_start();
var_dump($_SESSION);

?>

<?php if(($_SESSION['login'])) : ?>

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
                        <li><a href="#">SignUp</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <a href="../../super-reminder/logout.php"><button type="submit">Déconnexion</button></a> 
    

    <p>Bonjour </p>
    <?php if(isset($_SESSION['login'])){
        echo $_SESSION['login'];
    }
    
    ?>

     <div id="task-form-container">
        <form method="POST" id="task-form">
            <input type="text" id="task" name="task">
            <input type="submit" name="submit-task" value ="+">
        </form>
     </div>
     <div id="task-container">
        <h1>Mes tâches</h1>
     </div>
       
    </body>
    </html>

    <?php else : ?>
        <?php header('Location : ./error.php'); ?>
    <?php endif; ?>