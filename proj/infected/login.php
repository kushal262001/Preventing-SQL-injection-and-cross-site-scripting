<?php
include "connection.php";
if(isset($_POST["lemail"]) and isset($_POST["lpassword"])){
    $lemail = $_POST["lemail"];
    $lpassword = $_POST["lpassword"];
    // $lpassword = md5($lpassword);
    // $lemail = md5($lemail);
    $sql = "SELECT id FROM users WHERE email='$lemail' and password='$lpassword'";
    
    // echo "<script>window.alert('$sql')</script>";
    // echo $sql;
    // return;
    $result = mysqli_query($conn, $sql);
    echo "mywogggggggggggrld";
    if($result and mysqli_num_rows($result)===0){
        echo '<script>window.alert("User not found");</script>';
    }elseif($result){
        session_start();
        while($row = mysqli_fetch_assoc($result)){
            $_SESSION["id"] = $row["id"];
            break;
        }
        echo '<script>window.alert("Logged in successfully");</script>';
    }else{
        echo '<script>window.alert("Result failed");</script>';
    }
    echo "<script> location.href='http://localhost/proj/infected/'; </script>";
}else{
    echo '<script>window.alert("Empty fields!");</script>';
    echo "<script> location.href='http://localhost/proj/infected/'; </script>";
}
mysqli_close($conn);
?>