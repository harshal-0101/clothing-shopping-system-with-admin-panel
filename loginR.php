<?php
include "Config.php";
// include "version.php";

$Result = true ;
if(isset($_POST["submit"]))
{
    $email  = $_POST["email"];
    $pass  = $_POST["pass"];

 $sql = "SELECT * FROM `user_info_table` where email = '$email' AND create_password = '$pass'";

    $select = mysqli_query($conn,$sql) or die("ERROR");
  
    

    if(mysqli_num_rows($select) > 0)
    {
        $info = mysqli_fetch_assoc($select);
        if(isset($info['id'])){
             session_start(); 
             $_SESSION['user_id'] = $info['id'];

             $sessionID = $_SESSION['sessionId'];
             $cart = "SELECT * FROM `cart` WHERE `sessionID` = '$sessionID';"; 
             $query = mysqli_query($conn, $cart);  

             if( mysqli_num_rows($query)    > 0){
                $sql = "UPDATE `cart` SET `userID` = ? WHERE `sessionID` = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("is", $info, $sessionID);
                $stmt->execute();
                $stmt->close();
             }
             

             header("location:/CLothing_website/home.php");

        }
        $Result = true;
    }
    else{
         echo "<div class='WrongPass'><p>Incorrect username and password please try again</p></div>";
    }
}

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/49b342d9f7.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="login.css?v=1">
        <title>Document</title>
    </head>

    <body>
  <?php  include 'navbar.php' ?>

  <br>
  <br>
  <br><br>
        <div class="login-form">

            <form class="form" method="post" action="">
                <h2 class="title">Login</h2>
                <label>
                  <input required="" placeholder="" type="email" class="input" name="email">
                  <span><i class="fa-solid fa-envelope"></i> Email</span>
                </label> <br>
                <label>
                  <input required="" placeholder="" type="password" class="input" name="pass" id="passw">
                  <span><i class="fa-solid fa-lock"></i> Password</span>
                </label>
                <div class="chack-pass">
                    <input id="ck-p" type="checkbox">
                    <p>Check password</p>
                </div>
                <button class="submit" name="submit">Submit <i class="fa-solid fa-arrow-right"></i></button>
                <p class="signin">You have no acount ? <a href="Register_page.php">SignUP</a> </p>
            </form>

            <div class="shopping-image">
                <img src="icon/shopping-image.png" alt="">
            </div>

        </div>
<br><br><br>
       <footer>
       <?php include "footer.php"?>
       </footer> 
    </body>

    </html>
    <style>
       
    </style>
    <script>
        var ckpass = document.getElementById("ck-p").onclick = function() {
            if (this.checked) {
                document.getElementById("passw").type = "text";
            } else {
                document.getElementById("passw").type = "password";
            }
        }



        var focus;
    </script>