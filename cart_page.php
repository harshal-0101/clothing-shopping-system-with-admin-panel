<?php
include 'Config.php';
include "version.php"; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart_page.css?v=<?php echo $version;?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="module" src="cart_page.js?v=<?php echo $version;?>"></script>
    <title>Document</title>
</head>

<body>

<?php include "navbar.php"; ?>
 

      <?php 
        if(isset($_GET['d_cart']))
           {
             $id = $_GET['d_cart'];
             $deleteQ = " DELETE FROM `cart` WHERE `Cart_id` = $id;";
             mysqli_Query($conn,$deleteQ);
             header("location:/CLothing_website/cart_page.php");
           }    
       ?> 
        
    <div class="loader">
        <span>CLOTHCART</span>
        <span>CLOTHCART</span>
    </div>

    <?php  ?>
 <br>
 <br>
 <br><br><br>
   <div class="container-all">
        <header>
            <div class="container">
                <div class="intro">
                    <h3>Happy Shoping</h3>
                </div>
                <div class="option" id="option">
                    <button id="cart">carts <i class="fa-solid fa-cart-shopping"></i></button>
                    <button id="order">MyOrders <i class="fa-solid fa-boxes-stacked"></i></button>
                    <button id="Dilevry">Dilevry <i class="fa-solid fa-people-carry-box"></i></button>
                </div>
                <div class="resposive-option">
                    <img src="https://static.vecteezy.com/system/resources/thumbnails/034/849/999/small_2x/menu-button-icon-list-icon-option-symbol-check-list-icon-vector.jpg" alt="">
                </div>
            </div>
        </header>
        <main>
            <div class="cart-container">
                
                <div class="cart-product-checkout"  id="cart-block">

                    <div class="cart-box">
                        <h4 style="color: white;" class="title">Your Product <i class="fa-solid fa-basket-shopping"></i></h4><br>
                      <?php

                              $p_sql = "SELECT * FROM `cart` WHERE `user_id` = '$sessionID'";
                              $product_items = $conn->query($p_sql); 
                              $totalP=0 ;
                        //   if(mysqli_num_rows($product_items) > 0){ 
                            while($row = mysqli_fetch_assoc($product_items)) {
                                   $totalP += $row['total_price'];
                                ?>  

                              <form  class="cart" id="cart-cart">
                                  <div class="img-product">
                                      <img src="product_image/<?php echo $row['image']?>" alt="">
                                  </div>
                                  <div class="product-info">
                                      <h1><?php echo $row['P_name']?></h1>
                                      <div class="price"><p>price: ₹</p><p id="Product-Price" ><?php echo number_format($row['P_price'],2)?></p></div>
                                      
                                  </div>
                                     <div class="cart-item" data-product-id="<?php echo $row['Cart_id'];  ?>">
                                     <input type="hidden" class="price-value" value="<?php echo $row['P_price']?>" class="Price-Val">
                                         <button type="button" id="minus" class="quantity-btn" data-action="minus">-</button>
                                         <div class="count-qty">
                                             <input id="QTYNUM" type="text" class="quantity-input" value="<?php echo $row['qty']?>" min="1">
                                         </div>
                                         <button type="button" id="plus" class="quantity-btn" data-action="plus">+</button>
                                         <!-- <div class="status"></div> -->
                                     </div>
                                     <button type="submit" class="remove-btn" value="<?php echo $row['Cart_id'] ?>" name="d_cart"><i class="fa-solid fa-trash"></i></button>
                                     <div class="status">
                                        
                                     </div>
                             </form> 
                              <br>
                              <?php } 
                            //   else{
                            //     echo "<h2>Yout Cart is Empty</h2>";
                            //   }
                             
                               ?>
                                    
                    </div >
                      <?php 
                       $emtyCart = False;
                      if(mysqli_num_rows($product_items) > 0){  ?>
                        <div class="ckeckout-product">
                           <h4>Checkout</h4>
                           <div class="c-out">
                            <table>
                                <tr>
                                    <td>Total Product:</td>
                                    <td><?php echo mysqli_num_rows($product_items) ?></td>
                                </tr>
                                <tr>
                                    <td>Total Price</td>
                                    <td  class="total-price-value">₹<span id="total-price"><?php echo number_format($totalP ,2);?></span></td>
                                </tr>
                                <tr>
                                    <td>GST</td>
                                    <td>₹50</td>
                                </tr>
                                <tr>
                                    <td>Dilevry fees</td>
                                    <td>₹30</td>
                                </tr>
                            </table>
                            
                            <p>Apply Coppen code</p>
                            <input class="code" type="text" placeholder="code"><button id="Apply">Apply</button>
                            <hr>
                            <table>
                                <tr>
                                    <td>Total :</td>
                                    <td><?php echo $totalP + 30 + 50 ?></td>
                                </tr>
                            </table>
        
                           </div>
                           
                            <div class="pay-potion">
                              <label for="">Select Payment Option</label><br>
                              
                              <table>
                                <tr>
                                    <td><label for="UPI">UPI</label> <input class="input"  id="UPI" value="UPI" type="radio" name="pay-option" checked></td>
                                    <td><label for="cart">cart</label> <input class="input" id="cart" value="cart" type="radio" name="pay-option"></td>
                                    <td><label for="Other">Other</label> <input  id="Other" class="input"  value="Other" type="radio" name="pay-option" ></td>
                                </tr>
                               </table>
                                <br>
                                <Button id="pay-btn" onclick="pay_btn()">Pay</Button>
                             </div>
                        </div>
                        <?php }
                            else{
                                $emtyCart = true;
                            }
                             ?>
                </div> 
                <div id="orders-box">
                  <p>Your Orders</p>
                  <div class="order-container">
                    
                  </div>
                </div>    
                </div>

             <!-- -----------order-section--------------- -->
             <div class="EmtyCart">
                <?php
                if($emtyCart  ==  true){
                    echo "<i class='fa-solid fa-basket-shopping'></i><br>
                    <h1>Your cart is emty </h1> <a href='home.php'>Shop Now</a>";
                }
                ?>
             </div>  
             

        </main>
        
    </div>
</body>
</html>

