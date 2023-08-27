<?php 

    require_once("./php/config.php");

    if(isset($_SESSION["item_count"])){

    }else{
        $_SESSION["item_count"] = 0;
    }

    if(!empty($_SESSION["id_ses"])){
        header("Location: profile.php");
    }
    else{
    
    if(isset($_POST["login"])){
        $usernameemail = $_POST["usernameemail"];
        $password = $_POST["password"];
        $result = mysqli_query($conn, "SELECT * FROM site_user WHERE User_Name = '$usernameemail' OR Email = '$usernameemail'");
        $row = mysqli_fetch_assoc($result);
        /*
        if(isset($row["password"])){
            $verify = password_verify($password, $row["password"]);
        }
        else{
            $verify = false;
        }
        */

        if(mysqli_num_rows($result) > 0 ){
           if($password == $row["Password"]){
               $_SESSION["login_ses"] = true;
               $_SESSION["id_ses"] = $row["User_ID"];
               header("Location: index.php"); 
           }
           else{
            echo
            "<script>alert('user not registered');</script>";
            }
        }
    }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TokTok Watch</title>
    <!-- <link rel="stylesheet" href="CSS/main.css"> -->
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="icon" href="img/Logo copy.PNG">
    <script src="https://kit.fontawesome.com/8633768cc1.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500&display=swap" rel="stylesheet">
</head>
<body>
    <?php require_once("./php/header.php");?>
    <section class="content">
        <div id="log-text-hold">
            <p>M Y - T O K T O K</p>
        </div>
        <div class="log-content">
            <div class="log-sub">
                <div class="log-sub-inner">
                    <p>I HAVE AN ACCOUNT</p>
                    <form action="" method="post" id="login" class="log-input-group">
                        <label for="">User ID</label>
                        <input type="text" name="usernameemail" class="input-field" placeholder="User Id" required>
                        <label for="">Password</label>
                        <input type="password" name="password" id="pwf" class="input-field" placeholder="Enter Password " required>
                        <label for="" id="log-error">Wrong User ID or Password!</label>
                        <a href="">Forgot Your Password?</a>
                        <div class="log-check"> <input type="checkbox" id="pw-check" class="check-box" onclick="password()"><span>Show Password</span></div>
                        <div class="log-check"><input type="checkbox" class="check-box" onclick="showErr()"><span>Remember Me</span> </div>
                        <button type="submit" name="login">Log in</button>
                    </form>
                </div>
            </div>
            <div style="width: 1px; background-color: black; height: 80%"></div>
            <div class="log-sub">
                <div class="log-sub-inner">
                    <p>I DON'T HAVE AN ACCOUNT</p>
                    <p style="font-size: 20px; padding-top: 30px;">Create an account to purcase products on our website and benefits from our exclusive contents.</p>
                    <a href="signup.php"><button type="submit" id="log-sin-btn">SIGN UP</button></a>
                </div>
                
            </div>
        </div>
        
        
        

    </section>

    <script>
        var pop_links = document.getElementById("pop-links");
        var navText = document.getElementById("nav_text");
        var navIcon = document.getElementById("nav_icon");
        var num = 0;
        var pw = document.getElementById("pwf");
        var cb = document.getElementById("pw-check");
        var err =document.getElementById("log-error");

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

        function password() {
                if (cb.checked == true) {
                    pw.type = "text";
                }
                else {
                    pw.type = "password";
                }
            }

        function showErr() {
            err.style.visibility = "visible";
        }

        function hideErr() {
            err.style.visibility = "hidden";
        }
            

    </script>
    
</body>
</html>