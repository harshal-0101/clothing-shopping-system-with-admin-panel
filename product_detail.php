<?php 
ob_start(); // Start output buffering

include "version.php"; 
include "Config.php";  

$sql = "SELECT * FROM `product`";
 $product = $conn->query($sql);




?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="product_d.css?v=<?php echo $version;?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script type="module" src="product_detail.js?v=<?php echo $version;?>"></script>
  <title>Document</title>
</head>
<body>
  <div class="n_bar">
  <?php  include 'navbar.php' ?>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>

  <div class="container">
    <?php 
      if(isset($_GET['id'])){
        $productID = $_GET['id'];
        $query = "SELECT * FROM `product` WHERE `id` = $productID";
        $query_run = mysqli_query($conn, $query);
        while ($items = mysqli_fetch_assoc($query_run)) {
    ?>
    
    <form class="product_details" method="post">
      <div class="product_image">
        <div class="option_img">
          <img src="product_image/<?php echo $items['image1'];?>" alt="">
          <img src="product_image/<?php echo $items['image2']?>" alt="">
          <img src="product_image/<?php echo $items['image3']?>" alt="">
          <img src="product_image/<?php echo $items['image4']?>" alt="">
        </div>
        <div class="main_img">
          <img src="product_image/<?php echo $items['image1']?>" alt="">
          <input type="hidden" value="<?php echo $items['image1'];?>" name="image">
        </div>
      </div>
      <div class="product_text">
        <div class="icons">
          <button id="FavouriteItemBTN" type="button"><i class="fa-regular fa-heart" id="dis-like"></i></button>
          <button id="UNFavouriteItemBTN" type="button" ><i class="fa-solid fa-heart" id="like"></i></button>
          <i class="fa-solid fa-share-nodes"></i>
        </div>
        <h2><?php echo $items['P_Brand'] ?></h2>
        <input type="hidden" value="<?php echo $items['P_Brand'] ?>" name="brand">
        <p><?php echo $items['P_ name'] ?></p>
        <input type="hidden" value="<?php echo $items['P_ name'] ?>" name="pname">
        <div class="prices">
          <p id="Price">₹<?php echo $items['final_price'] ?> <s> ₹<?php echo $items['actual_price'] ?></s>
          <input type="hidden" value="<?php echo $items['final_price'] ?>" name="price">
          <span><?php echo $items['discount'] ?>%</span></p>
          <input type="hidden" value="<?php echo $items['discount'] ?>" name="discount">
        </div>

        <div class="rating">
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-regular fa-star"></i>
          <p>4.0 out of 5 <span>10 Rating</span></p> 
        </div>

        <div class="size">
          <input type="hidden" value="<?php echo $items['P_sixe']?>" name="size">
          <p>Size</p>
          <button>XS</button>
          <button>X</button>
          <button>M</button>
        </div>
        <button type="submit" class="addtocartp" id="buy-btn" data-id="<?php echo $items['id'] ?>"><i class="fa-solid fa-cart-shopping"></i>Buy</button><br>
        <button id="addTOcart" name="submit"><i class="fa-solid fa-bag-shopping"></i>Add to Cart</button>
        <div class="product-detail">
          <button type="button"  class="up-btn" id="product-d-btn" >Product Detail: <i id="down" class="fa-solid fa-chevron-down"></i> <i class="fa-solid fa-chevron-up" id="up"></i> </button>
          <table id="details">
            <tr >
              <td>Pack of</td>
              <td>1</td>
            </tr>
            <tr>
              <td>Brand</td>
              <td>Nike</td>
            </tr>
            <tr>
              <td>Fit</td>
              <td>Regular</td>
            </tr>
            <tr>
              <td>Fabric</td>
              <td>Denim</td>
            </tr>
            <tr>
              <td>Colour</td>
              <td>white</td>
            </tr>
            <tr>
              <td>Other Details</td>
              <td><?php echo $items['P_Description'] ?></td>
            </tr>
            <tr>
              <td>Suitable For</td>
              <td>Western Wear</td>
            </tr>
          </table>
        </div>
      </div>
    </form>
    <?php }
   
    
    ?>
  </div>

<br>
<br>
<br>
<p class="slider-heading">Similar Products</p>
  <div class="slide-product-card">
                <div class="move-icon">
                    <i class="fa-solid fa-arrow-left-long" id="moveSlideL" id="left-btn"></i>
                </div>


                <div class="product-slide">
                  <div class="containt-slider-div"> 
                    <?php
                    while($row = mysqli_fetch_assoc($product)) { ?>
                    <div class="slide-content">
                        <a href="product_detail.php?id=<?php echo $row['id'] ?>&name=<?php echo $row['P_ name'] ?>" target="black" class="slidenow">
                            <div class="product-card-slide">
                                <div class="poduct-img">
                                    <img src="product_image/<?php echo $row['image1']?>"  alt="">
                                </div>
                                <div class="product-info">
                                    <h2>
                                        <?php echo $row['P_Brand']?>
                                    </h2>
                                    <div class="headText">

                                        <h3> 40% off </h3>
                                        <b><?php echo $row['P_ name']?></b></b><br>
                                    </div>
                                    <h3>Price:
                                        <?php echo $row['final_price']?>
                                    </h3>
                                    <p>Size:
                                        <?php echo $row['P_sixe']?>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php }?>
                  </div>  
                </div>
                <div class="move-icon-right">
                    <i class="fa-solid fa-arrow-right-long" id="moveSlideR" class="slide-btn" src="icon/move-arro.jpg"></i>
                </div>
            </div>
   <br><br><br><br><br>
   <footer>
   <?php include "footer.php"?>
   </footer>
</body>
</html>
<?php
  $sessionID = $_SESSION['sessionId'];
  $sqlQ = "SELECT * FROM `cart` WHERE `P_id` = $productID AND `user_id` = '$sessionID';"; 
  $query = mysqli_query($conn, $sqlQ);  

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $pID = $productID;
  $name = $_POST['pname'];
  $brand = $_POST['brand'];
  $price = $_POST['price'];
  $Tprice =  $_POST['price'];
  $discount = $_POST['discount'];
  $image = $_POST['image'];
  $qty = 1;
  if (isset($_POST['submit'])) {

     if(mysqli_num_rows($query) >= 1){
      // header("Location: cart_page.php");
      echo "<h1>Somethink wrong!</h1>";
     }
     else{
       $queryInsert = "INSERT INTO `cart` (`P_id`, `user_id`, `P_brand`, `image`, `P_name`, `P_price`,`total_price`, `discount`, `qty`) VALUES ('$pID', '$sessionID', '$brand', '$image', '$name', '$price ','$Tprice', '$discount', '$qty');";
       $query_insert = mysqli_query($conn, $queryInsert);
   
       if ($query_insert == true) {
         header("Location: cart_page.php");
         exit;
    }
    else{
      echo "<h1>Somethink wrong!</h1>";
    }
  }
  
  }
}
 
}
ob_end_flush(); // Flush output buffer

?>


