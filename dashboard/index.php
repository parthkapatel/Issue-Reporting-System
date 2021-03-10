<?php
session_start();

if(!isset($_SESSION["user"]) && isset($_SESSION["admin"])){
    $name = $_SESSION["admin_name"];
}
if(isset($_SESSION["user"]) && !isset($_SESSION["admin"])){
    $name = $_SESSION["user_name"];
}
if(!isset($_SESSION["user"]) && !isset($_SESSION["admin"])){
    header("Location:/reportingSystem/");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/style.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<?php include_once "../Header/index.php"; ?>
<div class="container-fluid m-0 p-0">
    <img src="../assets/img/image.jpg" width="100%" height="1024px" alt="">
</div>
</body>
</html>