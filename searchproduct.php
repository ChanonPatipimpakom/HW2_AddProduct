<?php
    session_start();
    include("connect.php");
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
    <title>Jaidee Shop</title>
</head>
<body>
    <nav class="navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Markus Shop</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="index.php?menu=all">หน้าหลัก</a></li>
                    <li><a href="#">เกี่ยวกับ</a></li>
                    <li><a href="newpro.php">เพิ่มสินค้า</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-left">
                    <li  class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            สินค้าของเรา <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="showproduct.php?category=1">Computer</a></li>
                            <li><a href="showproduct.php?category=2">Food</a></li>
                            <li><a href="showproduct.php?category=3">Clothes</a></li>
                        </ul>
                    </li>
                    <li><a href="searchproduct.php">ค้นหา</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                        if(isset($_SESSION['id'])){
                    ?>
                    <li  class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="glyphicon glyphicon-user"></i>
                            <?php echo $_SESSION['name'];?> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">โปรไฟล์</a></li>
                            <li><a href="#">รายการสั่งซื้อ</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="logout.php">ออกจากระบบ</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" >
                            <i class="glyphicon glyphicon-shopping-cart"></i> (0)
                        </a>
                    </li>
                    <?php
                        } 
                        else{
                    ?>
                    <li><a href="login.php">เข้าสู่ระบบ</a></li>
                    <li><a href="register.php">สมัครสมาชิก</a></li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <h2>Search Product</h2>
            <div class="col-md-12">
                <form action="" method="post">
                    <div class="col-md-2">
                    <select name="searchCol" id="" class="btn btn-warning">
                        <option value="1">ชื่อสินค้า</option>
                        <option value="2">รายละเอียด</option>
                        <option value="3">ราคาสูงสุด</option>
                    </select>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="txtSearch" placeholder="Search">
                    </div>
                    <div>    
                        <button name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Go! Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
        if(isset($_POST['submit'])){
            $searchCol = $_POST['searchCol'];
            $search = $_POST['txtSearch'];
            $sql = "SELECT * FROM product";
            switch($searchCol){
                case 1: {
                    $sql.= " WHERE name LIKE '%$search%'";
                    break;
                }
                case 2: {
                    $sql.= " WHERE description LIKE '%$search%'";
                    break;
                } 
                case 3: {
                    $sql.= " WHERE price <= '$search'";
                    break;
                }
                default:{
                    $sql.= " WHERE name LIKE '%$search%'";
                }
            }
    ?>
    <div class="container">
        <h3 style="margin-bottom:20px">ผลการค้นหา: <?php echo $_POST['txtSearch']; ?></h3>
        <div class="row">
        <?php
        $result = $conn->query($sql);
        if(!$result){
            echo "Error During Retrival";
        }
        else{
            //ดึงข้อมูล
            while($prd=$result->fetch_object()){
                $prd->id; //$prd["id]
        ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="thumbnail">
                    <a href="productdetail.php?pid=<?php echo $prd->id;?>">
                        <img src="image/<?php echo $prd->picture;?>" alt="">
                    </a>
                    <div class="caption">
                    <h3><?php echo $prd->name;?></h3>
                    <p><?php echo $prd->description;?></p>
                    <p><Strong>Price: </Strong><?php echo $prd->price;?><Strong> Bath</Strong></p>
                    <p><Strong>Qty: </Strong><?php echo $prd->unitInStock;?></p>
                    <p>
                        <a href="#" class="btn btn-info">Add To Basket</a>
                        <a href="editproduct.php?pid=<?php echo $prd->id?>" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
                        <a href="deleteproduct.php?pid=<?php echo $prd->id?>" class="btn btn-danger linkDelete"><i class="glyphicon glyphicon-trash"></i></a>
                    </p>
                    </div>
                </div>
            </div>
            <?php
                }
            }
        ?>
        </div>
    </div>
    <?php
        }
    ?>
</body>
</html>