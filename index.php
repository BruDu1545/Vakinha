<?php
session_start();
include 'config/conn.php';
$url = isset($_GET['url']) ? explode('/', trim($_GET['url'], '/')) : [];
$logged = isset($_SESSION['id']) ? ($_SESSION['id']) : false;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="iccon" href="">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Vaquinha - BETA v0.1</title>
</head>

<body>
    <?php
    if ($logged) {
        include "components/header.php";
    }
    ?>
    <main> 
        <?php
        $page = $url[0] ?? "register";

        if ($page === "login" && !$logged) {
            include "pages/login.php";
        } else if ($page === "register" && !$logged) {
            include "pages/register.php";
        } else if ($page === "home" && $logged) {
            include "pages/home.php";
        } else {
            include "pages/inWork.php";
        }
        ?>
    </main>
    <?php
    if ($logged) {
        include "components/footer.php";
    }
    ?>
    <script src="./assets/js/script.js"></script>
</body>

</html>