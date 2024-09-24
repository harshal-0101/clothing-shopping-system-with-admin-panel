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
                <img src="icon/Desktop - 11.png" alt="">
                <!-- <video src="icon/Y2meta.app-3d product animation_ Garments-(1080p).mp4" autoplay loop type="video/mp4" muted></video> -->
            </div>

        </div>
        <main>
            <div class="mian-page">
                <div class="product-card">
                    <h1>Up to 60% off | Styles for women</h1>
                    <table>
                        <tr>
                            <td>
                                <a href="#"><img src="https://images-eu.ssl-images-amazon.com/images/G/31/img22/Fashion/Gateway/BAU/BTF-Refresh/May/PC_WF/WF1-186-116._SY116_CB636048992_.jpg" alt="">
                                    <p>Women's Clothing</p>
                                </a>
                            </td>
                            <td>
                                <a href="#"><img src="https://images-eu.ssl-images-amazon.com/images/G/31/img22/Fashion/Gateway/BAU/BTF-Refresh/May/PC_WF/WF2-186-116._SY116_CB636048992_.jpg" alt="">
                                    <p>Footwear+Handbags</p>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#"><img src="https://images-eu.ssl-images-amazon.com/images/G/31/img22/Fashion/Gateway/BAU/BTF-Refresh/May/PC_WF/WF4-186-116._SY116_CB636048992_.jpg" alt="">
                                    <p>Watches</p>
                                </a>
                            </td>
                            <td>
                                <a href="#"><img src="https://images-eu.ssl-images-amazon.com/images/G/31/img22/Fashion/Gateway/BAU/BTF-Refresh/May/PC_WF/WF3-186-116._SY116_CB636048992_.jpg" scr="google.com" alt="">
                                    <p>Fashion jewellery</p>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="product-card">
                    <h1>Up to 60% off | Styles for men</h1>
                    <table>
                        <tr>
                            <td>
                                <a href="#"><img src="https://images-eu.ssl-images-amazon.com/images/G/31/img22/Fashion/Gateway/BAU/BTF-Refresh/May/PF_MF/MF-1-186-116._SY116_CB636110853_.jpg" alt="">
                                    <p>Clothing</p>
                                </a>
                            </td>
                            <td>
                                <a href="#"><img src="https://images-eu.ssl-images-amazon.com/images/G/31/img22/Fashion/Gateway/BAU/BTF-Refresh/May/PF_MF/MF-2-186-116._SY116_CB636110853_.jpg" alt="">
                                    <p>footwear</p>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#"><img src="https://images-eu.ssl-images-amazon.com/images/G/31/img22/Fashion/Gateway/BAU/BTF-Refresh/May/PC-PFF/PFF-1-186-116._SY116_CB636055991_.jpg" alt="">
                                    <p>for family </p>
                                </a>
                            </td>
                            <td>
                                <a href="#"><img src="https://images-eu.ssl-images-amazon.com/images/G/31/img22/Fashion/Gateway/BAU/BTF-Refresh/May/PC-PFF/PFF-4-186-116._SY116_CB636055991_.jpg" alt="">
                                    <p>View all</p>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="product-card">
                    <h1>Shop deals in Fashion</h1>
                    <table>
                        <tr>
                            <td>
                                <a href="#"><img src="https://images-na.ssl-images-amazon.com/images/G/01/AMAZON_FASHION/2022/SITE_FLIPS/SPR_22/GW/DQC/DQC_APR_TBYB_W_BOTTOMS_1x._SY116_CB624172947_.jpg" alt="">
                                    <p>jeans under $50</p>
                                </a>
                            </td>
                            <td>
                                <a href="#"><img src="https://images-na.ssl-images-amazon.com/images/G/01/AMAZON_FASHION/2022/SITE_FLIPS/SPR_22/GW/DQC/DQC_APR_TBYB_W_TOPS_1x._SY116_CB623353881_.jpg" alt="">
                                    <p>Tops under $25</p>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#"><img src="https://images-eu.ssl-images-amazon.com/images/G/31/img23/PB/March/Bikram/QC_PC_186x116_7_PB._SY116_CB560732407_.jpg" alt="">
                                    <p>Starting ₹99 | Toys & games</p>
                                </a>
                            </td>
                            <td>
                                <a href="#"><img src="https://images-eu.ssl-images-amazon.com/images/G/31/img23/PB/March/Bikram/QC_PC_186x116_4_Chirstmass_3._SY116_CB560739045_.jpg" alt="">
                                    <p>Up to 60% off |jackets,dresses & more</p>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="product-card">
                    <h1>Shop deals in Fashion</h1>
                    <table>
                        <tr>
                            <td>
                                <a href="#"><img src="https://images-eu.ssl-images-amazon.com/images/G/31/IMG15/Irfan/GATEWAY/MSO/Appliances-QC-PC-186x116--B08RDL6H79._SY116_CB667322346_.jpg" alt="">
                                    <p>Air conditioners</p>
                                </a>
                            </td>
                            <td>
                                <a href="#"><img src="https://images-eu.ssl-images-amazon.com/images/G/31/IMG15/Irfan/GATEWAY/MSO/Appliances-QC-PC-186x116--B08345R1ZW._SY116_CB667322346_.jpg" alt="">
                                    <p>Refrigerators</p>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="https://www.amazon.in/"><img src="https://images-eu.ssl-images-amazon.com/images/G/31/IMG15/Irfan/GATEWAY/MSO/Appliances-QC-PC-186x116--B07G5J5FYP._SY116_CB667322346_.jpg" alt="">
                                    <p>Microwaves</p>
                                </a>
                            </td>
                            <td>
                                <a href=""><img src="https://images-eu.ssl-images-amazon.com/images/G/31/IMG15/Irfan/GATEWAY/MSO/186x116---wm._SY116_CB667322346_.jpg" alt="">
                                    <p>Whaching machines</p>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

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