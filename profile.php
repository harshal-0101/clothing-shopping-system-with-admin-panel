<?php
include 'Config.php';
session_start(); 
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:loginR.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
    <script src="https://kit.fontawesome.com/49b342d9f7.js" crossorigin="anonymous"></script> 
    <title>profile</title>
</head>

<body>
 
    <div class="profile">
        <div class="pro-nav">
            <div class="profile_photo">
                <img src="profile_photo.png" alt="">
            </div>
            <div class="user_name">
                <?php 
                  $select = mysqli_query($conn,"SELECT * FROM `user_info_table` WHERE ID = '$user_id'") or die('query failed');

                  if(mysqli_num_rows($select) > 0)
                  {
                    $fetch = mysqli_fetch_assoc($select);
                  }

                ?>
                <h1><?php echo  $fetch['Fname']." ".$fetch['Lname']  ?></h1>
                <hr>
                <p><?php echo  $fetch['email']  ?></p>
            </div>
        </div>
        <div class="other-info">
            <hr>
            <h3>Address</h3>
            <p id="addr">udhna,surat,gujarat,india</p>

            <h3>Phone no</h3>
            <p id="mobile-no">+91 78610 23200</p>
        </div>
        <div class="other-options">
            <ul>
                <li><a href="#"><i class="fa-solid fa-pen-to-square"></i>ADD Profile</a></li>
                <li><a href="#"><i class="fa-solid fa-gear"></i>Setting</a></li> 
                <li><form method="post"> <i class="fa-solid fa-arrow-right-from-bracket"></i><button type="submit" id="submit-btn" name="logout">Logout</button> </form></li>
            </ul>
        </div>
    </div>
</body>

</html>
<style>
  
</style>
<script>
    var address = document.getElementById("add-address");
    var edadd = document.getElementById("addr");
    var nomber = document.getElementById("mobile-no");
    var num_Add = document.getElementById("mobile-add");

    function addpro() {
        address.style.display = "block";
        edadd.style.display = "none";
        nomber.style.display = "none";
        num_Add.style.display = "block";
    }

    function savepro() {
        num_Add.style.display = "none";
        address.style.display = "none";
        edadd.style.display = "block";
        nomber.style.display = "block";

        var addchange = address.value;
        address = "";
        edadd.innerHTML = addchange;
        var number = num_Add.value;
        num_Add = "";
        nomber.innerHTML = number;
    }
</script>