<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>คิดเงิน</title>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/loadingoverlay.min.js"></script>
</head>
<body>
    <h1>คิดราคาสินค้า</h1>
    <form action="#" method="post" id="frmProduct">
        <p>
            รหัสสินค้า:<input type="text" name="pid" id="pid">
        </p>
        <p>
            จำนวน:<input type="text" name="qty" id="qty">
        </p>
        <p>
            ชื่อสินค้า:<input type="text" name="pname" id="pname">
        </p>
        <p>
            ราคา/หน่วย:<input type="text" name="pprice" id="pprice">
        </p>
        <p>
            จำนวนเงิน:<input type="text" name="total" id="total">
        </p>
        <p>
            <button type="submit">Find!</button>
            <button type="reset">Clear!</button>
        </p>
    </form>
    <script>
        $(document).ready(function(){
            $("#frmProduct").submit(function(){
                $.ajax({
                    url:"findProduct.php",
                    type: "post",
                    data: {
                        pid: $("#pid").val()
                    },
                    dataType:"json",
                    timeout:5000,
                    beforeSend:function(){
                        $.LoadingOverlay('show',{
                            image:'image/clock-loading.gif',
                            background:'rgba(200,200,200,0.6)',
                            text:'Searching...',
                            textResizeFactor:0.15
                        });
                    },
                    success:(res)=>{
                        //console.log(res);
                        $("#pname").val(res.name);
                        $("#pprice").val(res.price);
                        var qty = ($("#qty").val())*1;
                        var total = res.price * qty;
                        $("#total").val(total);
                    },
                    complete:()=> $.LoadingOverlay('hide')
                });
                return false;
            });
        });
    </script>
</body>
</html>