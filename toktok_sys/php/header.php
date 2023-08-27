<?php
    require_once('./php/config.php');
    if(isset($_SESSION["shopping_cart"])){
        $count = count($_SESSION["shopping_cart"]);
    }
    else{
        $count = 0;
    }
?>
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
                    <a href="cart.php"><?php echo $count;?><i class="fa-solid fa-cart-shopping"></i></a>
                    <a href="login.php"><i class="fa-regular fa-user" id="nav-user"></i></a>
                </div>
            </div>
        </div>
        <div class="nav-tab" id ="bottom">
            <ul>
                <li><a href="index.php"  >HOME</a></li>
                <li><a href="product.php">PRODUCT</a></li>
                <li><a href="about.php"  >ABOUT</a></li>
                <li><a href="blog.php"   >BLOG</a></li>
                <li><a href="contact.php">CONTACT</a></li>
              </ul>
        </div>

        
    </section>
    <div class="pop-links" id="pop-links">
        <ul>
          <li><a href="index.php"   >HOME</a></li>
          <li><a href="product.php" >PRODUCT</a></li>
          <li><a href="about.php"   >ABOUT</a></li>
          <li><a href="blog.php"    >BLOG</a></li>
          <li><a href="contact.php" >CONTACT</a></li>
        </ul>
      </div>