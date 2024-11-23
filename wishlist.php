<?php
include 'Config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="module" src="home.js?v=<?php echo $version;?>"></script>

    <title>Document</title>
</head>
<body>

    <?php
      include "navbar.php";
    ?>

<br><br><br><br>
    <div class="conteiner"> 
        <div class="content">

            <div class="product-section">
              <div class="product-carts">
                <?php
                $user_id = $_SESSION['user_id'];
                $get_userID = "SELECT * FROM `wishlist` WHERE `User_ID` = $user_id" ;
                $query_run = mysqli_query($conn,$get_userID);

                $numberOfProduct =  mysqli_num_rows($query_run) ;
                for($i = 0; $i < $numberOfProduct ; $i++){ 
                  $data = mysqli_fetch_assoc($query_run);
                  $product_ID = $data['Product_ID'];
  
                  $getProduct = "SELECT * FROM `product` WHERE  `id` = $product_ID ";
                  $excQuery = mysqli_query($conn,$getProduct);
                  if(mysqli_num_rows($excQuery) > 0){    
                    while($items = mysqli_fetch_assoc($excQuery)) { ?>
                       <form class="form-cart" method="get" >
                            <div class="cart">
                                <div class="product-img" value="<?php echo $items['image1']?>">
                                  <a href="product_detail.php?id=<?php echo $items['id'] ?>&name=<?php echo $items['P_ name'] ?>" target="black">
                                    <img src="product_image/<?php echo $items['image1']?>" alt="">
                                  </a>     
                                    <input class="Pimg" type="hidden" value="<?php echo $items['image1']?>">
                                    <input class="pid" type="hidden" value="<?php echo $items['id']?>">
                                </div>
                                <div class="allinfo">
                                    <div class="product-info-p">
                                        <h2 class="ProductBrand">
                                            <?php echo $items['P_Brand'] ?>
                                            <input class="pBrand" type="hidden" value="<?php echo $items['P_Brand']?>">
                                            <span><i class="fa-solid fa-star"></i>4.5</span>
                                        </h2>
                                        <p class="Productname">
                                            <?php echo $items['P_ name'] ?>
                                            <input class="PName" type="hidden" value="<?php echo $items['P_ name']?>">
                                        </p>
                                        <p class="Price">
                                        <input class="pprice" type="hidden" value="<?php echo $items['final_price']?>" >
                                        <input class="discount" type="hidden" value="<?php echo $items['discount']?>">
                                            ₹<?php echo $items['final_price'] ?>
                                            <span>20%</span>
                                        </p>
                                       
                                        <p class="size">
                                            <?php echo $items['P_sixe'] ?>
                                        </p>

                                        <Button class="Remove" name="Remove" value="<?php echo $items['id']?>"><i class="fa-solid fa-cart-plus"></i>Remove</Button>

                                    </div>
                                        <!-- <div class="p-count">
                                            <button type="button" id="minus" class="Minus">-</button>
                                            <div class="count-qty">
                                                <input id="QTYNUM" class="QtyNUM" type="text" name="qty" value="1">
                                            </div>
                                            <button type="button" id="plus" class="plus">+</button>
                                        </div> -->
                                </div>
                               
                            </div>
                        </form>
                       <?php
                     }
                  }
                  else{
                    echo "<div class='empty'>
                            <h2>YOUR WISHLIST IS EMPTY</h2><br>   <p>Add items that you like to your wishlist. Review them anytime and easily move them to the bag.</p><i class='fa-solid fa-box-open'></i><br>
                            <a href='product.php'>Shopping now</a>
                         </div>";
                  } 
                } 
                    ?>
                    
              </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <?php include "footer.php";
      if(isset($_GET['Remove'])){
        $id  = $_GET['Remove'];
        $deleteQ = "DELETE  FROM `wishlist` WHERE `Wishlist_ID` = $id";
        $exq = mysqli_Query($conn,$deleteQ);
        if($exq){
          header("location:/CLothing_website/wishlist.php");
        exit;
        }
      }
    ?>
