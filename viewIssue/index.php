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


</head>
<body>
    <?php include_once "../Header/index.php"; ?>

<div class="container-fluid">
    <div class="table-responsive">
        <h1>Reported Issues</h1>
        <div id="updatemsg"></div>
        <table class="table text-center">
            <caption>List of Reported Issues</caption>
            <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                <th scope="col">Contact</th>
                <th scope="col">Flat No.</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <?php
                if($name == "admin"){

                    ?>
                    <th scope="col" colspan="2">Action</th>
                <?php
                }
                ?>
            </tr>
            </thead>
            <tbody id="view_tbody">

            </tbody>
        </table>
    </div>
</div>


    <script>
        window.load = getReportIssueData('<?php echo $eid ?>');
    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

</body>
</html>