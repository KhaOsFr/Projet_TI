<?php
session_start();
require './src/php/utils/liste_includes.php';
?>
<!doctype html>
<html lang="fr">
<head>
    <title>Events sportifs 2024</title>
    <meta charset="utf-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/style2.css" type="text/css">
    <link rel="stylesheet" href="./public/css/custom.css" type="text/css">
    <script src="public/js/fonctions.js"></script>
</head>
<body>
<div class="container">
    <header id="header">
    </header>

    <nav id="menu">
        <?php
        if (file_exists('./src/php/utils/menu_admin.php')) {
            include './src/php/utils/menu_admin.php';
        }
        ?>
        <br>
        <a href="index_.php?page=disconnect.php" class="btn btn-danger">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                 class="bi bi-door-closed-fill" viewBox="0 0 16 16">
                <path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
            </svg>
            Log out ADMIN
        </a>
    </nav>
    <br>
    <div id="contenu">
        <?php
        if (!isset($_SESSION['page'])) {
            $_SESSION['page'] = './pages/accueil_admin.php';
        }
        if (isset($_GET['page'])) {
            $_SESSION['page'] = 'pages/' . $_GET['page'];
        }
        if (file_exists($_SESSION['page'])) {
            include $_SESSION['page'];
        } else {
            include './pages/page404.php';
        }
        ?>
    </div>
    <footer id="footer">&nbsp;</footer>
</div>
</body>
</html>