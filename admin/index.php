<?php
 include "Config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Add Product</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="index.css">
    <script type="module" src="index.js"></script>
</head>

<body>
    <div class="main-container">
        <div class="menu">
            <div class="logo">
                <img src="http://localhost/clothing_website/icon/logo.png" alt="">
            </div>
            <div class="alloptions">
                <button class="btn">Insert Products</button>
                <button class="btn">our all Products</button>
                <button class="btn">Users</button>
                <button class="btn"></button>
                <button class="btn"></button>
            </div>
        </div>
        <div class="container">
            <div class="insertProduct" id="insertProduct">
                <h1>Add Product</h1>
                <form id="addProductForm">
                    <div class="form-group">
                        <label for="productBrandName">Product BrandName:</label><br>
                        <input type="text" id="productBrandName" name="productBrandName" required>
                    </div>
                    <div class="form-group">
                        <label for="productName">Product Name:</label><br>
                        <input type="text" id="productName" name="productName" required>
                    </div>
                    <div class="form-group">
                        <label for="productPrice">Product Price:</label><br>
                        <input type="number" id="productPrice" name="productPrice" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="productDetails">Product Details:</label><br>
                        <textarea id="productDetails" name="productDetails" rows="4" placeholder="white details here" required></textarea><br>
                        <span>only 500 words</span>
                    </div>
                    <div class="form-group">
                        <label for="productSize">Product Size:</label><br>
                        <input type="text" id="productSize" name="productSize">
                    </div>
                    <div class="form-group">
                        <label for="productColor">Product Color:</label><br>
                        <input type="text" id="productColor" name="productColor">
                    </div>
                    <div class="form-group">
                        <label for="productSize">Product Size:</label><br>
                        <input type="text" id="productSize" name="productSize">
                    </div>
                    <div class="form-group">
                        <label for="productCategory">Product Category:</label><br>
                        <input type="text" id="productCategory" name="productCategory">
                    </div>
                    <div class="form-group">
                        <label for="productImage">Product Image:</label><br>
                        <input type="file" id="productImage" name="productImage" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="productBrand">Product Brand:</label><br>
                        <input type="text" id="productBrand" name="productBrand">
                    </div>
                    <div class="form-group">
                        <button onclick="submit()" type="submit">Add Product</button>
                    </div>
                </form>
            </div>
            <div class="Users" id="Users">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User ID</th>
                            <th scope="col">User Name</th>
                            <th scope="col">user image</th>
                            <th scope="col">User detail</th>
                            <th scope="col">User password</th>
                            <th scope="col">user status</th>
                            <th scope="col">status</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <tr>
                            <td>1</td>
                            <td>147</td>
                            <td>harshal</td>
                            <td><img src="https://fullyfilmy.in/cdn/shop/products/New-Mockups---no-hanger---TShirt-Yellow.jpg?v=1639657077" alt=""></td>
                            <td>harshal,com</td>
                            <td>harshal101</td>
                            <td>Active</td>
                            <td>Online</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>148</td>
                            <td>harshal</td>
                            <td><img src="https://fullyfilmy.in/cdn/shop/products/New-Mockups---no-hanger---TShirt-Yellow.jpg?v=1639657077" alt=""></td>
                            <td>harshal,com</td>
                            <td>harshal101</td>
                            <td>Block</td>
                            <td>Offline</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="ourProduct" id="ourProduct">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product ID</th>
                            <th scope="col">Brand Name</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product detail</th>
                            <th scope="col">Product image</th>
                            <th scope="col">ActualPrice</th>
                            <th scope="col">FinalPrice</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Stock</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                    $query = " SELECT * FROM `product`";
                    $product = mysqli_query($conn,$query);
                    $i=1;
                    while($row = mysqli_fetch_assoc($product)) { ?>
                            <tr>
                                <td><?php echo $i++?></td>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['P_ name'];?></td>
                                <td><?php echo $row['P_Brand'];?></td>
                                <td><?php echo $row['P_ Description'];?></td>
                                <td><img src="http://localhost/clothing_website/product_image/<?php echo $row['image1'];?>" alt=""></td>
                                <td><?php echo $row['final_price'];?></td>
                                <td><?php echo $row['actual_price'];?></td>
                                <td><?php echo $row['discount'];?></td>
                                <td><?php echo $row['P_stock']; ?></td>
                            </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>

