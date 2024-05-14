<?php

session_start();
if(empty($_SESSION['idtk'])){
    header("location: sigin.php");
    
}
$idtk=$_SESSION['idtk'];
$imgbv=$_SESSION['imgbv'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/imgbv.css">
    <title>Document</title>
</head>
<body >
    <div>
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
        
 <?php//----------------------------------------------------------------?>      
<?php

$data_bv=$get_data->idbv($imgbv);
foreach ($data_bv as $i_bv)
{
$data_idikbv=$get_data->id($i_bv['idtk']);
foreach ($data_idikbv as $i_idtkbv)
{


?>
<div>
                    <img src="upload/<?php echo $i_idtkbv['avatar'] ?>" alt="" class="avat" 
                    style="border-radius: 50%;width: 50px; height: 50px;"> 
                     <br>
                    <span style="font-size: 25px; font-weight: bold; margin-left: 10px;">
                    <?php echo $i_idtkbv['ten'] ?></span>
                    <br>
                    &nbsp;
                    <?php
                    echo $i_bv['time'];
                    
                    ?>
                    
                    <a href="deletebv.php?delbv=<?php echo $i_bv['idbv']?>&idtk=<?php echo $idtk?>" 
                    class="xoa"  onclick="if(confirm('Bạn có chắc muốn xóa'))return true;
                    else return false";>Xóa</a>
                </div>
                <h2 ><?php echo $i_bv['noidung']; ?></h2>
<img src="upload/<?php echo $i_bv['baiviet'] ?>" 
            style="width: 100%; height: 100%;">
<?php
$idbvnew=$i_bv['idbv'];
}}
?>
<div class="phanxet">
    <div class="ndbl">
        <div class="cuonbl">
        <?php
        $data_bl=$get_data->selectbl($idbvnew);
        foreach ($data_bl as $i_bl)
        {
           
        $data_idng=$get_data->id($i_bl['idng'] );
        foreach ($data_idng as $i_idng)
        {
        ?>
        
            <?php
                if($i_bl['idbv']==$imgbv)

                {?>
                <div class="khung">
                    <div >
                    <img src="upload/<?php echo $i_idng['avatar'] ?>" alt="" class="avat" 
                    style="border-radius: 50%;width: 50px; height: 50px;"> 
                     
                    <span style="padding-right: 300px;
                    font-size: 25px; font-weight: bold; margin-left: 10px;">
                    <?php echo $i_idng['ten'] ?></span>

                    <div class="ndbl2"><?php echo $i_bl['ndbl']; ?></span>
                    </div>
                    <br>
                    &nbsp;
                    <?php
                    echo $i_bl['timebl'];
                    ?>
                    
                </div>
                </div>
                <?php
                }
                
                ?>
                
        


        <?php
        }
         
    }
        ?>     
    </div>

    <br>
</div>
    <div class="xuongcuoi">
    <input type="text" name="bl" class="ndbl" placeholder="Nội dung phán xét!">
    <button class="addbl" name="phanxet">Phán xét</button>
    </div>
</div>
<?php
    if(isset($_POST['phanxet'])){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time=date('H:i d-m-20y');
        $in_bl=$get_data->insertbl($imgbv,$idtk,$_POST['bl'],
        $time);
        echo "<script>window.location='imgbv.php'</script>";
    }
?>

<?php//--------------------------------------------------------------?>
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
</div>
</body>
</html>