<?php
    require_once('./php/config.php');
    unset($_SESSION["shopping_cart"]);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TokTok Watch</title>
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="icon" href="">
    <script src="https://kit.fontawesome.com/8633768cc1.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500&display=swap" rel="stylesheet">
</head>
<body>
    <?php require_once("./php/header.php");?>
    <script>
        var pop_links = document.getElementById("pop-links");
        var navText = document.getElementById("nav_text");
        var navIcon = document.getElementById("nav_icon");
        var num = 0;

        function showMenu() {
            if (num == 0){
                pop_links.style.left = "0";
                navText.innerHTML = "CLOSE";
                navIcon.className = "fa-solid fa-xmark";
                num = 1;
            }
            else {
                pop_links.style.left = "-220px";
                navText.innerHTML = "MENU";
                navIcon.className = "fa-solid fa-bars";
                num = 0;
            }
            
        }

    </script>
    
</body>
</html>