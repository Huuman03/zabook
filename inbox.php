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
    <link rel="stylesheet" href="css/inbox.css">
    <title>Zabook</title>
</head>
<body style="position: relative;">
    <div style="position: absolute;
    left: 50%;
    transform: translate(-50%);">
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


        
        <div style="height: 800px;">
        <div class="baiviet">

                <h1 class="chao" style="margin-top: 0; margin-left: 0; text-align: center;
                padding-left: 400px;">Tin nhắn</h1>
    
                <div style="float: left;" class="cuonib"> 
            <?php
            $data_tn=$get_data->selectda();
            foreach ($data_tn as $i_tn)
            {
                if($_SESSION['idtk']!=$i_tn['id'])
                {
                ?>
                <a href="trunggian.php?idnn=<?php echo $i_tn['id'] ?>"
                 style="text-decoration: none;">
                <div class="alltn">
                
                <img src="upload/<?php echo $i_tn['avatar'] ?>" alt="" class="avat" 
                style="border-radius: 50%;width: 50px; height: 50px; margin-top: -1px;
                border: none;">  <!--Avatar -->
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
        
            <div class="inb">
                <?php
            $data_tn=$get_data->id($_SESSION['idnn']);
            foreach ($data_tn as $i_tn)
            {
                
                    ?>
                <div style="width: 100%; height: 70px; 
                background-color: chocolate; border-radius: 10px;
                border-bottom-left-radius: 0; border-bottom-right-radius: 0;"> 
                    <div >
            
                        <img src="upload/<?php echo $i_tn['avatar'] ?>" alt="" class="avat" 
                        style="border-radius: 50%;width: 65px; height: 65px; border: none;
                        margin-left: 10px; margin-top: 2px; ">  <!--Avatar -->
                        <br>
                        &nbsp;&nbsp;&nbsp;
                        <span style="font-size: 25px; font-weight: bold;"> <!--name -->
                            <?php echo $i_tn['ten'] ?></span>
                            <a href="deletetn.php" class="xoaalltn"
                            onclick="if(confirm('Bạn có chắc muốn xóa tất cả tin nhắn với người này!')) return true;
                            else return false";>
                                
                                Xóa tất cả tin nhắn với người này</a>
                         </div>
                         
                </div>
                
                <?php
                
                
            }
            ?>
                

                <div style="width: 100%; height: 568px;" class="cuontn">
                <?php
                    $data_tn=$get_data->selecttn();
                    foreach ($data_tn as $i_tn)
                    {
                        
                        if($idtk==$i_tn['idng'])
                        {
                            if($_SESSION['idnn']==$i_tn['idnn'])
                            {
                                ?>
                                    <div style="float: right; margin-right: 5px; font-size: 30px;
                                    background: blue; padding: 10px; color: aliceblue;
                                    border-radius: 30px;">
                                    <?php
                                        echo $i_tn['ndtn'];
                                        $i_tn['idng']="";
                                    ?>
                                    </div>
                                    <br><br><br><br>
                                    <?php
                            }
                        }
                        

                        
                        if($idtk==$i_tn['idnn'])
                        {
                            if($_SESSION['idnn']==$i_tn['idng'])
                            {
                                ?>
                                <div style="float: left; margin-left: 5px; font-size: 30px;
                                    background: green; padding: 10px; color: aliceblue;
                                    border-radius: 30px;"
                                >
                                <?php
                                    echo $i_tn['ndtn'];
                                ?>
                                </div>
                                <br><br><br><br>
                                <?php
                            }
                        }
                        
                    }


                ?>
                </div>

                <div style="width: 100%; height: 40px; margin-left: 2px; ">
                    <input type="text" placeholder="Nội dung tin nhắn" name="ndtn"
                    style="width: 90%; float: left; height: 91%; font-size: 20px;
                    border-radius: 10px;">
                    <input type="submit" value="Gửi" name="gui"
                    style="width: 81px; height: 99%; float: left; 
                    font-size: 20px; font-weight: bold; margin-left: 2px; border-radius: 10px;">
                </div>
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

    <?php
    if(isset($_POST['gui']))
        {
            $idnn=$_SESSION['idnn'];
            $in_gui=$get_data->guitn($_POST['ndtn'],$idtk,$_SESSION['idnn']);
            if($in_gui) echo "<script> 
            window.location='inbox.php' </script>";
            else echo "<script> alert ('Không thành công'); </script>";
        }
    ?>  

</div>
</body>
</html>