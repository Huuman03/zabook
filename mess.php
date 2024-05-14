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
    <link rel="stylesheet" href="css/mess.css">
    <title>Document</title>
</head>
<body >
<?php
    include('control.php');
    
    $get_data=new datadoan();
    $data_update=$get_data->id($idtk);
    foreach ($data_update as $i_da)

?>

<form enctype="multipart/form-data" method="POST" >
    <div style="width: 1329px; height: 1000px;">
    <div class="header">

<div id="menu">
    <?php
        if(!empty($i_da['avatar'])){
            ?>
           <img src="upload/<?php echo $i_da['avatar'] ?>" alt="" class="avat"
            style="border-radius: 50%;">
            <?php 
        }
        else {
            ?>
            <img src="./img/avatar.png" alt="" class="avat"
            style="border-radius: 50%;">
            <?php
        }
    ?>
    
    
    <div id="submenu" >
        <div border="2px">
        <br><br>
        <a href="avatar.php" class="profile"
            ><div class="prf">
            Thay ảnh đại diện
            </div></a><br><br>
        <a href="xemavatar.php" class="profile"
            ><div class="prf">
            Xem ảnh đại diện
            </div></a><br><br>
        <a href="upinfor.php" class="profile"
            ><div class="prf">
            Sửa thông tin
            </div></a><br><br>
        <?php if($idtk!='1')
        { ?>
        
            <a href="xoatk.php"  
            onclick="if(confirm('Bạn có chắc muốn xóa tài khoản vĩnh viễn!')) return true;
            else return false"; class="profile"
            style="padding-right: 54px;">
            <div class="prf">Xóa tài khoản</div>
            </a>
        <br><br>
           <?php
           }
        else
        {
            ?>
            <a href="admin.php" class="profile" >
                <div class="prf">Quản lý tài khoản</div></a><br><br>
            <?php
        }
            ?>
        <a href="sigin.php" class="profile"
        ><button class="prf" name="dangxuat">Đăng xuất</button></a>
        <?php
        if(isset($_POST['dangxuat']))
        {
            
            unset($_SESSION['idtk']);
            header('location: sigin.php');
        }

        ?>
        <br><br>
        </div>
    </div>
</div>

<div class="user"> 
    <span><?php echo $i_da['ten'] ?></span>&nbsp;
</div>

<div>
<input type="text" placeholder="Tìm kiếm" class="timkiem" >

<img src="./img/add.png" alt="" class="icon">
<img src="./img/chuong.png" alt="" class="icon">

<a href="mess.php">
<img src="./img/mess.png" alt="" class="icon"></a>

<a href="trangchinh.php">
<img src="./img/home.png" alt="" class="icon"></a>
</div>


</div>

        
        <div class="baiviet">
        <h1 class="chao" style="margin-top: 0; margin-left: 0; text-align: center;
                padding-left: 400px;">Tin nhắn</h1>
        <div class="cuonib">

        
        <?php
        $data_tn=$get_data->selectda();
        foreach ($data_tn as $i_tn)
        {
            if($_SESSION['idtk']!=$i_tn['id'])
                {
            ?>
            <a href="trunggian.php?idnn=<?php echo $i_tn['id'] ?>
            " style="text-decoration: none;">
            
            <div class="alltn">
            
            <img src="upload/<?php echo $i_tn['avatar'] ?>" alt="" class="avat" 
            style="border-radius: 50%;width: 70px; height: 70px; margin-top: -11px; 
            border: none; margin-left: -11px;">  <!--Avatar -->
            <br>
            &nbsp;&nbsp;&nbsp;
            <span style="font-size: 25px; font-weight: bold;"> <!--name -->
                <?php echo $i_tn['ten'] ?></span>
                
             </div>
             </a>
                <?php
            
                }
        }
    
        ?>
    </div>
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
</body>
</html>