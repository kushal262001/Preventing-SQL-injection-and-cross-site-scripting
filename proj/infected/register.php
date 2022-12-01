<?php
include "connection.php";

if(isset($_POST["rname"]) and isset($_POST["remail"]) and isset($_POST["rpassword"])){
    // echo '<script>window.alert("Empty fields!");</script>';
    $rname = $_POST["rname"];
    $remail = $_POST["remail"];
    $rpassword = $_POST["rpassword"];
    // $rpassword = md5($rpassword);
    // $remail = md5($remail);
    // $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";
    $sql = "SELECT * FROM users WHERE email='$remail'";

    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)===1){
        echo '<script>window.alert("Use different email!");</script>';
        echo "<script> location.href='http://localhost/proj/infected/'; </script>";
    }else {
        $sql = "insert into users (name,email,password) values ('$rname','$remail','$rpassword')";
        $result = mysqli_query($conn, $sql);

        if ($result==TRUE) {
            $sql = "select id from users where email='$remail'";
            echo $sql;
            $result = mysqli_query($conn, $sql);
            session_start();
            while($row = mysqli_fetch_assoc($result)){
                $_SESSION["id"] = $row["id"];
            }
            
            $kk = $_SESSION["id"];
            echo '<script>window.alert("User registered successfully!");</script>';
            echo "<script> location.href='http://localhost/proj/infected/common.php'; </script>";
        } else {
            echo '<script>window.alert("Something went wrong!");</script>';
            echo "<script> location.href='http://localhost/proj/infected/'; </script>";
        }
    }
}else{
    // echo '<script>window.alert("Empty fields!");</script>';
    // echo "<script> location.href='http://localhost/proj/infected/'; </script>";
    echo "nkot ok";
}
mysqli_close($conn);
?>not ok