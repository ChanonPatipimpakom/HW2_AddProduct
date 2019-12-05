<?php
    include("conproduct.php");
    //echo ini_get("upload_max_filesize")."<br>";
    $allowType=["jpg","jpeg","gif","png","tif","tiff"];
    $fileType=explode("/",$_FILES["filePic"]["type"]);
    $size = $_FILES["filePic"]["size"]/1024/1024;
    
    if(!in_array($fileType[1],$allowType)){
        //เมื่ออัพโหลดไฟล์ที่ไม่ตรงกัน
        echo "Non-image file is not allowed";
    }
    else if($size>1.00){
        echo "file size exceeds the maximun treshold.";
    }
    else{
        $name = $_POST['txtName'];
        $desc = $_POST['txtDescrip'];
        $price = $_POST['txtPrice'];
        $unitInStock = $_POST['txtStock'];
        $filename = $_FILES["filePic"]["name"];
        /*echo "Name: ".$_FILES["filePic"]["name"] . "<br>";
        echo "Size: ".$_FILES["filePic"]["size"] . "<br>";
        echo "Temp name: ".$_FILES["filePic"]["tmp_name"] . "<br>";
        echo "Error: ".$_FILES["filePic"]["error"] . "<br>";*/

        move_uploaded_file($_FILES["filePic"]["tmp_name"],"image/".$_FILES["filePic"]["name"]);

            if(isset($_POST['rdoType'])){
                $menu = $_POST['rdoType'];
            }
            else{
                $menu="";
            }
            switch($menu){
                case "com":{
                    $page = "product";
                    //echo $page;
                    break;
                }
                case "food":{
                    $page = "product2";
                    //echo $page;
                    break;
                }
                case "cloth":{
                    $page = "product3";
                    //echo $page;
                    break;
                }
                default:{
                    $page = "product";
                }
            }
        $sqlInsert = "INSERT INTO $page (name,description,price,unitInStock,picture) VALUE('$name', '$desc', '$price', '$unitInStock', '$filename')";

        //echo $sqlInsert;
        $result = $conn->query($sqlInsert);
            if($result){
                echo "<script> alert('Inser Product Complete'); </script>"; 
                header("Location: index.php");
            }
            else{
                echo "Error during insert product: ".$conn->error;
            }
    }
?>