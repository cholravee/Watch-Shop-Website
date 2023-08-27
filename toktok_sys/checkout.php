<?php 
  require_once("./php/config.php");

  $token =  md5(uniqid(mt_rand()));

  if(isset($_SESSION["shopping_cart"])){
    if(!empty($_SESSION["shopping_cart"]))
    {
        
    }else{
      header("Location: cart.php");
    }
  }

  if(isset($_POST['checkout'])){

    if(!empty($_SESSION["shopping_cart"]))
    {
          $uid= $_SESSION["id_ses"];
          $yourdate = date('Y-m-d');


        foreach($_SESSION["shopping_cart"] as $keys => $values)
          { 
            $pid = $values['item_id'];
            $quanti = $values['item_quantity'];
            $gettotal = $_GET["total"];
            $query = "INSERT INTO `cart` VALUES('','$pid','$uid','$quanti','$token')";
            mysqli_query($conn,$query);
          }
        
        $order = "INSERT INTO `shop_order` VALUES('','$uid','$yourdate','1','1','1',' $gettotal','2','$token')";
        mysqli_query($conn,$order);
        echo '<script>alert("Complete Transaction")</script>';
        unset($_SESSION["shopping_cart"]);
        unset($_SESSION["item_count"]);
    }else{
      echo '<script>alert("cart_empty")</script>';
      header("Location: product.php");
    }
  }

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TokTok Watch</title>
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="icon" href="">
    <script src="https://kit.fontawesome.com/8633768cc1.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>
<?php require_once("./php/header.php"); ?>
<section class="container" style="padding: 150px 10px;">
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="" method="post">
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="name" placeholder="John M. Doe">
            <label for="email"><i class="fa fa-envelope"></i> PhoneNumber</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
            <label for="city"><i class="fa fa-institution"></i> District</label>
            <input type="text" id="city" name="district" placeholder="New York">
            <label for="city"><i class="fa fa-institution"></i> Subdistrict</label>
            <input type="text" id="city" name="subdistrict" placeholder="New York">

            <div class="row">
              <div class="col-50">
                <label for="state">Provice</label>
                <input type="text" id="state" name="state" placeholder="NY">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <!-- <input type="submit" value="Continue to checkout" class="btn"> -->
    </div>
  </div>


  <div class="col-25">
    <div class="container">
  <?php

      $total = $_GET["total"] ;
      $quantity = 0;
      echo "<h4>Cart <span class='price' style='color:black'><i class='fa fa-shopping-cart'></i><b></b></span></h4>";
  
      if(!empty($_SESSION["shopping_cart"])){

        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
  ?>
          <p><?php echo $values["item_name"]?><p class="product-quality">Qnt: <input value="<?php echo $values["item_quantity"]?>" name=""></a> <span class="price"><?php echo $values["item_price"];?>฿</span></p><br>

  <?php     
          
          $total = $total + ($values["item_quantity"]*$values["item_price"]);
        }

      }
  
  ?>
      <hr>
      <p>Total <span class="price" style="color:black"><b><?php echo $total;?>฿</b></span></p>
      <input type="submit" value="Continue to checkout" class="btn" name="checkout">
    </div>
  </div>
  </form>
</div>

</section>
</body>
</html>