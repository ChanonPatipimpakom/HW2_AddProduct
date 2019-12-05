<?php
    //connect database
    $conn = new mysqli("localhost","root","12345678","product");
    if($conn->connect_errno){
        die("connection failed :".$conn->connect_error);
    }
?>