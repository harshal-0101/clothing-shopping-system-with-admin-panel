
<?php
include "Config.php";
$error = false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{   

  include "confige.php";
  $Fname = $_POST["Fname"];
  $Lname =  $_POST["Lname"];
  $email = $_POST["email"];
  $pass = $_POST["pass"];
  $Conpass=  $_POST["Cpass"];
  if($Fname != null || $email != null)
  {
    
    if($pass == $Conpass)
    {
      $sql = "INSERT INTO `user_info_table` ( `Fname`, `Lname`, `email`, `create_password`, `Confirm password`) VALUES ('$Fname', '$Lname', '$email','$pass', '$Conpass')";
      $result = mysqli_query($conn,$sql);
       
      if($result)
      {
          header("location:OTPprocess.html");
      }
    }
  
    else
    {
      $error = true;
  
      if($error){
           $error =  '<h3 class="error">Sorry! Your Password Not Match 
           </h3>';
          }
      else{
        $error =  '<h3 class="error">enter your all details 
       </h3>';
       }
    }

  }
 
 
}
 
 
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/49b342d9f7.js" crossorigin="anonymous"></script>
    <title>ClthoKart-Register</title>
    <link rel="stylesheet" href="register.css?v=3">
    <script type="module" src="register.js"></script>
</head>

<body>
<?php  include 'navbar.php' ?>

<br>
<br>
<br><br>
   <div class="container" id="container"> 
    <form class="form" method="post">
        <?php
          if($error){
             echo $error;
           }
           else{
            echo $error; 
           }
        ?>
    <p class="title">Register </p>
    <p class="message">Signup now and get full access to our app. </p>
        <div class="flex">
        <label>
            <input required="" placeholder="" type="text" class="inputF" name="Fname" id="lname">
            <span><i class="fa-solid fa-user"></i> Firstname</span>
        </label>

        <label>
            <input required="" placeholder="" type="text" class="inputL" name="Lname" id="fname">
            <span>Lastname</span>
        </label>
    </div>  
    <label>
        <input required="" placeholder="" type="email" class="input" name="email" id="email">
        <span><i class="fa-solid fa-envelope"></i> Email</span>
    </label> 
        
    <label>
        <input required="" placeholder="" type="password" class="input" name="pass" id="Cpass">
        <span><i class="fa-solid fa-lock"></i> Password</span>
    </label>
    <label>
        <input required="" placeholder="" type="password" class="input" name="Cpass" id="conpass    ">
        <span><i class="fa-solid fa-user-check"></i> Confirm password</span>
    </label>
    <button id="RGT-btn" class="submit">Submit <i class="fa-solid fa-arrow-right"></i></button>
    <p class="signin">Already have an acount ? <a href="loginR.php">Signin</a> </p>
</form>
</div>
</body>
</html>









