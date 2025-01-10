<?php 
 include "Config.php";
 include "version.php";

?>

<!DOCTYPE html>
<html lang="en">
<div id="loadEvent">
 <?php include "loding.php"?>
</div>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/49b342d9f7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="home.css?v=<?php echo $version;?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="module" src="home.js?v=<?php echo $version;?>"></script>

    <title>Clothcart</title>
</head>

<body>
    <?php  include 'navbar.php';
    ?>
        <div class="home">


            <!-- slider-hader -->
            <div class="header-content">
                <!-- <img src="icon/Desktop - 11.png" alt=""> -->
             <video src="icon/clothvideo.mp4" autoplay loop type="video/mp4" muted></video> 
            </div>

        </div>
        <main>
            <div class="mian-page">
                <div class="product-card">
                    <h1>Up to 60% off || Cloth collection</h1>
                    <table>
                        <tr>
                            <td>
                                <a href="#"><img src="icon/image1.jpg" alt="">
                                    <p>Women's Clothing</p>
                                </a>
                            </td>
                            <td>
                                <a href="#"><img src="icon/image2.jpg" alt="">
                                    <p>Pant</p>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#"><img src="icon/image3.jpg" alt="">
                                    <p>Soot for men</p>
                                </a>
                            </td>
                            <td>
                                <a href="#"><img src="icon/image4.jpg" scr="google.com" alt="">
                                    <p>Coth collection</p>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="product-card">
                    <h1>Up to 50% off || Cloth collection</h1>
                    <table>
                        <tr>
                            <td>
                                <a href="#"><img src="icon/image5.jpg" alt="">
                                    <p>Clothing</p>
                                </a>
                            </td>
                            <td>
                                <a href="#"><img src="icon/image6.jpg" alt="">
                                    <p>Traditional Cloth</p>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#"><img src="icon/image7.jpg" alt="">
                                    <p>for family </p>
                                </a>
                            </td>
                            <td>
                                <a href="#"><img src="icon/image8.jpg" alt="">
                                    <p>View all</p>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="product-card">
                    <h1>Top deals in Fashion</h1>
                    <table>
                        <tr>
                            <td>
                                <a href="#"><img src="icon/image9.jpg" alt="">
                                    <p>shirt under ₹50</p>
                                </a>
                            </td>
                            <td>
                                <a href="#"><img src="icon/image10.jpg" alt="">
                                    <p>Hoodies </p>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#"><img src="icon/image11.jpg" alt="">
                                    <p>Starting ₹99 | for Kids</p>
                                </a>
                            </td>
                            <td>
                                <a href="#"><img src="icon/image12.jpg" alt="">
                                    <p>star just ₹199 </p>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="product-card">
                    <h1>Top collection of clothes</h1>
                    <table>
                        <tr>
                            <td>
                                <a href="#"><img src="icon/image13.jpg" alt="">
                                    <p>Home collection</p>
                                </a>
                            </td>
                            <td>
                                <a href="#"><img src="icon/image14.jpg" alt="">
                                    <p>Latest fashion</p>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#"><img src="icon/image15.jpg" alt="">
                                    <p>for kids get %20 off </p>
                                </a>
                            </td>
                            <td>
                                <a href=""><img src="icon/image16.jpg" alt="">
                                    <p>deal in just ₹99</p>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- <div class="slider-container">
            <div class="slider">
             <div class="slides">
               <img src="https://tse1.mm.bing.net/th?id=OIP.utr3KThBybQ22f0qTjvR0gHaEK&pid=Api&P=0&h=180" alt="Image 1">
               <img src="https://tse3.mm.bing.net/th?id=OIP.lmc22lDcOsl5RSTakx8K3gHaE8&pid=Api&P=0&h=180" alt="Image 2">
               <img src="https://tse1.mm.bing.net/th?id=OIP.fezgjHSQzccEaxD5nYsszAHaDt&pid=Api&P=0&h=180" alt="Image 3">
               <img src="image4.jpg" alt="https://tse2.mm.bing.net/th?id=OIP.sjHKKfq85oENeHGcLQW2FwHaE8&pid=Api&P=0&h=180">
               <img src="https://tse1.mm.bing.net/th?id=OIP.fezgjHSQzccEaxD5nYsszAHaDt&pid=Api&P=0&h=180" alt="Image 5">
             </div>
            </div>
            </div> -->

            <div class="categiry-container">
                <h2>Category</h2>
                <div class="categiry">
                    <a href="#">
                        <div class="man-clothing">
                            <img src="https://m.media-amazon.com/images/G/31/img21/MA2024/SS24flip/Halos/withoutshadow/tshirt._SS300_QL85_FMpng_.png" alt="">
                            <p>Clearence Sale</p>
                        </div>
                    </a>

                    <a href="#">
                        <div class="woman-clothing">

                            <img src="https://m.media-amazon.com/images/G/31/img23/WA/december/p0-halo/without/Sarees._SS400_QL85_FMpng_.png" alt="">
                            <p>Sarees</p>
                        </div>
                    </a>

                    <a href="#">
                        <div class="Kids-fashion">

                            <img src="https://m.media-amazon.com/images/G/31/img24/Fashion/AF/Flip/Springsummerflip/Halo/main/V1/kids._SS300_QL85_FMpng_.pngg" alt="">
                            <p>Kids' Fashion
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <br>
            <div class="slide-product-card">
                <div class="move-icon">
                    <i class="fa-solid fa-arrow-left-long" id="moveSlideL" id="left-btn"></i>
                </div>


                <div class="product-slide">
                  <div class="containt-slider-div"> 
                    <?php
                    $query = " SELECT * FROM `product`";
                    $product = mysqli_query($conn,$query);

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
            <div class="offer-zone">
                <div class="offer-pro">
                    <div class="offer-product">
                        <img src="" alt="">
                    </div>
                </div>
            </div>
            <br>

            <br>
            <div class="product-section">
                <h2 class="outp">Our Product</h2>
                <div class="product-carts">
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
                                            <span class="discount">20%</span>
                                        </p>
                                       
                                        <p class="size"> Size:
                                            <?php echo $items['P_sixe'] ?>
                                            <span>
                                                <i class="fa-regular fa-heart" id="unlike-btn"></i>
                                                <i class="fa-solid fa-heart" id="like-btn"></i>
                                            </span>
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
                                <!-- <Button class="addtocartp" data-id="<?php //echo $items['id'] ?>"><i class="fa-solid fa-cart-plus"></i>ADD Cart</Button> -->
                            </div>
                        </div>
                    
                        <?php
                     }  mysqli_close($conn)
                    ?>

                </div>
            </div>

        </main>
        <br>
    <?php include "footer.php"?>
</body>

</html>

<script>

</script>