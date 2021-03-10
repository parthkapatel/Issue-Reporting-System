<?php
session_start();

if(!isset($_SESSION["user"]) && isset($_SESSION["admin"])){
    $eid = "";
    $name = $_SESSION["admin_name"];
}
if(isset($_SESSION["user"]) && !isset($_SESSION["admin"])){
    $eid = $_SESSION["user"];
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
    <title>Report Issue</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/style.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script>


        window.load = getData('<?php echo $eid ?>');


    </script>
</head>
<body>
<?php include_once "../Header/index.php"; ?>
<div class="container my-5 p-5 bg-dark text-light " style="border-radius: 10px;">
    <h1 class="text-center">Report New Issue</h1>
    <div id="report_alert"></div>
    <!--<form class="form text-light" enctype="multipart/form-data"   method="post" >-->
        <div class="form-group">
            <input class="form-control" type="hidden" id="email" name="email"  >
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="text" id="name" name="name"  placeholder="Enter Name">
            <span class="text-danger" id="errName"></span>
        </div>

        <div class="form-group">
            <label for="contact">Contact</label>
            <input  class="form-control" type="text" id="contact" name="contact"  placeholder="Enter contact">
            <span class="text-danger" id="errContact" ></span>
        </div>

        <div class="form-group">
            <label for="flatNumber">Flat Number</label>
            <input id="flat" class="form-control" type="text"  name="flat"  placeholder="Enter Flat Number">
            <span class="text-danger" id="errFlatNumber" ></span>
        </div>

        <div class="form-group">
            <label for="title">Title</label>
            <input  class="form-control" type="text" id="title" name="title"  placeholder="Enter Title">
            <span class="text-danger" id="errTitle"></span>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text" class="form-control"   name="desc" id="desc"  placeholder="Enter Description"></textarea>
            <span class="text-danger" id="errDesc"></span>
        </div>

        <div class="form-group">
            <label for="file">Image</label>
            <input type="file" class="form-control" id="image"  name="image"  placeholder="Select  Image">
            <span class="text-danger" id="errImage" ></span>
        </div>
        <button class='btn btn-success btn-block'  id='report' name='report'>Submit Data</button>
    <!--</form>-->

</body>
</html>
