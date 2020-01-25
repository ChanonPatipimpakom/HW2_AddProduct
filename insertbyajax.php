<?php
    session_start();
    include("connect.php");
    $name = $_POST['txtname'];
    $desc = $_POST['txtdesc'];
    $price = $_POST['txtprice'];
    $unit = $_POST['txtstock'];
    $cate = $_POST['txtcate'];
    
    $sql = "INSERT INTO product (name,description,price,unitInStock,picture,category) VALUES('$name', '$desc', $price, $unit, ' ', $cate)";

    $result = $conn->query($sql);

    $res = array();
    if(!$result){
        $id =-1;
        $msg = "Error on insert".$conn->error; 
    }
    else{
        $id = $conn->insert_id;
        $msg = "Insert complete";
    }
    $res['id']=$id;
    $res['msg']=$msg;

    $json = json_encode($res);
    echo $json;
?>