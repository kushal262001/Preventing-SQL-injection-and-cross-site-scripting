<?php
session_start();
if(isset($_SESSION["id"])){
    unset($_SESSION["id"]);
    echo '<script>window.alert("You are logged out successfully!");</script>';
}
// echo '<script>window.alert("ee");</script>';
echo "<script> location.href='http://localhost/proj/infected'; </script>";
?>

