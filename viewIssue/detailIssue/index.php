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
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/style.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


</head>
<body>
<?php include_once "../../Header/index.php"; ?>

<div class="container mb-4 w-auto h-100"
     style="background-color: rgba(255, 255, 255, 0.3);min-height:650px;margin-top:80px;border-radius: 20px;box-shadow: 0px 0px 20px rgba(67, 67, 67, 0.3) ;">
    <div class="container p-0 blog-post">
        <div class="container-fluid px-4 py-4 blog-post-title">
            <h2 id="title"></h2>
            <hr>
            <div class="container m-0 p-0 clearfix">
                <h6 class="float-left ">By <b id="uname"></b></h6>
                <h6 class="float-left "> , <b id="contact"></b></h6>
                <h6 class="float-right text-secondary" >Flat Number <b id="flat"></b></h6>
            </div>
            <hr>
        </div>
        <?php
        if(isset($value["image"])){
            ?>
            <div class="container  p-0">
                <img src="../assets/img/<?php //echo $image ?>" class="img-fluid">
            </div>
            <?php
        }
        ?>
        <div class="container p-3 blog-post-title">
            <p class="text-justify overflow-auto" id="desc"></p>
        </div>
        <hr>
        <div class="container" id="LandD">
            <span class="btn btn-primary" id="comment">Comments <b id="c_counter">0</b></span>
        </div>
        <hr>
        <!-- style="display: none;" -->
        <div class="container p-2" id="comment-section" style="display: none;">
            <div class="container clearfix p-2 overflow-auto" id="co">


            </div>
            <div class="container mb-3 p-3 float-center bg-light border border-rounded">
                <div class="form-group">
                    <label for="name" class="text-primary"><?php echo $_SESSION["admin_name"]; ?></label>
                    <textarea cols="20" rows="5" class="form-control" id="commentData"
                              placeholder="Type Comment Here....." ></textarea>
                    <button name="submit" id="submit" class="btn btn-success m-2">Post</button>
                    <span class="text-info" id="msg"></span>
                    <div class="alert alert-success alert-dismissible fade show" id="success" style="display:none;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    window.load = getDetailsReportIssueData('<?php echo $_REQUEST["id"] ?>');
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

</body>
</html>