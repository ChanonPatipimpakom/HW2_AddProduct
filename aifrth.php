<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/loadingoverlay.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>Test AI For Thai</title>
</head>
<body>
    <form action="#" id="frmEmo" method="get">
        <div id="icon"></div>
        <input type="text" id="emoji" class="emoji" name="emoji">
        <button type="submit">OK</button>
        <button type="reset">Clear</button>
    </form>
    <!--<p><input type="text" id="emo"><button type="submit">OK</button></p>-->
    <script>
        $(document).ready(function(){
            $("#frmEmo").submit(function(){
                var apikey = "j9NfikEslKvMnyoBBjiY3URlaeoqcKj9";
                moji_list =[['😊','😄','😁','😆','😀','😊','😃'],
                ['😢','😥','😰','😓','😟','😟','😞','😔','😣','😫','😩'],
                ['😡','😠','😤','😖'],
                ['😒','😒','😑','😕'],
                ['😱'],
                ['😨','😧','😦'],
                ['😮','😲','😯'],
                ['😴','😪'],
                ['😋','😜','😝','😛'],
                ['😍','💕','😘','😚','😙','😗'],
                ['😌'],
                ['😐'],
                ['😷'],
                ['😳'],
                ['😵'],
                ['💔'],
                ['😎','😈'],
                ['😏','😏','😂','😭'],
                ['😬','😅','😶'],
                ['😉'],
                ['💖','💙','💚','💗','💓','💜','💘','💛'],
                ['😇']];
                //var qty = $("#emo").val();
                $.ajax({
                    url:"https://api.aiforthai.in.th/emoji",
                    data:{"text" : $("#emoji").val()},
                    beforeSend:function(obj){
                        //set header
                        obj.setRequestHeader("Apikey",apikey);
                        obj.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
                    },
                    type:"get",
                    dataType:"json",
                    success:function(res){
                        console.log(res);
                        const keys = Object.keys(res);
                        for(const k of keys){
                            console.log(moji_list[k][0]);
                            $("#icon").append("<p>" + moji_list[k][0] + "</p>");
                        }
                    }
                });
            });
            
            // $.ajax({
            //     url:"https://api.aiforthai.in.th/emoji",
            //     data:{"text" : qty},
            //     beforeSend:function(obj){
            //         //set header
            //         obj.setRequestHeader("Apikey",apikey);
            //         obj.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            //     },
            //     type:"get",
            //     dataType:"json",
            //     success:function(res){
            //         console.log(res);
            //     }
            // });
        });
    </script>
</body>
</html>