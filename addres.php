<?php
ob_start();
include 'Config.php';
include "version.php";
$status = False;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="addres.css?v=<?php echo $version;?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<?php

function insert_product(){
    global $conn;
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pin_code = $_POST['pin_code'];
    $lank_mark = $_POST['landmark'];

    $user_id = $_SESSION['user_id'];

    $insert_Address = "UPDATE `user_info_table` SET `Address`='$address',`PinCode`='$city',`city`=' $state',`state`='$pin_code',`landmark`='$lank_mark' WHERE `id` = $user_id";
    $query_run = mysqli_query($conn,$insert_Address);

    if($query_run){
        $status = true;    
        header("location:/CLothing_website/addres.php");
        exit;
    }
    else{
        $status = False;
       
    }
}

?>

<body>
    <?php include "navbar.php"; ?>
    <div class="container">
        <?php 

        // Check if user_id is set in session
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            
            // Use mysqli_query for proper query execution
            $sql = "SELECT Address FROM user_info_table WHERE id = $user_id";
            $user_address = mysqli_query($conn, $sql); 
            
            // Check if there are results and fetch the address
            if ($user_address && mysqli_num_rows($user_address) > 0) {
                $row = mysqli_fetch_assoc($user_address);
                if ($row['Address'] != null) {
        ?>
<?php 
if(isset($_POST['insert_address'])){
    insert_product();
}
?>


         <div class="address-block">
             <div class="address" id="address">
                 <p><i class="fa-solid fa-location-dot"></i> Address</p>
                 <p class="my-address"><?php echo $row['Address']; ?></p> <!-- Display the address -->
                 <button class="update-BTN" type="button" onclick="update_address()">Update Address <i class="fa-solid fa-pen-to-square"></i></button>
             </div>
 
             <div class="update-address" id="update-data">
                 <p class="heading"><i class="fa-solid fa-location-dot"></i> Update your address</p>
                <form action="" method="POST">
                    <table>
                        <tr>
                            <td><input type="text" name="address" placeholder="Address" require></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="city" placeholder="City" value="" require></td>
                            <td><input type="text" name="state" placeholder="State" value="" require></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="pin_code" placeholder="Pin code" value="" require></td>
                            <td><input type="text" name="landmark" placeholder="LandMark" value="" require></td>
                        </tr>
                        <tr>
                            <td><button class="submit" type="submit" name="insert_address">Submit</button></td>
                        </tr>
                    </table>
                </form>
            </div>

            <div class="payment-getway">
                <p>Payment Process</p>
                <form action="payment.php" method="POST">
                    <label for="UPI"><i class="fa-solid fa-credit-card"></i> UPI ID </label><br>
                    <input type="text" placeholder="Enter UPI ID" name="UPI" required><br>
                    <button type="submit" id="pay-btn">Pay <i class="fa-regular fa-credit-card"></i></button>
                </form>
            </div>
        </div>
        <?php 
                } else {
        ?>

<?php
if(isset($_POST['insert_address'])){
    insert_product();
}

?>


        <div class="insert-Container" id="update-data">
           <div class="insert-address">
            <?php
                if(isset($_POST['insert_address'])){
                    if($status == true){
                        echo $msg = "<h2> Addrees Successfully inserted </h2>";
                      }
                      else{
                        echo  $msg =  "<h2> Addrees not inserted </h2>";
                      }
                }

            ?>
           <p class="heading"><i class="fa-solid fa-location-dot"></i> Enter Address</p>
            <form action="" method="POST">
               <table>
                    <tr>
                        <td><input type="text" name="address" placeholder="Address" require></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="city" placeholder="City Name" require></td>
                        <td><input type="text" name="state" placeholder="State Name" require></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="pin_code" placeholder="Pin Code" require></td>
                        <td><input type="text" name="landmark" placeholder="Landmark" require></td>
                    </tr>
                    <tr>
                        <td><button class="submit" type="submit" name="insert_address">Submit</button></td>
                    </tr>
                </table>
            </form>
           </div>
        </div>
        <?php
                }
            }
        }
        ?>
    </div>

<?php include "footer.php"?>    
</body>

<script>
    function update_address() {
        document.getElementById('address').style.display = 'none';
        document.getElementById('update-data').style.display = 'block';
    }
</script>

</html>

<?php ob_end_flush();
 ?>
