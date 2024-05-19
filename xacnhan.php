<?php
session_start();
include('control.php');
    
    $get_data=new datadoan();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/datten.css">
    <title>Document</title>
</head>
<body >

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

        
              <?php
              echo $_SESSION['maxn'];
              if(isset($_POST['xacnhan'])){
                if($_SESSION['maxn']==$_POST['maxn']){
                    
                    $in_da=$get_data->insertda($_SESSION['name'],$_SESSION['pass'],$_SESSION['email'],
                    $_SESSION['ngay'],$_SESSION['gioitinh'],$_SESSION['check']);
                        echo "<script> alert ('Tạo tài khoản thành công'); 
                        window.location='sigin.php'</script>";
                }
                else{
                    echo "<script> alert ('Mã xác nhận không đúng!'); </script>";
                }
                
              }
?>
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
    

   
    
</body>
</html>