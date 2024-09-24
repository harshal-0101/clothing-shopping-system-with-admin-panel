<?php
    $server ="localhost";
    $name="root";
    $pass = "";
    $database = "clothkart_db";
    
    
    $conn = mysqli_Connect($server,$name,$pass,$database);

   if(!$conn){
    die("this is not connecterd");
   }  


?>


