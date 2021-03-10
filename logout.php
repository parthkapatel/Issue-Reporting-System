<?php
session_start();
if(!isset($_SESSION["user"]) && isset($_SESSION["admin"])){
    if(session_destroy()){
        unset($_SESSION['admin']);
        header("Location:index.php");
    }
}
if(isset($_SESSION["user"]) && !isset($_SESSION["admin"])){
    if(session_destroy()){
        unset($_SESSION['admin']);
        header("Location:index.php");
    }
}
