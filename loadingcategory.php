<?php
    include("connect.php");
    $parent = $_GET['parent'];

    $sql = "SELECT * FROM category2 WHERE parentID=$parent";
    $result = $conn->query($sql);
    $category=array();
    if($result){
        while($c=$result->fetch_object()){
            $category[]=$c;
        }
    }
    else{
        $category["msg"]="Error on loading data";
    }
    $json = json_encode($category);
    echo $json;  
?>