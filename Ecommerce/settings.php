<?php
require_once("common.php");
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Settings | Life Style Store</title>
    <link href="bootstrap.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="jquery.js"></script>
    <script src="bootstrap.min.js"></script>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container-fluid" id="content">
        <div class="col-lg-4 col-md-6">
            <img src="settings.jpg">
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6" id="settings-container">
                <h4>Change Password</h4>
                <form action="settings_script.php" method="POST">
                    <div class="form-group">
                        <input type="password" class="form-control" name="old-password" placeholder="Old Password"
                            required="true">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="New Password"
                            required="true">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password1" placeholder="Re-type New Password"
                            required="true">
                    </div>
                    <button type="submit" class="btn btn-primary">Change</button>
                    <?php if(isset($_GET['error'])) echo $_GET['error']; ?>
                </form>
            </div>
        </div>
    </div>
    <?php include("footer.php"); ?>
</body>

</html>