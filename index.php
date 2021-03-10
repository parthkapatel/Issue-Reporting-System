<?php
session_start();

if(isset($_SESSION["user"]) or isset($_SESSION["admin"])){
    header("Location:/reportingSystem/dashboard/");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register & Login</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/style.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<div class="container-fluid bg-dark text-light main">
    <div class="row">
        <!-- Register Code -->

        <div class="col-lg-6 col-md-12 p-5">
            <div class="container">
                <h2 class="text-center my-2">Registration</h2>
                <div id="register_alert"></div>
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="form-group">
                            <label for="firstName" class="label">First Name</label>
                            <input type="text" name="firstName" id="firstName" placeholder="Enter First Name"
                                   class="form-control" value="">
                            <span class="text-danger" id="errFirstname"></span>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="form-group">
                            <label for="lastName" class="label">Last Name</label>
                            <input type="text" name="lastName" id="lastName" placeholder="Enter Last Name"
                                   class="form-control" value="">
                            <span class="text-danger" id="errLastname"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-12">
                        <div class="form-group">
                            <label for="contactNumber" class="label">Contact Number</label>
                            <input type="text" name="contactNumber" id="contactNumber" class="form-control"
                                   placeholder="Enter Contact Number" value="">
                            <span class="text-danger" id="errContact"></span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="form-group">
                            <label for="flatNumber" class="label">Flat Number</label>
                            <input type="text" name="flatNumber" id="flatNumber" placeholder="Enter Flat Number"
                                   class="form-control" value="">
                            <span class="text-danger" id="errFlat"></span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="address" class="label">Address</label>
                            <input type="text" name="address" id="address" placeholder="Enter Address"
                                   class="form-control" value="">
                            <span class="text-danger" id="errAddress"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="form-group">
                            <label for="email" class="label">Email Id</label>
                            <input type="email" name="email" id="email" placeholder="Enter Email Id"
                                   class="form-control" value="">
                            <span class="text-danger" id="errEmail"></span>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="form-group">
                            <label for="lastName" class="label">Password</label>
                            <input type="password" name="password" id="password" placeholder="Enter Password"
                                   class="form-control" value="">
                            <span class="text-danger" id="errPassword"></span>
                        </div>
                    </div>
                </div>
                <button id="register" name="register" class="btn btn-success btn-block">Register
                </button>
            </div>
        </div>

        <!-- Login Code -->

        <div class="col-lg-6 col-md-12 p-5">
            <div class="container">
                <h2 class="text-center my-2">Login</h2>
                <div id="login_alert" ></div>
                <div class="form-group">
                    <label for="Email" class="label">Email Id</label>
                    <input type="email" name="LoginEmail" id="LoginEmail" placeholder="Enter First Name" class="form-control"
                           value="">
                    <span class="text-danger" id="errLoginEmail"></span>
                </div>
                <div class="form-group">
                    <label for="Password" class="label">Password</label>
                    <input type="password" name="LoginPassword" id="LoginPassword" placeholder="Enter Last Name"
                           class="form-control" value="">
                    <span class="text-danger" id="errLoginPassword"></span>
                </div>
                <button id="login" name="login" class="btn btn-success btn-block float-right">Login
                </button>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

</body>
</html>