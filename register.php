<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>Register</title>
</head>
<body>
    <?php
        //รับข้อมูลจาก register
        include("connect.php");
        if(isset($_POST['submit'])){ //check if it is posted back
            // รับข้อมูล
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            $password = md5($conn->real_escape_string($_POST['password']));
            $email = $_POST['email'];

            //insert to table
            $sqlInsert = "INSERT INTO customer (firstname, lastname, username, password, email, active) VALUE('$firstname','$lastname','$username','$password','$email','0')";

            $result = $conn->query($sqlInsert);
            if($result){
                //เมื่อ register สำเร็จ
                echo "<script> alert('Register Complete'); </script>"; 
                header("Location: login.php");
            }
            else{
                echo "Error during insert: ".$conn->error;
            }
            //echo $sqlInsert;
            //test
            //echo "$firstname $lastname $username $password $email";
        }
    ?>
    <div class="container">
        <div class="row">
            <form action="" method="post">
                <div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
                    <div class="panel panel-danger">
                        <div class="panel-heading text-center">
                            สมัครสมาชิก
                        </div>
                        <div class="panel-body">
                            <div class="form-group row">
                                <label for="firstname" class="col-md-3">Firstname</label>
                                <div class="col-md-9">
                                    <input type="text" name="firstname" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastname" class="col-md-3">Lastname</label>
                                <div class="col-md-9">
                                    <input type="text" name="lastname" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-md-3">Username</label>
                                <div class="col-md-9">
                                    <input type="text" name="username" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-3">Password</label>
                                <div class="col-md-9">
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                            <!--<div class="form-group row">
                                <label for="com_password" class="col-md-3">Comfirm Password</label>
                                <div class="col-md-9">
                                    <input type="password" name="com-pass" class="form-control">
                                </div>
                            </div>-->
                            <div class="form-group row">
                                <label for="email" class="col-md-3">E-mail</label>
                                <div class="col-md-9">
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-warning btn-block" name="submit">Sign Up</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>