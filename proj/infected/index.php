<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Myproj</title>
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    <link rel="stylesheet" href="../static/css/common.css">
</head>

<body>
<?php
    session_start();
    if(isset($_SESSION['id'])){
        // echo '<script>window.alert("You are logged in");</script>';
        echo "<script> location.href='http://localhost/proj/infected/common.php'; </script>";
    }
?>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/proj/infected">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/proj/infected/common.php">Common</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/proj/infected/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="body-container">
        <div class="row m-5">
            <div class="col-md-6 justy-content-center"
                style="text-align: right;border-right: 2px solid black;padding-right: 5%;padding-left: 15%;padding-top: 20px;padding-bottom: 20px;">
                <h2>Login</h2>
                <form action="login.php" method="post">
                    <div class="mb-3" style="text-align: left;">
                        <label for="lemail" class="form-label">Email address</label>
                        <input class="form-control" id="lemail" name ="lemail" >
                    </div>
                    <div class="mb-3" style="text-align: left;">
                        <label for="lpassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="lpassword" name="lpassword">
                    </div>
                    
                    <div class="mb-3" style="text-align: center;"><button type="submit" class="btn btn-primary">Submit</button></div>

                </form>
            </div>
            <div class="col-md-6 justy-content-center" style="text-align: left;border-left: 2px solid black;padding-left: 20px;padding-top: 20px;padding-right: 15%;">
                <h2>Register</h2>
                <form action="register.php" method="post" >
                    <div class="mb-3" style="text-align: left;">
                        <label for="rname" class="form-label">Your name</label>
                        <input type="text" class="form-control" name="rname" id="rname">

                    </div>
                    <div class="mb-3" style="text-align: left;">
                        <label for="remail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="remail" name="remail" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3" style="text-align: left;">
                        <label for="rpassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="rpassword" name="rpassword">
                    </div>
                    <div class="mb-3 form-check" style="text-align: left;">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">I accept terms and conditions</label>
                    </div>
                    <div class="mb-3" style="text-align: center;"><button type="submit" class="btn btn-primary" name="rsb">Submit</button></div>

                </form>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>Footer</p>
    </div>
</body>
<script src="../static/js/bootstrap.min.js"></script>
<script>
    // window.alert("User Registered!");
    // window.alert("User with email already exist!");
    // window.alert("Failed to register user!");
    // window.location("")

</script>
</html>