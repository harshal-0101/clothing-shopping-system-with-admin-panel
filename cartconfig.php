<?php
include "Config.php";

session_start();    
$sessionID = $_SESSION['sessionId'];
?>


<?php
// function updateCartItem($product_id, $quantity, $price ,$conn) {
//     // Ensure quantity is a positive integer (you can add more validation here)
//     $quantity = intval($quantity);
//     if ($quantity <= 0) {
//         return false; // Quantity must be positive
//     }

//     // Update query
//     $sql = "UPDATE `cart` SET `total_price` = '$price',`qty` = '$quantity' WHERE `cart`.`Cart_id` = '$product_id';";
    

//     if ($conn->query($sql) === TRUE) {
//         return true; // Updated successfully
//     } else {
//         return false; // Error updating quantity
//     }
// }

// // Handle AJAX request
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Ensure both product_id and quantity are provided
//     if (isset($_POST['product_id'], $_POST['quantity'])) {
//         $product_id = $_POST['product_id'];
//         $new_quantity = $_POST['quantity'];
//         $Newprice = $_POST['price'];
//         // Create connection

//         // Check connection
//         if ($conn->connect_error) {
//             die("Connection failed: " . $conn->connect_error);
//         }

//         // Update the cart in the database
//         if (updateCartItem($product_id, $new_quantity, $Newprice, $conn)) {
//             echo "Quantity updated successfully.";
//             $in_massg = "added into cart";
//             echo json_encode(["num_cart"=>$cart_num,"in_massg"=>$in_massg]);
//         } else {
//             echo "Failed to update quantity.";
//             $in_massg = "Errror";
//             echo json_encode(["num_cart"=>$cart_num,"in_massg"=>$in_massg]);
//         }

//         // Close connection
        
//     }
// }
?>

<?php 

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    // Retrieve and sanitize POST data
    $product_id = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']);
    $total_price = floatval($_POST['total_price']);

    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update the cart item in the database
    $stmt = $conn->prepare("UPDATE `cart` SET `qty` = ?, `total_price` = ? WHERE `Cart_id` = ?");    
    $stmt->bind_param('idi', $quantity, $total_price, $product_id);
    
    $getTotalP = "SELECT `total_price` FROM `cart` WHERE `user_id` = '$sessionID';" ;
     $query_run = $conn->query($getTotalP);

     if ($stmt->execute()) {
        // Calculate FinalTOtal_price
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

<?php
//$sessionID = $_SESSION['sessionId'];
//
//header('Content-Type: application/json'); 
//
//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//
//$ProductID = isset($_POST['pid']);
//$PName = isset( $_POST['PName']);
//$PBrand = isset($_POST['PBrand']);
//$PImg = isset($_POST['PImg']);
//$PPrice =isset($_POST['PPrice']);
//$PDiscount = isset($_POST['PDiscount']) ;
//$qty = 1;
//
//    // Check if the product already exists in the cart
//    $sqlQ = "SELECT * FROM `cart` WHERE `P_id` = ? AND `user_id` = ?";
//    $stmt = $conn->prepare($sqlQ);
//    $stmt->bind_param("is", $ProductID, $sessionID);
//    $stmt->execute();
//    $result = $stmt->get_result();
//
//    if ($result->num_rows > 0) {
//        // Product already exists in the cart; you might want to update the quantity or handle this case
//        echo json_encode(['status' => 'error', 'message' => 'Product already in cart']);
//    } else {
//        // Insert new product into the cart
//        $queryInsert = "INSERT INTO `cart` (`P_id`, `user_id`, `P_brand`, `image`, `P_name`, `P_price`, `discount`, `qty`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
//        $stmt = $conn->prepare($queryInsert);
//        $stmt->bind_param("ssssssss", $ProductID, $sessionID, $PBrand, $PImg, $PName, $PPrice, $PDiscount, $qty);
//
//        if ($stmt->execute()) {
//            echo json_encode(['status' => 'success', 'message' => 'Product added to cart']);
//        } else {
//            echo json_encode(['status' => 'error', 'message' => 'Failed to add product']);
//        }
//    }
//
//    $stmt->close();
//    $conn->close();
//} else {
//    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
//}
?>