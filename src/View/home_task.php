

<?php if (($_SESSION['login'])) : ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- //CSS -->
        <link rel="stylesheet" href="./public/css/home.css">
        <link rel="stylesheet" href="./public/css/task.css">
        <!-- //FONT GOOGLE -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Mooli&display=swap" rel="stylesheet">
        <!-- //JS -->
        <script src="./public/js/menu.js" defer></script>
        <script src="./public/js/script.js" defer></script>
        <script src="./public/js/script_control_form.js" defer></script>
        <script src="./public/js/task.js" defer></script>

        <title>Organize Me</title>
    </head>

    <body>

        <header class="sidebar">
            <nav>
                <div class="logo">
                    <a href="#"><img src="./public/img/logo-website.png" alt="Logo"></a>
                </div>
                <div class="menu-toggle" id="menu-toggle">&#9776;</div>
                <a href="../../super-reminder/logout.php" class="logout-logo">-></a>
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


        <div class="container-user-task">

            <h2><?php if (isset($_SESSION['login'])) {
                    echo $_SESSION['login'];
                } ?> </h2> &nbsp;
        </div>

        <div id="task-form-container">
            <form method="POST" id="task-form">
                <input type="text" id="task" name="task">
                <input type="submit" id="submit-task" name="submit-task" value="+">
                <span id="messTask"></span>
            </form>
        </div>


        <div id="task-container">
            <div id="task-in-progress">
                <h3 class="task-title">Tâches en cours</h3>
            </div>
            <div id="task-completed">
                <h3 class="task-title">Tâches terminées</h3>

            </div>
        </div>
    </body>

    </html>

<?php else : ?>
    <?php header('Location : ./error.php'); ?>
<?php endif; ?>