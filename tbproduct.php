<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div><h1>All Product</h1></div>
    <center>
    <table width="70%" border="1">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Description</td>
            <td>Price</td>
            <td>UnitStock</td>
            <td>Delete</td>
        <?php
        include("connect.php");
        $sql = "SELECT * FROM product ORDER BY id";
        //include($page);
        $result = $conn->query($sql);
        if(!$result){
            echo "Error During Retrival";
        }
        else {
            while($prd=$result->fetch_object()){
        ?>
        <tr>
            <td><?php echo $prd->id;?></td>
            <td><?php echo $prd->name;?></td>
            <td><?php echo $prd->description;?></td>
            <td><?php echo $prd->price;?></td>
            <td><?php echo $prd->unitInStock;?></td>
                <td><a href="#" class="del" data-id="<?php echo $prd->id;?>">[Del]</a></td>
        </tr>
        <?php
            }
        }
        ?>
        </tr>
    </table>
    </center>
<script>
$(document).ready(function(){
    $(".del").click(function(){
        alert($(this).data("id"));
    });
});
</script>
</body>
</html>