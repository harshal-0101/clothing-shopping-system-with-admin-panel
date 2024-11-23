
<?php
// include 'navbar.php' ;
include "Config.php";   
session_start();
if (!isset($_SESSION['user_id'])) {
    die("User not logged in.");
}

$user_id = $_SESSION['user_id'];

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Sanitize and retrieve form data
    $Fname = mysqli_real_escape_string($conn, $_POST['Fname']);
    $Lname = mysqli_real_escape_string($conn, $_POST['Lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $pin = mysqli_real_escape_string($conn, $_POST['pin']);
    $Phone = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $gender = mysqli_real_escape_string($conn, $_POST['radio']); // Update to 'radio' for consistency

    // Update query
    $update_Info = "UPDATE `user_info_table` SET 
        `Fname`='$Fname',
        `Lname`='$Lname',
        `email`='$email',
        `P_number`='$Phone',
        `Address`='$address',
        `PinCode`='$pin',
        `Gender`='$gender' 
        WHERE `id` = $user_id";

    // Execute the query
    if (mysqli_query($conn, $update_Info)) {
        $mssg = "<h3 class='record_add'>Record updated successfully.</h3>";
        $status = true;

    } else {
       echo $mssg = "<h3>Error updating record: </h3>" . mysqli_error($conn);
       $status = false;
    }
}

// Close the connection after processing
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothino</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
         body{
            margin:0;
            padding: 0;
         }
      
        .container {
            background-color: rgba(0, 0, 0, 0.909);
            color: white;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }
        h1 {
            margin-bottom: -20px;
        }
        form {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 800px;
        }
        .form-group {
            margin: 10px 0;
            display: flex;
            align-items: center;
        }
        .form-group i {
            margin-right: 10px;
            color: white;
            font-size:20px;
            width: 30px;
        }
        input[type="text"], input[type="email"], input[type="file"] {
            width: 100%;
            padding: 15px;
            font-size:15px;
            margin: 0;
            border: none;
            border-radius: 4px;
            background-color:black;
            color:white;
            border-radius: 10px;
        }
        button {
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            background-color:black;
            color:white;
        }
        button:hover {
            background-color: rgba(255, 255, 255, 0.4);
        }

:focus {
  outline: 0;
  border-color: #2260ff;
  box-shadow: 0 0 0 4px #b5c9fc;
}

.mydict div {
 width: 100%;
  display: flex;
  flex-wrap: wrap;
  margin-top: 0.5rem;
  justify-content: center;
}

.mydict input[type="radio"] {
  clip: rect(0 0 0 0);
  clip-path: inset(100%);
  height: 1px;
  overflow: hidden;
  position: absolute;
  white-space: nowrap;
  width: 1px;
}

.mydict input[type="radio"]:checked + span {
  box-shadow: 0 0 0 0.0625em #0043ed;
  background-color: #dee7ff;
  z-index: 1;
  color: #0043ed;
}

label span {
width: 100px;
  display: block;
  cursor: pointer;
  background-color: #fff;
  padding: 0.375em .75em;
  position: relative;
  margin-left: .0625em;
  box-shadow: 0 0 0 0.0625em #b5bfd9;
  letter-spacing: .05em;
  color: #3e4963;
  text-align: center;
  transition: background-color .5s ease;
}

label:first-child span {
  border-radius: .375em 0 0 .375em;
}

label:last-child span {
  border-radius: 0 .375em .375em 0;
}

.record_add{
color:green;
}

    </style>
</head>
<body>

<div class="container">
    
<h1>Clothino</h1>
    <p>Update your information</p>
    <?php
  if(isset($status)){
    if($status == true){
        echo $mssg;
    }
    else{
        echo $mssg;
    }
  }
    ?>
    <form method="POST" action="">
        <div class="form-group">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Fist name" name="Fname" required>
            <input type="text" placeholder="Last name" name="Lname" required>
        </div>
        <div class="form-group">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email" name="email" required>
        </div>
        <div class="form-group">
            <i class="fas fa-home"></i>
            <input type="text" placeholder="Address" name="address" required>
        </div>
        <div class="form-group">
            <i class="fas fa-map-marker-alt"></i>
            <input type="text" placeholder="Pin Code" name="pin" required>
        </div>

        <div class="form-group">
            <i class="fa-solid fa-phone"></i>
            <input type="text" name="phone_number" placeholder="+91 78654 25486">
        </div>  

      <div class="mydict">
      	<div>
      		<label>
      			<input type="radio" name="radio" checked="">
      			<span><i class="fa-solid fa-venus"></i> Women</span>
      		</label>
      		<label>
      			<input type="radio" name="radio">
      			<span><i class="fa-solid fa-mars"></i> Men</span>
      		</label>
      		<label>
      			<input type="radio" name="radio">
      			<span><i class="fa-solid fa-question"></i> Other</span>
      		</label>
      		
      	</div><br>

      </div>
        <button type="submit" name="submit">Submit</button>
    </form>
</div>

</body>
</html>

