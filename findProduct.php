<?php
    include("connect.php");
    $pid=$_POST['pid'];
    $sql = "SELECT * FROM product WHERE id=?";

    //prepare
    $stmt = $conn->stmt_init();
    $stmt->prepare($sql);

    //bind parameter
    $stmt->bind_param('i',$pid);
    
    //execute
    $stmt->execute();
    $result = $stmt->get_result();

    $prd=array();
    if($result->num_rows>0){
        $prd=$result->fetch_array();
    }
    else{
        $prd["name"]="Product no found";
        $prd["price"]=0;
    }
    
    $json = json_encode($prd);

    echo $json;

?>