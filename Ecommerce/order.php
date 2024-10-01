<?php
require("common.php");
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Confirmation | Life Style Store</title>
    <link href="bootstrap.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="jquery.js"></script>
    <script src="bootstrap.min.js"></script>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container-fluid" id="content">
        <div class="col-md-12">
            <div class="jumbotron">
                <h3 align="center">Your order has been placed successfully. Thank you for shopping with us.</h3>
                <hr>
                <p align="center">Your order will be delivered in 2 days</p>
                <hr>
                <p align="center">Click <a href="products.php">here</a> to purchase any other item.</p>
            </div>
        </div>
    </div>
    <?php include("footer.php");
        ?>
</body>

</html>

</html>