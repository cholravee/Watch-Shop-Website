<?php

    require_once("./php/config.php");



    $get_remember = mysqli_query($conn, "SELECT * FROM site_user WHERE remember = 1 ");
    if(!empty($_SESSION["id"])) {
        $id = $_SESSION["id"];
        $result = mysqli_query($conn, "SELECT * FROM site_user WHERE User_ID = $id");
        $row = mysqli_fetch_assoc($result);
    }

    

    else if(mysqli_num_rows($get_remember)>0){
        
        $use_val = mysqli_fetch_assoc($get_remember);
        $id = $use_val['User_ID'];
        if($id > 0){
            $result = mysqli_query($conn, "SELECT * FROM site_user WHERE User_ID = $id");
            $row = mysqli_fetch_assoc($result);
        }
            
    }



    if(isset($_GET["action"]))
    {
        if($_GET["action"] == "delete")
        {
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
                if($values["item_id"] == $_GET["id"])
                {
                    unset($_SESSION["shopping_cart"][$keys]);
                    $_SESSION["item_count"] -= $values["item_quantity"];
                    echo '<script>alert("Item Removed")</script>';
                    echo '<script>window.location="cart.php"</script>';
                }
            }    
        } 
    }



?>

<!DOCTYPE html>
<html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TokTok Watch</title>
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="CSS/cart.css">
    <link rel="icon" href="img/Logo copy.PNG">
    <script src="https://kit.fontawesome.com/8633768cc1.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500&display=swap" rel="stylesheet">
</head>
<body>
    <section class="nav-main">
        <div class="nav-tab" id="top">
            <div class="nav-div" id="nav-left">
                <div id="menu-holder-left" onclick="showMenu()">
                    <i class="fa-solid fa-bars" id="nav_icon" ></i>
                    <p id="nav_text">MENU</p>
                </div>
            </div>
            <div class="nav-div" id="middle-box">
                <a href=""><img src="img/Logo.PNG" alt=""></a>
            </div>
            <div class="nav-div" id="nav-right">
                <div id="menu-holder-right">
                    <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
                    <p style="display: inline; font-size: 20px; margin-left: 0.1px ;" id="cart_num"><?php echo $_SESSION["item_count"];?></p>
                    <a <?php if(!isset($id)){echo 'href="logintest.php"';} else{echo 'href="user.php"';}?>><i class="fa-regular fa-user" id="nav-user"></i></a>
                    <p style="display: inline; font-size: 10px; margin-left: 5px ;"><?php if(isset($id)){echo $row["User_Name"];}; ?></p>
                </div>
            </div>
        </div>
        <div class="nav-tab" id ="bottom">
            <ul>
                <li><a href="#">HOME</a></li>
                <li><a href="product.php">PRODUCT</a></li>
                <li><a href="#">ABOUT</a></li>
                <li><a href="#">BLOG</a></li>
                <li><a href="#">CONTACT</a></li>
              </ul>
        </div>

        
    </section>

    <section class="container" style="padding: 150px; border: 50px 100px;">
    <div class="cart">
    <?php 
        $total = 0;
        $quantity = 0;
        if(!empty($_SESSION["shopping_cart"]))
        {
            
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
        ?>      
                    <div class="products">
                        <div class="product">
                         <img src="<?php echo $values["item_img"];?>" alt="">
                            <div class="product-info">
                            <h3 class="product-name"><?php echo $values["item_name"];?></h3>
                            <h2 class="product-price"><?php echo $values["item_price"];?></h2>
                            <p class="product-quality">Qnt: <input value="<?php echo $values["item_quantity"];?>" name="">
                            <p class="product-remove">
                                <!-- <img src="https://cdn-icons-png.flaticon.com/512/860/860829.png" style="width: 10px" alt=""> -->
                                <a href="cart.php?action=delete&id=<?php echo $values['item_id']; ?>" class="remove"><img src="https://cdn-icons-png.flaticon.com/512/860/860829.png" style="width: 15px" alt=""></a>
                            </p>   
                        </div>
                </div>
    <?php
           
             $total = $total + ($values["item_quantity"] *$values["item_price"]);
             $quantity = $quantity + $values["item_quantity"];
            }
        }
    
    ?>
        <div class="cart-total">
           <p>
                <span>Total Price</span>
                <span><?php echo number_format($total, 2);?>฿</span>
           </p>
            <p>
                <span>Number of Items</span>
                <span><?php echo $_SESSION["item_count"]; ?></span>
           </p>
           <p>

           </p>
           <a href="checkout.php?total=<?php echo $total;?>">Proceed to checkout</a>
        </div>
    </div>
   </div> 
    </section>
    </main>
   
</body>
</html>