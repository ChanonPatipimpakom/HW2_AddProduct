<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/loadingoverlay.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <!--Main-->
    <p><storng>Main Category</storng>
    <select name="ddlCategory" id="ddlCategory">
        <option value="">--เลือก--</option>
    </select></p>
    <!--Sub-->
    <p><storng>Sub Category</storng>
    <select name="ddlSubCategory" id="ddlSubCategory">
        <option value="">--เลือก--</option>
    </select></p>
    <script>
        $(document).ready(function(){
            //load main category
            $.ajax({
                url:"loadingcategory.php",
                data:{ "parent" : 0 }, //paerntID
                type:"get",
                dataType:"json",
                success:(res)=>{ //รูปย่อ Function
                    $(res).each((index,data)=>{
                        var option = $("<option/>");
                        option.attr("value",data.id).text(data.name); //id name จากฐานข้อมูล
                        $("#ddlCategory").append(option); //ต่อท้ายข้อมูลของ Dropdown
                    });
                },
                beforeSend:function(){
                    $.LoadingOverlay('show',{
                        image:'image/blueloading.gif',
                        background:'rgba(200,200,200,0.6)',
                        text:'Searching...',
                        textResizeFactor:0.15
                    });
                },
                complete:()=> $.LoadingOverlay('hide')
            });
            $("#ddlCategory").change(function(){
                var parent = $(this).val();
                $.ajax({
                    url:"loadingcategory.php",
                    data:{ "parent" : parent }, //paerntID
                    type:"get",
                    dataType:"json",
                    success:(res)=>{
                        $("#ddlSubCategory").empty(); //clear subcategory
                        $("#ddlSubCategory").append("<option>--เลือก--</option>");
                        $(res).each((index,data)=>{
                            var option = $("<option/>");
                            option.attr("value",data.id).text(data.name); //id name จากฐานข้อมูล
                            $("#ddlSubCategory").append(option); //ต่อท้ายข้อมูลของ Dropdown
                        });
                    },
                    beforeSend:function(){
                        $.LoadingOverlay('show',{
                            image:'image/load.gif',
                            background:'rgba(200,200,200,0.6)',
                            text:'Searching...',
                            textResizeFactor:0.15
                        });
                    },
                    complete:()=> $.LoadingOverlay('hide')
                });
            });
        });
    </script>
</body>
</html>