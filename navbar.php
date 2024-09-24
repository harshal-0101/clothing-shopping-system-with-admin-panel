<?php 
include 'Config.php';
include "version.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/49b342d9f7.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="navbar.css?v=<?php echo $version ?>">
    <title>Document</title>
</head>

<body>

    <?php
    session_start();  
    
    $sessionID = session_id();
    $_SESSION['sessionId'] = $sessionID;  
    
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    }
         
         if(!isset($user_id)){
             // header('location:/Clothing_website/login_system/loginR.php');
             $user_name = " Dear";
         }
         else{
         $select = mysqli_query($conn,"SELECT * FROM `user_info_table` WHERE ID = '$user_id'") or die('query failed');
         
         if(mysqli_num_rows($select) > 0)
         {
           $fetch = mysqli_fetch_assoc($select);
         }
         }
    ?>

        <div class="header">
            <div class="navbar">
                <div class="logo">
                    <a href="home.php"><img src="/ClOTHING_WEBSITE/icon/logo-clothino.png" alt=""></a>
                </div>
                <div class="search">
                   <form id=search-form action="product_search.php" method="get"> 
                      <input type="search" placeholder="search of product" name="keyword" value="<?php if(isset($_GET['keyword'])); ?>" >
                      <button type="button" id="search-icon"><i id="search-now" class="fa-solid fa-magnifying-glass"></i></button>
                   </form>
                </div>
                <div class="option-page" id="menu">
                    <div class="user-intro">
                        <div class="user-hello">
                            <i class="fa-solid fa-user"></i>
                            <h3>Hello!
                                <?php 
                        // echo $fetch['Fname'];
                                 if(isset($fetch['Fname'])){
                                     echo $fetch['Fname'];
                                 }
                                 else{
                                     echo  $user_name;
                                 }
                               ?>
                            </h3>
                        </div>
                    </div>
                        <ul>
                            <li><a href="home.php"><i class="fa-solid fa-house-chimney"></i> HOME</a></li><br>
                            <li><a href="about_page.html"><i class="fa-solid fa-circle-info"></i> ABOUT</a></li><br>
                            <li><a href="cart_page.php"><i class="fa-solid fa-dolly"></i> ORDER</a></li><br>
                            <li><a href="Product_page.php"><i class="fa-solid fa-shirt"></i> PRODUCTS</a></li><br>
                            <li><a href="wishlist.php"><i class="fa-solid fa-bookmark"></i> My wishlist</a></li><br>
                            <?php if(isset($user_id)){
                              echo '<li><a href="/CLothing_website/profile.php"> <i class="fa-solid fa-user"></i> PROFILE</a></li>
                                  <li id="logout"><form method="post">  <i class="fa-solid fa-arrow-right-from-bracket"></i> <button type="submit" id="logout-btn" name="logout">Logout</button></form></li> '; 
                            }                       
                            else{
                             echo "<li><a href='/CLothing_website/loginR.php'><i class='fa-solid fa-arrow-right-to-bracket'></i> LOGIN NOW</a></li><br>";
                            }
                            ?>
                        </ul>
                    <?php
                
                if(isset($_POST["logout"])){
                    session_destroy();
                    header("location:/CLothing_website/home.php");
                }
               
                ?>

                </div>

                <ul class="login">
                    <?php
                 if(isset($user_id)){
                   echo "<li><a href='/CLothing_website/profile.php'>Profile</a></li>";
                 }
                
                else{
                    echo "<li><a href='/CLothing_website/Register_page.php'>Register<br> & Login <i class='fa-solid fa-arrow-right-to-bracket'></i></a></li>";
                }
                ?>
                        <!-- <li><a href="/Clothing_website/login_system/Register_page.php">register & login</a></li> -->
                </ul>

               <?php $p_sql = "SELECT * FROM `cart` WHERE `user_id` = '$sessionID'";
                $product_items = $conn->query($p_sql); ?>
                <div class="cart-pro">
                    <ul>
                        <li>
                            <a href="cart_page.php"><i class="fa-solid fa-bag-shopping"></i> <span id=bgitems><?php echo mysqli_num_rows($product_items) ?></span></a>
                        </li>
                    </ul>   
                </div>
                <div class="togel">
                    <i id="option-btn-bar" class="fa-solid fa-bars"></i>
                </div>

            </div>
            
        </div>
        <div class="search-bar">
                <input type="search"  placeholder="search of product" >
        </div>
</body>

<script>
    //jQuery code\

    $(document).ready(function() {
        $("#option-btn-bar").click(function() {
            $(".option-page").slideToggle("slow");
        });
    });

    $(document).ready(function() {
        $("#search-now").click(function() {
            $(".search-bar").slideToggle("slow");
            
        });
    });
</script>

</html>
