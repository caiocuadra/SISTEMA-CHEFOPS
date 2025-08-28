<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/98dda1f054.js" crossorigin="anonymous"></script>
    <title>Auxiliar Gestor Hamburgueria</title>
    <link rel="stylesheet" href="Styles/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mozilla+Headline:wght@200..700&display=swap" rel="stylesheet">
</head>

<body>


    <header>
        
        <span class="fonteTituloHeader"><?php echo SISTEMA; ?></span>
    </header>
    <div class="wrapper">
        <?php
        
        if (isset($_SESSION['loginCHEFOPS'])) {
            if ($_SESSION['loginCHEFOPS'] == true) {
                $url = isset($_GET['url']) ? $_GET['url'] : "Home";
                if (file_exists("View/" . $url . ".php")) {
                    include "View/" . $url . ".php";
                }elseif(file_exists("Painel/" . $url . ".php")){
                    include "View/Home.php";
                }else{
                    include "View/404.php";
                }
            }
        } else {
                $url = isset($_GET['url']) ? $_GET['url'] : "Login";
            if (file_exists("View/" . $url . ".php")) {
                include "View/" . $url . ".php";
            }
        }

        ?>
    </div>

    <script src="Scripts/jquery.js"></script>
    <script src="Scripts/script.js"></script>
    <script src="Scripts/focus.js"></script>

</body>

</html>