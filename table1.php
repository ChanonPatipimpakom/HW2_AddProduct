<?php
    require_once 'vendor/autoload.php';
    ob_start();
    $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
    $fontData = $defaultFontConfig['fontdata'];
    $mpdf = new \Mpdf\Mpdf(['tempDir' =>  __DIR__ .'/tmp',
        'fontdata' => $fontData + [
                'sarabun' => [
                    'R' => 'THSarabun.ttf',
                    'I' => 'THSarabun Italic.ttf',
                    'B' =>  'THSarabun Bold.ttf',
                    'BI' => "THSarabun Bold Italic.ttf",
                ]
            ],
        //'format' => 'A4-L' //ตั้งกระดาษเป็นแนวนอน
    ]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Table</title>
    <link href="https://fonts.googleapis.com/css?family=Sarabun&;display=swap" rel="stylesheet">
<style>
    body {
        font-family: sarabun;
        font-size: 16pt;
    }
    table {
        border-collapse: collapse;
        width: 100%;
        background-color: lightblue;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: white;
    }
</style>
</head>
<body>
<div>
    <h1>Product</h1>
</div>
<table>
    <tr>
        <td style="text-align:center">ID</td>
        <td style="text-align:center">Name</td>
        <td style="text-align:center">Description</td>
        <td style="text-align:center">Price</td>
        <td style="text-align:center">UnitStock</td>
        <td style="text-align:center">Category</td>
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
        <td id="pid-<?php echo $prd->id ?>"><?php echo $prd->id;?></td>
        <td id="pname-<?php echo $prd->id ?>"><?php echo $prd->name;?></td>
        <td id="pdesc-<?php echo $prd->id ?>"><?php echo $prd->description;?></td>
        <td  id="pprice-<?php echo $prd->id ?>"><?php echo $prd->price;?></td>
        <td id="pstock-<?php echo $prd->id ?>"><?php echo $prd->unitInStock;?></td>
        <td id="pcate-<?php echo $prd->id ?>"><?php echo $prd->category;?></td>
    </tr>
    <?php
        }
    }
    ?>
    </tr>
</table>

    <!-- <h1>Chanon, Earththree</h1>
    <table>
        <tr>
            <td style="text-align:center">#</td>
            <td style="text-align:center">Name</td>
            <td style="text-align:center">Lastname</td>
        </tr>
        <tr>
            <td>1</td>
            <td>Chanon</td>
            <td>Patipimpakom</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Napath</td>
            <td>Manpansa</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Tanachit</td>
            <td>Boonkert</td>
        </tr>
        <tr>
            <td>4</td>
            <td>แมว</td>
            <td>มีสี่ขา</td>
        </tr>
    </table> -->

    <?php
        $html = ob_get_contents();
        $mpdf->WriteHTML($html);
        $mpdf->Output("MyPDF.pdf");
        ob_end_flush();
    ?>
    ดาวโหลดรายงานในรูปแบบ PDF <a href="MyPDF.pdf" target="_blank">คลิกที่นี้</a>
</body>
</html>