</body>
</html>
<style>
    body{
        background-color: rgba(0, 0, 0, 0.885);
        margin: 0;
        padding: 0;
        
    }
    .conteiner{
       
        max-width: 1300px;
        width: 100%;
        margin: auto;
    }
    .content{
        width: 100%;
        display: flex;
    }
   
    .product-section{
      width: 100%;
      display: flex;
      justify-content: center;
      /* background-color: rgba(0, 0, 0, 0.772); */
      border-radius: 20px;
    }
    .product-carts {
        margin-top: 50px;
        max-width: 1380px;
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        /* justify-content: center; */
        /* align-items: center; */
        height: 100vh;
    }
    
    .form-cart {
        display: flex;
        /* justify-content: center; */
    }
    
    .cart {
       margin: 2px;
       max-width: 250px;
       width: 100%;
       height: 410px;
       border: 1px solid rgba(255, 255, 255, 0.363);
       border-radius: 20px;
       transition: 0.5s;
       /* padding: 5px; */
   }
   
   .cart:hover {
       box-shadow: 2px 2px 10px 5px rgb(0, 0, 0);
       transition: 0.5s;
   }
   
   .product-img {
    max-width: 250px;
    width: 100%;
    display: flex;
    margin: auto;
}

.product-img img {
    width: 250px;
    height: 250px;
    /* width: 100%; */
    border-radius: 20px;
    /* position: relative; */
    /* z-index: -1; */
}
   
   .allinfo {
       display: flex;
   }
   
   .product-info-p {
       margin-top: -20px;
       width: 95%;
       color: white;
       padding: 10px;
   }
   
   .product-info-p h2 {
       margin-bottom: -16px;
       justify-content: space-between;
       display: flex;
   }
   
   .product-info-p h2 span {
       font-size: 20px;
   }
   
   .product-info-p p {
       margin-bottom: -16px;
   }
   
   .product-info-p p span {
       color: white;
       background-color: red;
       padding: 1px;
       border-radius: 5px;
   }
   
   .size {
       text-align: center;
       border: 1px solid rgb(108, 108, 108);
       width: 20px;
       border-radius: 5px;
       padding: 1px;
   }

   .cart .Remove {
        display: flex;
        justify-self: center;
       text-align: center;
       border-radius:25px;
       border:0;
       font-size: 20px;
       color: red;
       padding: 10px;
       margin-top: 20px;
       cursor: pointer;
   }
    
    #save {
        display: none;
        max-width: 35px;
        width: 100%;
        max-height: 30px;
        height: 100%;
        border-radius: 50px;
        position: absolute;
        margin-left: -20px;
        border: 1px solid black;
        box-shadow: 1px 1px 10px 1px rgba(0, 0, 0, 0.668);
    }
    
    #unsave {
        max-width: 30px;
        width: 100%;
        max-height: 30px;
        height: 100%;
        border-radius: 50px;
        position: absolute;
        margin-left: -20px;
        border: 1px solid black;
        box-shadow: 1px 1px 10px 1px rgba(0, 0, 0, 0.668);
        background-color: white;
    }
    #apply{
      width: 200px;
      border: 0;
      background-color:rgba(255, 255, 255, 0.451);
      font-size: 20px;
      border-radius: 20px;
      height: 40px;
      color: white;
    }

    .filter-btn{
      display: none;
    }
.accordion-collapse{
  display: none;
}
.empty{
  width: 100%;
  text-align: center;
  
}
.empty h2{
  margin-top:-120px;
  margin-bottom:-20px;
}
.empty i{
  font-size:50px;
}
.empty a{
  background-color:black;
  color:white;
  text-decoration: none;
  border-radius: 10px;
  padding: 5px;
}
    @media only screen and (max-width:790px)
    {
      .content{
        display: flex;
        position: relative;
        z-index: 1;
      }
    
    }

</style>

<script>

var save_btn = document.querySelectorAll('.save');

var unsave_btn = document.querySelectorAll('.unsave');



save_btn.forEach(function(button) {
  button.addEventListener("click", function() {
    save_btn.style.display = 'none';
    unsave_btn.style.display = 'block';

  });
});

unsave_btn.forEach(function(button) {
  button.addEventListener("click", function() {
    
    save_btn.style.display = 'block';
    unsave_btn.style.display = 'none';

  });
});

function toggleWishlistButton(button, action) {
            if (action === 'add') {
                button.textContent = 'Remove from Wishlist';
                button.classList.add('added');
            } else {
                button.textContent = 'Add to Wishlist';
                button.classList.remove('added');
            }
        }



</script>



