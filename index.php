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
    <link rel="stylesheet" href="css/index.css">
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
                    <a href="checkavatar.php" class="profile"
                        ><div class="prf">
                        Xem ảnh đại diện
                        </div></a><br><br>
                    <a href="upinfor.php" class="profile"
                        ><div class="prf">
                        Sửa thông tin
                        </div></a><br><br>
                    <?php if($idtk!='1')
                    { ?>
                    
                        <a href="deleteuser.php"  
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

            <a href="index.php">
            <img src="./img/home.png" alt="" class="icon"></a>
            </div>

            
        </div>
        
        <div class="than">   
        <div class="baiviet">
            
        <h1 class="chao">Tạo bài viết</h1>
        
        <input type="file" placeholder="Ảnh cho bài viết" class="imgbv" name="img">
        <input type="text" placeholder="Nội dung bài viết" class="imgbv" name="noid" style="width: 500px;">
        <input type="submit" name="addbv" value="Thêm bài viết" class="imgbv">
        <?php
        
        if(isset($_POST['addbv']))
        {
            
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $time=date('H:i  d-m-20y');
            if(empty($_POST['noid']))
            {
                echo "<script> alert('Bạn chưa nhập nội dung!'); </script>";
            }
            else
            {
            move_uploaded_file($_FILES['img']['tmp_name'],
            'upload/'.$_FILES['img']['name']);
            
            $in_da=$get_data->insertbv($idtk,$_POST['noid'],$_FILES['img']['name'],
            $time);
            if($in_da){
                echo "<script> alert('Tạo bài viết thành công'); </script>";
            }
            else echo "<script> alert ('Tạo bài viết không thành công'); </script>";
            }
        }
        ?>
        </div>

        <div>
        <h1 class="chao2" style="border-top-left-radius: 50px;"
        >Các bài viết trên thế giới</h1> 
        <div id="inbv" style="float: left;">
        

            <?php
            $data_bv=$get_data->selectbv();     
            foreach ($data_bv as $i_bv)
            {   
            ?>
            <div class="allbv">
                <?php
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

                        if($idtk=='1')
                        {
                            
                            ?>
                            <a href="deletepost.php?delbv=<?php echo $i_bv['idbv']?>&idtk=<?php echo $idtk?>" 
                            class="xoa"  onclick="if(confirm('Bạn có chắc muốn xóa'))return true;
                            else return false";>Xóa</a>
                            <?php
                            }
                        else
                        {
                            if($idtk==$i_bv['idtk'])
                            {
                            ?>
                            <a href="deletepost.php?delbv=<?php echo $i_bv['idbv']?>&idtk=<?php echo $idtk?>" 
                            class="xoa"  onclick="if(confirm('Bạn có chắc muốn xóa'))return true;
                            else return false";>Xóa</a>
                            <?php
                            }
                        }
                        ?>

                    </div>
                    <?php
                } 
                ?>
        
            <div>
            <br>
            &nbsp;&nbsp;<span style="font-size: 30px;"><?php echo $i_bv['noidung'] ?></span>
            <?php
            if(empty($i_bv['baiviet']))
            {}
            else
            {
                ?>
                <a href="connimgpost.php?imgbv=<?php echo $i_bv['idbv']?>">
                <img src="upload/<?php echo $i_bv['baiviet'] ?>" alt="" style="height: 100%; width: 100%;">
                
                <div class="phanxet">
                    <span>Phán xét</span>
                </div>
            </a>
                <?php
            }
            ?>
            </div>  
            </div>
            <?php
            }
            ?>
        </div>
        </div>
        
       <div style="float: right; margin-top: -56px;">
         <h1 class="chao2" style="border-top-left-radius: 50px;"
        >Các bài viết của tôi</h1> 
        <div id="inbv" style="float: right;">
            <?php
            $data_bv=$get_data->selectbv();
            foreach ($data_bv as $i_bv)
            {
            if($idtk==$i_bv['idtk'])
            {
            ?>
            <div class="allbv">
            <?php
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
                    <a href="deletepost.php?delbv=<?php echo $i_bv['idbv']?>&idtk=<?php echo $idtk?>" 
                    class="xoa"  onclick="if(confirm('Bạn có chắc muốn xóa'))return true;
                    else return false";>Xóa</a>
                </div>
                <?php
            } 
            ?>
        
            <div>
            <br>
            &nbsp;&nbsp;<span style="font-size: 30px;"><?php echo $i_bv['noidung'] ?></span>
            <?php
            if(empty($i_bv['baiviet']))
            {}
            else
            {
                ?>
                <a href="connimgpost.php?imgbv=<?php echo $i_bv['idbv']?>">
                <img src="upload/<?php echo $i_bv['baiviet'] ?>" alt="" style="height: 100%; width: 100%;">
                </a>
                <?php
            }
            ?>
            </div>  

            </div>
            <?php
            }
            }
            ?>
        </div>
        </div>
        
        </div>

        <div class="header" style="margin-top: 1030px;">
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