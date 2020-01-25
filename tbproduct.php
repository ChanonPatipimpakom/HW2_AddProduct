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
    <script src="js/loadingoverlay.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div><h1>All Product</h1></div>
    <center>
    <table width="70%" border="1" id="tbpro">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Description</td>
            <td>Price</td>
            <td>UnitStock</td>
            <td>Category</td>
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
        <tr id="row-<?php echo $prd->id;?>">
            <td><?php echo $prd->id;?></td>
            <td><?php echo $prd->name;?></td>
            <td><?php echo $prd->description;?></td>
            <td><?php echo $prd->price;?></td>
            <td><?php echo $prd->unitInStock;?></td>
            <td><?php echo $prd->category;?></td>
            <td>
                <a href="#" class="del" data-id="<?php echo $prd->id;?>">[Del]</a>
            </td>
        </tr>
        <?php
            }
        }
        ?>
        </tr>
    </table>
    </center>
    <h3>Add Product</h3>
    <form action="#" method="post" id="frmProduct">
        <p>Name: <input type="text" name="txtname" id="txtname"></p>
        <p>Description: <input type="text" name="txtdesc" id="txtdesc"></p>
        <p>Price: <input type="text" name="txtprice" id="txtprice"></p>
        <p>Stock: <input type="text" name="txtstock" id="txtstock"></p>
        <p>Category: <input type="text" name="txtcate" id="txtcate"></p>
        <p>
            <button type="submit">OK</button>
        </p>
    </form>
<script>
$(document).ready(function(){
    $(".del").click(function(){
        var pid = $(this).data("id");
        //alert($(this).data("id"));
        $.ajax({
            url:"deletebyajax.php",
            type:"get",
            data:{ 'pid' : pid},
            datatype:"text",

            beforeSend:function(){
                $.LoadingOverlay('show',{
                    image:'image/clock-loading.gif',
                    background:'rgba(200,200,200,0.6)',
                    text:'Searching...',
                    textResizeFactor:0.15
                });
            },

            success:(msg)=>{
                alert(msg);
                //find to remove
                var rowid ="#row-"+ pid;
                $(rowid).remove();
            },
            complete:()=> $.LoadingOverlay('hide')
        });
    });
    $("#frmProduct").submit(function(){
        $.ajax({
            url:"insertbyajax.php",
            type:"post",
            data: $(this).serializeArray(),
            dataType: "json",
            success:(res)=>{
                if(res.id!=-1){
                    alert(res.msg);
                    var pname = $("#txtname").val();
                    var desc = $("#txtdesc").val();
                    var price = $("#txtprice").val();
                    var stock = $("#txtstock").val();
                    var category = $("#txtcate").val();
                    var link =  '<a href="#" class="lnkDel" data-id="'+res.id+'">[Del]</a>';
                    var tr = "<tr>";
                        tr = tr + "<td>" + res.id + "</td>";
                        tr = tr + "<td>" + pname + "</td>";
                        tr = tr + "<td>" + desc + "</td>";
                        tr = tr + "<td>" + price + "</td>";
                        tr = tr + "<td>" + stock + "</td>";
                        tr = tr + "<td>" + category + "</td>";
                        tr = tr + "<td>" + link + "</td>";
                    tr = tr + "</tr>";
                    $("#tbpro").append(tr);
                    $("#txtname").val('');
                    $("#txtdesc").val('');
                    $("#txtprice").val('');
                    $("#txtstock").val('');
                    $("#txtcate").val('');
                }
                else{
                    alert("Error Not Complete");
                }
            }
        });
        return false;
    });
});
</script>
</body>
</html>