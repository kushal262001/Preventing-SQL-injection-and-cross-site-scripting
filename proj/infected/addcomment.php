<?php
session_start();
include "connection.php";

function cleanString($st){
    $chars = str_split($st);

    $newst="";
    foreach ($chars as $char) {
        if($char==='<'){
            $newst = $newst."&lt;";
        }else if($char==='>'){
            $newst = $newst."&gt;";
        }else {
            $newst = $newst.$char;
        }
    
    }
    return $newst;
}

if(isset($_SESSION["id"]) and isset($_POST["comm"])){
    $comment = $_POST["comm"];
    $uid = $_SESSION["id"];
    // $comment = htmlspecialchars($comment);
    // $comment = cleanString($comment);
    
    $sql = "INSERT into comments (comment,id) values ('$comment','$uid');";
    echo $sql;
    $result = mysqli_query($conn,$sql);
}
echo "hello";
mysqli_close($conn);
?>