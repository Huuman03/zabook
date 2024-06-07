<?php

session_start();
if(empty($_SESSION['idtk'])){
    header("location: sigin.php");
    
}

$idtk=$_SESSION['idtk'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/datten.css">
    <title>Zabook</title>
</head>
<body style="position: relative;">
    <div style="position: absolute;
    left: 50%;
    transform: translate(-50%);">
<form enctype="multipart/form-data" method="POST" >
    <div style="width: 1329px; height: 1000px;">
        <div class="header">

        <img src="./img/avatar.png" alt="" class="avat">

        <input type="text" placeholder="Tìm kiếm" class="timkiem" >

        <img src="./img/add.png" alt="" class="icon">
        <img src="./img/chuong.png" alt="" class="icon">
        <img src="./img/mess.png" alt="" class="icon">
        <img src="./img/home.png" alt="" class="icon">

            
        </div>

        <div class="gg" style="text-align: center;">
        <span style="font-size: 40px; font-weight: bold;">Hãy Đặt tên của bạn</span>
         <span style="font-size: 20px;">(Bắt buộc)</span>
        <br>
        <br>
        <br>
        <input type="text" name="ten" placeholder="Họ và tên" style="width: 400px; height: 30px;
        font-size: 20px;">
        <br>
        <input type="submit" name="dat" value="Đặt tên" class="nut" >
        </div>

        <div class="header">
            <img src="./img/logo.jpg" alt="" class="avat">

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <span class="zab">Zabook</span> &nbsp;
            <span class="noi"> nơi mọi người kết nối với nhau</span>

            <div style="margin-top: 10px; margin-right: 40px;">
                <span class="noi" style="float: right; color: aliceblue;
            font-size: 25px;"> Nguyễn Hữu Mẫn</span>
            <span class="zab" style="font-size: 20px; float: right;">
                Người phát triển: </span>
            </div>
        </div>

    </div>
    </form>
    <?php
    include('control.php');
    $get_data=new datadoan();

    if(isset($_POST['dat'])){
        $in_da=$get_data->datten($_POST['ten'],$idtk);
        
        if($in_da)
        {
            $in_da=$get_data->id($idtk);
            foreach($in_da as $i_da)
            {
            if(empty($i_da['avatar'])){
                echo "<script> alert('Đặt tên thành công');
                window.location='avatar.php'</script>";
            }
            else {
                echo "<script> alert('Đặt tên thành công');
                window.location='index.php'</script>";
            }  
            }
        }
        else echo "<script> alert ('Đặt tên thất bại!'); </script>";
        
        
        
    }

    ?>
    </div>
</body>
</html>