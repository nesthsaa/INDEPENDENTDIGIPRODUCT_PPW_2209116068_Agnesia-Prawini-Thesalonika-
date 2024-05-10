<?php


if(!isset($_SESSION['username'])){
    header('location:login.php');
} else {

}

date_default_timezone_set("Asia/Bangkok");
$date_now = date("Y-m-d");
?>