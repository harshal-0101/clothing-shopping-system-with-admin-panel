<?php
include 'Config.php';
if(isset($_POST['submit']))
{
     $file = $_FILES['image']['name'];
     $tempname = $_FILES['image']['tmp_name'];
     $folder = 'Product_image/'.$file;

    $Pname =$_POST['p_name'];
    $discription = $_POST['discription'];
    $price =$_POST['price'];
    $cate =$_POST['categiry'];
    $size =$_POST['size'];
    $colur =$_POST['colour'];
    $brand =$_POST['brand'];

    // INSERT INTO `product` (`id`, `image1`, `image2`, `image3`, `image4`, `P_Brand`, `P_ name`, `P_ Description`, `P_ Category`, `final_price`, `actual_price`, `discount`, `P_sixe`, `P_colour`, `p_packOf`, `P_stock`, `P_fabric`) VALUES (NULL, 'image1', 'image1', 'image1', 'image1', 'ClothKart', 't-shirts in 3 colours for both man & woman ', 't-shirts in 3 colours for both man & woman ', 'ALL', '999', '599', '30', 'M', 'white,Black & gray', '3', '50', '1');

    $sql ="INSERT INTO `product` ( `image1`, `image2`, `image3`, `image4`, `P_Brand`, `P_ name`, `P_ Category`, `P_price`, `P_sixe`, `P_colour`) VALUES ( '$file', '$file', '$file', '$file', '$brand', ' $Pname', ' $cate', '$price', '$size', '$colur');" or die("error");
        
    $query = mysqli_query($conn,$sql);
    $inset;
    if(move_uploaded_file($tempname,$folder))
    {    
        $inset= true;
        $mss = "<h1 id='mssg'>file uploaded succesfully</h1>";
    }
    else{
        $inset= false;
        $mss2 = "<h1 id='mssg'>file uploaded Failed</h1>";
    }
   
}
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width= , initial-scale=1.0">
        <script src="add_product.js"></script>
        <title>Document</title>
    </head>

    <body>
        <div class="container">
            <?php 
        if(isset($_POST['submit']))
          {
            if($inset == true)
              {
                 echo $mss ;
              }
             else if($inset == false){
                 echo $mss2;
                 }
          }
        ?>

            <form method="post" enctype="multipart/form-data">
                <input type="file" name="image"> <br>
                <input type="text" name="brand" id="" placeholder="Brand"><br>
                <input type="text" name="p_name" id="" placeholder="name"><br>
                <input type="text" name="discription" id="" placeholder="dis"><br>
                <input type="text" name="price" id="" placeholder="price"><br>
                <input type="text" name="colour" id="" placeholder="colur"><br>
                <select name="categiry" id=""><br>
              <option value="select categiry">select categiry</option>
              <option value="man">for man</option>
              <option value="woman"> for human</option>
            </select>
                <select name="size" id=""><br>
              <option value="select size">select categiry</option>
              <option value="X">X</option>
              <option value="M">M</option>
              <option value="L"> L</option>
            </select>

                <input onclick="speak()" type="submit" name="submit" id="submit">

            </form>

        </div>
    </body>

    </html>
    <script>
    </script>