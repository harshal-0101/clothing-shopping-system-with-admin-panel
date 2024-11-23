<?php 
ob_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 include "Config.php"; 
 error_reporting(E_ALL);
 ini_set('display_errors', 1);

 $request = false;

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClothKart-OTP</title>
    <script src="https://kit.fontawesome.com/49b342d9f7.js" crossorigin="anonymous"></script>
    <script type="module" src="register.js?v=4"></script>
</head>
<body>
 <?php  
   session_start();  // Debugging statement
if (!isset($_SESSION['OTP_send']) || $_SESSION['OTP_send'] !== true) {  
   if(isset( $_SESSION['request'])){
    $request = $_SESSION['request']; 
    if($request == true){
        if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
            $email = $_SESSION['email'];
            $password = $_SESSION['password'];
        
            $sql = "SELECT * FROM `user_info_table` WHERE email = ? AND create_password = ?";
            $stmt = mysqli_prepare($conn, $sql);
        
            if ($stmt === false) {
                echo "Error preparing query: " . mysqli_error($conn);
                exit;
            }
        
            mysqli_stmt_bind_param($stmt, "ss", $email, $password);
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
                if (mysqli_num_rows($result) > 0) {
                    $info = mysqli_fetch_assoc($result);
                    if (isset($info['id'])) {
                        $user_id = $info['id'];
                        $OTP = generateOTP();
                        // echo "Generated OTP: $OTP<br>";
        
                        $SQL_OTP = "UPDATE `user_info_table` SET `OTP` = ? WHERE `id` = ?";
                        $updateStmt = mysqli_prepare($conn, $SQL_OTP);
                        mysqli_stmt_bind_param($updateStmt, "si", $OTP, $user_id);
        
                        if (mysqli_stmt_execute($updateStmt)) {
                            // echo "OTP updated successfully<br>";
                            SendOTP($email, $OTP);
                        } else {
                            echo "Error updating OTP: " . mysqli_error($conn) . "<br>";
                        }
                    } else {
                        echo "User not found<br>";
                    }
                } else {
                    echo "No records found<br>";
                }
            } else {
                echo "Error executing query: " . mysqli_error($conn) . "<br>";
            }
        } else {
            echo "Session error<br>";
        }
        
    }
    else{
        echo  $_SESSION['request'];
    }

   }
}
   
   function generateOTP() {
    return rand(1000, 9999);
}
  

?>
    <div class="container">
      <div class="OTP-section">
          <div class="container-otp">
              <h2>Enter OTP</h2>
              <form id="otpForm" class="otp-form" method="post">
                  <div class="otp-inputs">
                      <input type="text" maxlength="1" class="otp-input" id="otp1" autofocus name="otp1">
                      <input type="text" maxlength="1" class="otp-input" id="otp2" name="otp2">
                      <input type="text" maxlength="1" class="otp-input" id="otp3" name="otp3">
                      <input type="text" maxlength="1" class="otp-input" id="otp4" name="otp4">
                  </div>
                  <button type="submit" class="submit-btn" name="OTPcheck">Submit <i class="fa-solid fa-arrow-right"></i></button>
              </form>
              <p>Chack the massage and enter otp </p>
              <p><b>Note*</b> OTP is sended which Phone number is Registerd</p>
          </div>
      </div>
    </div>
    <?php include "footer.php";

    echo $userOTP = $_POST['otp1'].$_POST['otp2'].$_POST['otp3'].$_POST['otp4'];
    if(isset($_POST['OTPcheck'])){
        $request = false;
        $userOTP = $_POST['otp1'].$_POST['otp2'].$_POST['otp3'].$_POST['otp4'];
        $sendedOTP = generateOTP();

        $email = $_SESSION['email'];
        $password = $_SESSION['password'];

        $sql = "SELECT * FROM `user_info_table` where email = '$email' AND create_password = '$password'";
         $select = mysqli_query($conn,$sql) or die("ERROR");
          if(mysqli_num_rows($select) > 0)
            {
               $info = mysqli_fetch_assoc($select);
               if(isset($info['id'])){
                  $OTP  = $info['OTP'];

                  if($userOTP == $OTP){
                    header("location:loginR.php");  
                  }
                  else{
                    echo "your otp is worng!";
                  }
                 
             }
            }
    }
    ?>   
</body>

</html>
<style>
    body{
        margin:0;
    }
    .container {
        font-family: Arial, sans-serif;
        background-color: rgba(0, 0, 0, 0.909);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    
    .container-otp {
        text-align: center;
        background: rgb(13, 13, 13);
        color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 2px 2px 10px 2px black;
    }
    
    .otp-form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    
    .otp-inputs {
        display: flex;
        gap: 10px;
    }
    
    .otp-input {
        width: 50px;
        height: 50px;
        font-size: 18px;
        text-align: center;
        border: 2px solid #767676;
        border-radius: 4px;
        outline: none;
        transition: border-color 0.2s;
    }
    
    .otp-input:focus {
        border-color: #007bff;
    }
    
    .submit-btn {
        margin-top: 20px;
        margin-bottom: 10px;
        padding: 10px 20px;
        font-size: 16px;
        color: white;
        background-color: #007bff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    
    .submit-btn:hover {
        background-color: #0056b3;
    }
    
    .container-otp p {
        font-size: 10px;
        text-align: left;
        margin-bottom: -5px;
    }
    
    .container-otp p b {
        color: red;
    }
</style>
<script>
    const OTPdiv = document.querySelectorAll('input[type="text"]');
    OTPdiv.forEach((input, index) => {
        input.addEventListener('input', () => {
            if (input.value.length === 1) { 
                if (index + 1 < OTPdiv.length) {
                    OTPdiv[index + 1].focus();
                }
            }
        });
    });
</script>
<?php
function SendOTP($User_mail , $OTP){
    require 'C:\xampp\htdocs\clothing_website\PHPmailer\Exception.php';
    require 'C:\xampp\htdocs\clothing_website\PHPmailer\PHPMailer.php';
    require 'C:\xampp\htdocs\clothing_website\PHPmailer\SMTP.php';
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings                  
        $mail->isSMTP();                                           
        $mail->Host       = 'smtp.gmail.com';                    
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'mahajanharshalnitin@gmail.com';                     
        $mail->Password   = 'lzcz nmcn nbio uvpx';                               
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->Port       = 465;                                    
    
        //Recipients
        $mail->setFrom('mahajanharshalnitin@gmail.com', 'Clothino');
        $mail->addAddress("$User_mail", 'hello wellcome to my website');     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
    
        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'OTP Verification';
        $mail->Body    = "Dear user your OTP code is <b>$OTP</b>";
        $mail->AltBody = 'Don\'t share this code to anyone. ';
    
          $mailsend = $mail->send();
          if($mailsend){
              $_SESSION['OTP_send'] = true;
          }
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}
 ob_end_flush();
?>