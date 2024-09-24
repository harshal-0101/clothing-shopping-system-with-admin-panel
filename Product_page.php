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
      $sql = "SELECT * FROM `product`";
      $product = $conn->query($sql); 
      
     
      if($_SERVER["REQUEST_METHOD"] == "GET");
         {
           
             if(isset($_SESSION['user_id'])){
               if(isset($_GET['addtocart'])){ 
                  $user_id = $_SESSION['user_id'];
                  $image = $_GET['Pimage'];
                  $P_id = $_GET['Pid'];
                  $brand = $_GET['brand'];
                  $name = $_GET['Pname'];
                         $priceP = $_GET['Pprice'];$qtyP = $_GET['qty'];
                  $price =  $priceP * $qtyP ;
                  $qty = $_GET['qty'];
                  
                  
                  $insert = "INSERT INTO `cart` ( `P_id`, `user_id`, `P_image`, `P_brand`, `P_name`, `P_price`, `P_qty`) VALUES ( ' $P_id', '$user_id', '$image', '$brand', '$name', '$price', '$qty');";
            
                  $result = mysqli_query($conn,$insert);
               }
             }
            
         }
     
    ?>
<br><br><br><br>
    <div class="conteiner"> 
        <div class="content">
            <div class="filter" id="filter-bar">
                <div class="filter-heading">
                  <img onclick="back_go()" src="https://cdn2.iconfinder.com/data/icons/navigation-set-arrows-part-two/32/Arrow_Left-512.png" alt="">
                    <h4>Filter <span><i class="fa-solid fa-arrow-up-short-wide"></i></span></h4>
                </div>

                <div class="filter-products">
                    <div class="accordion" id="accordionExample" bg="">
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="cat-btn" type="button" data-bs-toggle="collapse" data-bs-target="#cat_body" aria-expanded="true" aria-controls="collapseOne">
                                CATEGORIES
                            </button>
                          </h2>
                          <div id="cat_body" class="accordion-collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              <table>
                                <tr>
                                    <td>Shirt</td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td>T-shirt</td>
                                    <td><input type="checkbox" name="" id=""></td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="cat-btn " type="button" ata-bs-toggle="collapse" data-bs-target="#PRICE">
                                PRICE
                            </button>
                          </h2>
                          <div id="PRICE" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              <table>
                                <tr>
                                    <td>
                                        <select name="min" id="">
                                            <option value="min">Min</option>
                                            <option value="200">200</option>
                                            <option value="200">400</option>
                                            <option value="200">800</option>
                                            <option value="200">1200</option>
                                            <option value="200">1500</option>
                                            <option value="200">2000</option>
                                            
                                        </select>
                                    </td>
                                      <td><h5>To</h5></td>
                                    <td>
                                        <select name="min" id="">
                                            <option value="min">Max</option>
                                            <option value="200">200</option>
                                            <option value="200">400</option>
                                            <option value="200">800</option>
                                            <option value="200">1200</option>
                                            <option value="200">1500</option>
                                            <option value="200">2000</option>
                                            
                                        </select>
                                    </td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" >
                            <button class="cat-btn " type="button" data-bs-toggle="collapse" data-bs-target="#Offers" aria-expanded="false" aria-controls="cat_body">
                               Offers
                            </button>
                          </h2>
                          <div id="Offers" class="accordion-collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              <table> 
                                <tr>
                                  <td>No Cost EMI</td>
                                  <td><input type="checkbox"></td>
                                </tr>
                                <tr>
                                  <td>Special Price</td>
                                  <td><input type="checkbox"></td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>

                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="cat-btn " type="button" data-bs-target="#SIZE" >
                              SIZE
                            </button>
                          </h2>
                          <div id="SIZE" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                              <table>
                                <tr>
                                  <td>X</td>
                                  <td><input type="checkbox"></td>
                                  <td>M</td>
                                  <td><input type="checkbox"></td>
                                </tr>
                                
                                <tr>
                                  <td>S</td>
                                  <td><input type="checkbox"></td>
                                  <td>XL</td>
                                  <td><input type="checkbox"></td>
                                </tr>
                              
                                <tr>
                                  <td>XS</td>
                                  <td><input type="checkbox"></td>
                                  <td>L</td>
                                  <td><input type="checkbox"></td>
                                </tr>
                               
                                <tr>
                                  <td>SL</td>
                                  <td><input type="checkbox"></td>
                                  <td>X</td>
                                  <td><input type="checkbox"></td>
                                </tr>
                               
                              </table>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="cat-btn " type="button" data-bs-toggle="collapse" data-bs-target="#PATTERN" aria-expanded="false" aria-controls="flush-collapseTwo">
                              PATTERN
                            </button>
                          </h2>
                          <div id="PATTERN" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                              <table>
                                <tr>
                                  <td>Abstract</td>
                                  <td><input type="checkbox" name="" id=""></td>
                                  <td>Animal</td>
                                  <td><input type="checkbox" name="" id=""></td>
                                <tr>
                                  <td>Print</td>
                                  <td><input type="checkbox" name="" id=""></td>
                                  <td>Cartoon</td>
                                  <td><input type="checkbox" name="" id=""></td>
                                </tr>
                                 
                                <tr>
                                  <td>Checkered</td>
                                  <td><input type="checkbox" name="" id=""></td>
                                  <td>Superhero</td>
                                  <td><input type="checkbox" name="" id=""></td>
                                </tr>
                                <tr>
                                  <td>Chevron</td>
                                  <td><input type="checkbox" name="" id=""></td>
                                  <td>Abstract</td>
                                  <td><input type="checkbox" name="" id=""></td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                        <br>
                        
                       <center><Button id="apply">Apply</Button></center>
                      </div>
                </div>
 
            </div>

     

            <div class="product-section">
              <div class="product-carts">
                <div class="filter-btn">
                  <img onclick="filter_btn()" src="https://w7.pngwing.com/pngs/403/20/png-transparent-computer-icons-filter-miscellaneous-angle-rectangle.png" alt="">
                </div>
                <br>
                <?php
                    $query = " SELECT * FROM `product`";
                    $query_run = mysqli_query($conn,$query);
                       
                    while($items = mysqli_fetch_assoc($query_run)) { ?>
                       <div class="form-cart" >
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

                                    </div>
                                        <!-- <div class="p-count">
                                            <button type="button" id="minus" class="Minus">-</button>
                                            <div class="count-qty">
                                                <input id="QTYNUM" class="QtyNUM" type="text" name="qty" value="1">
                                            </div>
                                            <button type="button" id="plus" class="plus">+</button>
                                        </div> -->
                                </div>
                                <!--<Button class="addtocartp" data-id="<?php// echo $items['id'] ?>"><i class="fa-solid fa-cart-plus"></i>ADD Cart</Button>-->
                            </div>
                        </div>
                       <?php
                     }
                    ?>
                    
              </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <?php include "footer.php"?>
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
    .filter{
       background-color: rgba(0, 0, 0, 0.903);
        max-width: 350px;
        width: 100%;
    }
    .filter-heading{
        width: 100%;
        color: white;
        height: 50px;
        align-content: center;
    }
    .filter-heading img{
      display: none;
    }
    .filter-heading h4{
        margin-left: 20px;
    }
    .filter-product{
        color: white;
        background-color: rgba(0, 0, 0, 0.305);
    }
  
    .accordion-item{
        background-color: rgba(0, 0, 0, 0.74);
        color: white;
    }
    table{
        width: 50%;
        text-align: center;
    }
    table tr td select{
        background: transparent;
        padding: 5px;
        color: white;
        margin: 5px;
        border-radius: 10px;
    }
    table tr td select option{
        color:black;
    }
    .product-section{
      width: 100%;
      display: flex;
      justify-content: center;
      background-color: rgba(0, 0, 0, 0.772);
      border-radius: 20px;
    }
    .product-carts {
        margin-top: 50px;
        max-width: 1380px;
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
    
    .form-cart {
        display: flex;
        justify-content: center;
        flex-grow: 0.5;
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

   .cart .addtocartp {
       text-align: center;
       width: 100%;
       border-radius: 10px;
       background-color: #000000;
       border: 1px solid rgba(255, 255, 255, 0.386);
       font-size: 20px;
       color: rgba(255, 255, 255, 0.715);
       bottom: 0;
       padding: 10px;
       margin-top: 20px;
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
.cat-btn{
  width: 100%;
  height:40px;
  font-size:15px;
  cursor: pointer;
  background-color:black;
  border: 1px solid rgba(255, 255, 255, 0.363);
  color:white;
} 
    @media only screen and (max-width:790px)
    {
      .content{
        display: flex;
        position: relative;
        z-index: 1;
      }
      .filter{
      position: absolute;
      z-index: 2;
      display: none;
      }
      .filter-btn{
        width: 100%;
        display: block;
      }
      .filter-btn img{
        max-width:30px;
        width: 100%;
        border-radius: 15px;
      }
      .product-carts{
        margin: 10px;
       
      }
      .filter-heading{
        display: flex;
      }
      .filter-heading img{
        display: block;
        max-width:30px;
        width: 100%;
        border-radius: 15px;
        background-color: white;
      }
    }

/* .accordion-collapse{
  display:none;
}     */

</style>

<script>

var save_btn = document.querySelectorAll('.save');

var unsave_btn = document.querySelectorAll('.unsave');

// function save(){
//   document.getElementById('save').style.display = 'none';
//   document.getElementById('unsave').style.display = 'block';
// }
// function unsave(){
//   document.getElementById('save').style.display = 'block';
//   document.getElementById('unsave').style.display = 'none';
// }

function filter_btn(){
  document.getElementById('filter-bar').style.display = 'block';
}
function back_go(){
  document.getElementById('filter-bar').style.display = 'none';
}

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

  // const cat_btn = document.querySelectorAll('.cat-btn');
  // cat_btn.forEach(cat_button => {
  //     cat_button.addEventListener('click', () => {
  //       const parent = cat_button.parentElement;
  //       console.log(parent);
  //       // var catBody = document.querySelector('#cat_body');
  //       // catBody.style.display = 'block' ;
  //     });
  // });

   //jQuery code\

   document.addEventListener('DOMContentLoaded', function () {
    var buttons = document.querySelectorAll('.cat-btn');
    
    buttons.forEach(function(button) {
        button.addEventListener('click', function() {
            var targetId = this.getAttribute('data-bs-target');
            var targetElement = document.querySelector(targetId);

            if( targetElement.style.display === 'none'){
              targetElement.style.display='Block';
            }
            else{
              targetElement.style.display='none';
            }

        });
    });
});



</script>



