<?php 
    session_start();
    include("connect.php");
    $pid = $_POST['hdnProductId'];
    $name = $_POST['txtName'];
    $desc = $_POST['txtDescrip'];
    $price = $_POST['txtPrice'];
    $unitInStock = $_POST['txtStock'];
    $tcategory = $_POST["rdoType"];
    //$filename = $_FILES["filePic"]["name"];

    $sql = "UPDATE product SET name='$name', description='$desc', price=$price, unitInStock=$unitInStock, category=$tcategory WHERE id = $pid";
    //echo $sql;
    $result = $conn->query($sql);
        if(!$result){
            echo "Error during update product: ".$conn->error;
        }
        else{
            header("Location: index.php");
        }
?>