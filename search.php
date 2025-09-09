<?php
require "main.php";

$obj = new db();

if(isset($_REQUEST['submit'])) {
    //here you have to write the variable name which you write in input line. it will display that details based on 
    // your specifide value of  variable.
    $productId = $_REQUEST['productId'];

    $product = $obj->displayproduct($productId);

    if ($product) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Product</title>
</head>
<body>
    <h1>Product Details</h1>

    <form action="update1.php" method="get">
        <!-- here you will get all the values of your search so you need to write here all the variables which you want to display -->
        Product Name: 
        <input type="text" name="pname" value="<?php echo $product['pname']; ?>"><br>
        Product Description: 
        <input type="text" name="pdesc" value="<?php echo $product['pdesc']; ?>"><br>
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>
<?php
    } else {
        echo "Product not found!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Product</title>
</head>
<body>
    <h1>Search Product</h1>
    <form action="#" method="get">
        Enter Product ID: <input type="text" name="productId">
        <input type="submit" name="submit" value="Search">
    </form>

    <a href="productinfo.php"><button>back to product info page</button></a>

</body>
</html>
