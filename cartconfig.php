<?php
include "Config.php";

session_start();    
$sessionID = $_SESSION['sessionId'];
?>

<?php 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  
    $product_id = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']);
    $total_price = floatval($_POST['total_price']);

    
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

  
    $stmt = $conn->prepare("UPDATE `cart` SET `qty` = ?, `total_price` = ? WHERE `Cart_id` = ?");    
    $stmt->bind_param('idi', $quantity, $total_price, $product_id);
    
    $getTotalP = "SELECT `total_price` FROM `cart` WHERE `sessionID` = '$sessionID';" ;
     $query_run = $conn->query($getTotalP);

     if ($stmt->execute()) {
     
        $FinalTOtal_price = 0;
        while($items = mysqli_fetch_assoc($query_run)){
            $FinalTOtal_price += $items['total_price'];
        }
        echo json_encode(['status' => 'success', 'message' => "Quantity successfully Updated", 'total_price' => number_format($FinalTOtal_price,2)]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed']);
    }


} else {
    echo "Invalid request method.";
}


?>
