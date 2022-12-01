<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Common | Myproj</title>
    <style>
        .navbar-nav {
            width: 100%;
        }

        @media(min-width:568px) {
            .end {
                margin-left: auto;
            }
        }

        @media(max-width:768px) {
            #post {
                width: 100%;
            }
        }

        #clicked {
            padding-top: 1px;
            padding-bottom: 1px;
            text-align: center;
            width: 100%;
            background-color: #ecb21f;
            border-color: #a88734 #9c7e31 #846a29;
            color: black;
            border-width: 1px;
            border-style: solid;
            border-radius: 13px;
        }

        #profile {
            background-color: unset;

        }

        #post {
            margin: 10px;
            padding: 6px;
            padding-top: 2px;
            padding-bottom: 2px;
            text-align: center;
            background-color: #ecb21f;
            border-color: #a88734 #9c7e31 #846a29;
            color: black;
            border-width: 1px;
            border-style: solid;
            border-radius: 13px;
            width: 50%;
        }

        body {
            background-color: black;
        }

        #nav-items li a,
        #profile {
            text-decoration: none;
            color: rgb(224, 219, 219);
            background-color: black;
        }


        .comments {
            margin-top: 5%;
            margin-left: 20px;
        }

        .darker {
            border: 1px solid #ecb21f;
            background-color: black;
            float: right;
            border-radius: 5px;
            padding-left: 40px;
            padding-right: 30px;
            padding-top: 10px;
        }

        .comment {
            border: 1px solid rgba(16, 46, 46, 1);
            background-color: rgba(16, 46, 46, 0.973);
            /* float: left; */
            border-radius: 5px;
            padding-left: 40px;
            padding-right: 30px;
            padding-top: 10px;

        }

        .comment h5,
        .comment span,
        .darker h5,
        .darker span {
            display: inline;
        }

        .comment p,
        .comment span,
        .darker p,
        .darker span {
            color: rgb(184, 183, 183);
        }

        h1,
        h5 {
            color: white;
            font-weight: bold;
        }

        label {
            color: rgb(212, 208, 208);
        }

        #align-form {
            margin-top: 20px;
        }

        .form-group p a {
            color: white;
        }

        #checkbx {
            background-color: black;
        }

        #darker img {
            margin-right: 15px;
            position: static;
        }

        .form-group input,
        .form-group textarea {
            background-color: black;
            border: 1px solid rgba(16, 46, 46, 1);
            border-radius: 12px;
        }

        form {
            border: 1px solid rgba(16, 46, 46, 1);
            background-color: rgba(16, 46, 46, 0.973);
            border-radius: 5px;
            padding: 20px;
        }
    </style>
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    <link rel="stylesheet" href="../static/css/common.css">
</head>

<body>
    <?php
    session_start();
    if(isset($_SESSION['id'])===FALSE){
        echo '<script>window.alert("Login first");</script>';
        echo "<script> location.href = 'http://localhost/proj/infected/'; </script>";
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
        <section>
            <div class="container">
                <div class="row mb-5">
                    <div class="col-sm-5 col-md-6 col-12 pb-4 mt-4">
                        <div class="container-fluid">
                            <img src="../static/image.jpg" alt="" srcset="">
                        </div>
                        <h4 class="mt-3" style="color: black;">Comments</h4>
                        <div id="comms">
                            <?php
                                $htcont = "";
                                include "connection.php";
                                $sql = "select * from comments order by cn desc;";
                                $result = mysqli_query($conn,$sql);
                                if($result){
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo '<div class="comment mt-3 text-justify">';
                                        $pp = $row["id"];
                                        if($pp===$_SESSION["id"]){
                                            echo '<h5>';
                                            echo "You";
                                            echo '</h5><br><p>';
                                        }else{
                                            $sql = "select name from users where id='$pp' limit 1";
                                            $ts = mysqli_query($conn,$sql);
                                            if($ts){
                                                while($rw = mysqli_fetch_assoc($ts)){
                                                    echo '<h5>';
                                                    echo $rw["name"];
                                                    echo '</h5><br><p>';
                                                }
                                            }
                                        }
                                        
                                    
                                        
                                        echo $row["comment"];
                                        echo '<br></p></div><br>';
                                    }
                                }else{
                                    echo "database failed";
                                }
                                mysqli_close($conn);
                            ?>
                            
                        </div>

                        <!-- <div class="comment mt-3 text-justify">
                            <h5>Jhon Doe</h5>
                            <br>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                        </div>
                        <div class="comment mt-3 text-justify">
                            <h5>Jhon Doe</h5>
                            <br>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                        </div> -->
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4">
                        <form id="algin-form">
                            <div class="form-group">
                                <h5>Leave a comment</h5>
                                <label for="message">Message</label>
                                <textarea name="msg" id="msg" cols="30" rows="3" class="form-control"
                                    style="background-color: black;color: white;"></textarea>
                            </div>
                        </form>
                        <div class="form-group">
                            <button type="button" id="post" class="btn" onclick="submitcomment()">Post Comment</button>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="footer">
        <p>Footer</p>
    </div>
</body>
<script src="../static/js/bootstrap.min.js"></script>
<script>
    function submitcomment() {
        let comm = document.getElementById("msg").value;
        if (comm.length == 0) {
            window.alert("Empty comment");
            return;
        } 
        else {
            let xhttp = new XMLHttpRequest();
            let url = 'http://localhost/proj/infected/addcomment.php';
            let params = "comm=";
            params = params+ comm;
            xhttp.open('POST', url, true);

            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    let container = document.getElementById('comms');
                    let ncmn = document.createElement("div");
                    ncmn.setAttribute("class","comment mt-3 text-justify");
                    ncmn.innerHTML = "<h5>You</h5><p>" + comm + "</p>";
                    container.insertBefore(ncmn, container.firstChild);
                }
            }
            xhttp.send(params);
        }
    }
</script>

</html>