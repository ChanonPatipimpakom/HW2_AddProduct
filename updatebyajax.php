<?php
    include("connect.php");
    $name = $_POST['txtname'];
    $desc = $_POST['txtdesc'];
    $price = $_POST['txtprice'];
    $unit = $_POST['txtstock'];
    $cate = $_POST['txtcate'];
    $pid = $_POST['hdnPid'];

    $sql = "UPDATE product SET name='$name', description='$desc', price='$price', unitInStock='$unit', category='$cate' WHERE id='$pid'";

    $result = $conn->query($sql);

    $res = array();
    if(!$result){
        $id =-1;
        $msg = "Error on insert".$conn->error; 
    }
    else{
        $id = $pid;
        $msg = "update complete";
    }
    $res['id']=$id;
    $res['msg']=$msg;

    $json = json_encode($res);
    echo $json;
?>