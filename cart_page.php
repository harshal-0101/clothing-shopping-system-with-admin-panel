<?php
ob_start();
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
             exit;
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
              <!-- <---------------------------- cart section ----------------------->
            <div class="cart-container">
                
                <div class="cart-product-checkout"  id="cart-block">

                    <div class="cart-box">
                        <h4 style="color: white;" class="title">Your Product <i class="fa-solid fa-basket-shopping"></i></h4><br>
                    
                      <?php

                      if (isset($_GET['chackout'])) {
                          if (isset($_SESSION['user_id'])) {
                                 header("location:/CLothing_website/addres.php");
                                 exit;
                          } else {
                              $insertStatus = False ;
                              echo $insertMag = "<h4 class='insertMsg'>Please login now  <a href='loginR.php'>Login</a></h4>";
                            }
                          }
                        
                      

                    //   if($insertStatus == true){
                    //     echo $insertMag ; 
                    //   }
                    //   else{
                    //     echo $insertMag ;
                    //   }

                              $p_sql = "SELECT * FROM `cart` WHERE `sessionID` = '$sessionID'";
                              $product_items = $conn->query($p_sql); 
                              $totalP=0 ;
                        //   if(mysqli_num_rows($product_items) > 0){ 
                            while($row = mysqli_fetch_assoc($product_items)) {
                                   $totalP += $row['total_price'];
                                ?>  

                              <form  class="cart" id="cart-cart" method="get" >
                                
                                  <div class="img-product">
                                      <img src="product_image/<?php echo $row['image'];?>" alt="">
                                  </div>
                                  <div class="product-info">
                                      <h1><?php echo $row['P_name']?></h1>
                                      <div class="price"><p>price: ₹</p><p id="Product-Price" ><?php echo number_format($row['P_price'],2)?></p></div>
                                      
                                  </div>
                                     <div class="cart-item" data-product-id="<?php echo $row['Cart_id'];  ?>">
                                     <input type="hidden" class="price-value" value="<?php echo $row['P_price']?>" class="Price-Val" name="Pprice">
                                         <button type="button" id="minus" class="quantity-btn" data-action="minus">-</button>
                                         <div class="count-qty">
                                             <input id="QTYNUM" type="text" class="quantity-input" value="<?php echo $row['qty']?>" min="1">
                                         </div>
                                         <button type="button" id="plus" class="quantity-btn" data-action="plus">+</button>
                                         <!-- <div class="status"></div> -->
                                     </div>
                                     <button type="submit" class="remove-btn" name="d_cart" value="<?php echo $row['Cart_id']; ?>" ><i class="fa-solid fa-trash"></i></button>
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
                      <form method="get">
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
                                    <td><?php 
                                     $totalOrderPrice = 0 ;
                                    echo $totalOrderPrice = $totalP + 30 + 50 ?></td>
                                    <input type="hidden" value="<?php echo $totalOrderPrice ?> " name="totalOrderPrice">
                                </tr>
                            </table>
        
                           </div>
                           
                            <div class="pay-potion">
                                <Button id="pay-btn" onclick="pay_btn()" name="chackout">Go to chackout</Button>
                             </div>
                        </div>
                        </form>
                        <?php }
                            else{
                                $emtyCart = true;
                            }

                         ?>
                            

                           
                </div> 

  <!-- <----------------------------order section ----------------------->

                <div id="orders-box">
                  <p>Your Orders</p>
                  
                    <div class="order-container">
                        <div class="order">
                            <div class="products-BOX">
                              <div class="Products">
                                <div class="p_img">
                                    <img src="https://media.voguebusiness.com/photos/5ce3d84932029c6ded13e829/2:3/w_2560%2Cc_limit/online-product-may-19-article.jpg" alt="">
                                   </div>
                                   <div class="P_info">
                                    <p>Product Brand <span>QTY:1</span></p>
                                    <p>Product name</p>
                                    <p>Total Price</p>
                                    <button>remove</button>
                                   </div> 
                              </div>
                              <br>
                            </div>
                            <div class="bill">
                             <p>Detail</p>
                             <div class="detail">
                                <h3>Address</h3>
                                <p>123 Maple Street Springfield, IL 62704 
                                    USA</p>
                                 <h3>Phone Number</h3>
                                 <p>0394234510</p> 
                                 <table>
                                    <tr>
                                        <td>Email</td>
                                        <td>Order Date</td>
                                    </tr>
                                    <tr>
                                        <td>Email23@gamil.com</td>
                                        <td>01/02/2023</td>
                                    </tr>
                                 </table>  
                                 <p>Product Detail</p>
                                 <table>
                                    <tr>
                                        <td>Total Price</td>
                                        <td>QTY</td>
                                    </tr>
                                    <tr>
                                        <td>$99</td>
                                        <td>1</td>
                                    </tr>
                                 </table>
                                 <h3>Product ID</h3>  
                                 <p>0987897</p>
                                <div class="Order-btn">
                                    <button>Cancel Order</button>
                                </div>
                             </div>
                            </div>
                        </div>
                    </div>
                 
                 </div>    
                </div>

             <!-- -----------order-section--------------- -->
             <!-- <div class="EmtyCart">
                 <?php
                if($emtyCart  ==  true){
                    echo "<i class='fa-solid fa-basket-shopping'></i><br>
                    <h1>Your cart is emty </h1> <a href='home.php'>Shop Now</a>";
                }
                ?>
             </div>   -->
             

        </main>
        
    </div>
</body>
</html>

<?php ob_end_flush();
 ?>