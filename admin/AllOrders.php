<?php include "Config.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>


<body>
    <br>
    <div class="search-order">
        <p>Search order</p>
        <input type="search" placeholder="Search Order by order Id">
        <button type="button" class="btn btn-success">Search</button>
    </div>
    <br><br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">user Id</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Product ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product image</th>
                <th scope="col">Product Price</th>
                <th scope="col">Date</th>
                <th scope="col">Ship new</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
       <?php  
         $sql = "SELECT * FROM `orders`";
         $order = mysqli_query($conn,$sql);
         while($row = mysqli_fetch_assoc($order)) { ?>
            <tr>
                <td scope="row"><?php echo $row['OrderID']; ?></td>
                <td><?php echo $row['UserID']; ?></td>
                <td><?php echo $row['Customer_name']; ?></td>
                <td scope="row"><?php echo $row['ProductID']; ?></td>
                <td><?php echo $row['Product_Name']; ?></td>
                <td><img src="<?php $row['P_image']; ?>" alt=""></td>
                <td><?php echo $row['ProductTotalPrice']; ?></td>
                <!-- <td>0147</td> -->
                <td><?php echo $row['Date']; ?></td>
                <td><button>Go</button></td>
            </tr>
       <?php } ?>
        </tbody>
    </table>
</body>

</html>
<style>
    table {
        margin: auto;
        max-width: 1000px;
        width: 100%;
    }
    
    table tr img {
        width: 100px;
    }
    
    .search-order {
        display: flex;
        justify-content: center;
        width: 1000px;
        margin: auto;
    }
    
    .search-order p {
        font-size: 20px;
        margin-right: 10px;
        align-self: center;
    }
    
    .search-order input {
        width: 300px;
        height: 50px;
    }
</style> 