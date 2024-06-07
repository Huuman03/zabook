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
    <link rel="stylesheet" href="css/upinfor.css">
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

        <div class="giua">
            <h1 style="margin-left: 110px;">SỬA THÔNG TIN</h1>
        <table style="font-size: 20px; margin: 50px;"  >
                    <tr>
                        <td>
                        <span class="text" style="margin-left: 10px;
                        font-weight: bold;">Họ và tên</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            
                        </td>
                        <td>
                            <input type="text" name="ten" placeholder="Họ và tên"
                            value="<?php echo $i_da['ten']?>">
                        </td>
                    </tr>
                    <tr></tr><tr></tr><tr></tr>
                    <tr>
                        <td>
                            &nbsp; <span class="text" style="float: left; margin-left: 10px;
                            margin-top: 10px;">
                                Tài khoản</span><?php 
                                
                                    $hien=0;
                                    $kttk=$i_da['taikhoan'];
                                if(isset($_POST['kiemtra'])){
                                    
                                    
                                    
                                    if($_POST['name']!=$i_da['taikhoan'])
                                    {
                                        $select_dangky=$get_data->selectda();
                                    foreach ($select_dangky as $i_da)
                                        { 
                                            
                                            if($_POST['name']==$i_da['taikhoan'])
                                            {
                                                $kttk=$_POST['name'];
                                                $hien=1;
                                                echo "<script> alert('Tài khoản đã tồn tại!'); </script>";
                                                
                                                break;

                                            } 
                                        }

                                    } 
                                    
                                    if(strlen($_POST['name']!='admin')){
                                        if(strlen($_POST['name'])<=5){


                                            $kttk=$_POST['name'];
                                            echo "<script> alert('Bạn phải nhập trên 8 ký tự!');</script>"; 
                                            $hien=1;
                                            
                                        }      
                                    }
                                    
                                            
                                            if($hien!=1){
                                                $kttk=$_POST['name'];
                                                ?>
                                                <span style="color: green;">*ok</span>
                                                <?php
                                            }
                                        
                                }
                                
                            ?>
                        </td>

                        <td>
                            <input type="text" name="name" style="width: 95px;" 
                            
                            value="<?php echo $kttk ?>"
                            placeholder="Tài khoản">
                            
                            <input type="submit" name="kiemtra" value="Kiểm tra">
                            
                        </td>
                    </tr>
                    <tr></tr><tr></tr><tr></tr>
                    <tr>
                        <td>
                            &nbsp; <span class="text">Mật khẩu</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>

                        <td>
                            <input type="text" name="pass" placeholder="Mật khẩu" 
                            value="<?php echo $i_da['matkhau']?>">
                        </td>
                    </tr>
                    <tr></tr><tr></tr><tr></tr>
                    <tr>
                        <td>
                            &nbsp; <span class="text">Viết lại mật khẩu</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;
                        </td>

                        <td>
                            <input type="password" name="rpass" placeholder="Viết lại mật khẩu"
                            value="<?php echo $i_da['matkhau']?>">
                        </td>
                    </tr>
                    <tr></tr><tr></tr><tr></tr>
                    <tr>
                        <td>
                        <span class="email" style="margin-left: 10px;">Email</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            
                        </td>
                        <td>
                            <input type="text" name="email" placeholder="Email"
                            value="<?php echo $i_da['email']?>">
                        </td>
                    </tr>
                    <tr></tr><tr></tr><tr></tr>
                    <tr>
                        <td>
                        <span class="text" style="margin-left: 10px;">Ngày sinh</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            
                        </td>
                        <td>
                            <input type="date" name="ngay" placeholder="Ngày sinh" style="float: left;"
                            value="<?php echo $i_da['ngaysinh']?>">
                        </td>
                    </tr>
                    <tr></tr><tr></tr><tr></tr>
                    <tr>
                        <td>
                        <span class="text" style=" margin: 10px; margin-left: 10px;">
                            Giới tính </span>
                            
                        </td>
                        <td>
                            <input type="radio" style="float: left;" name="gioitinh" value="Nam"
                            checked>
                            &nbsp;&nbsp;&nbsp;
                            <span style="float: left; font-size: 20px;">Nam</span>

                            <span style="float: right; font-size: 20px;">Nữ</span>
                            &nbsp;&nbsp;&nbsp;
                            <input type="radio" style="float: right;" name="gioitinh" value="Nữ"
                            <?php if($i_da['gioitinh']=='Nữ') echo "checked"; ?>>
                            
                        </td>
                    </tr>
                    <tr></tr><tr></tr><tr></tr>
                    

                    <tr>
                        <td colspan="2">
                            
                            <input type="submit" class="zab" style="margin-left: 80px; border-radius: 10px; font-size: 25px;
                            margin-top: 30px;" value="Cập nhật thông tin" name="update">
                        </td>
                    </tr>
                </table>
               


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
    if(isset($_POST['update']))
    {
        if(strlen($_POST['name']!='admin')){
        if(strlen($_POST['name'])<=5){
            echo "<script> alert('Bạn phải nhập trên 8 ký tự!');
            window.location='upinfo.php'</script>"; 
            
        }
    }
        if($_POST['rpass']!=$_POST['pass'])
        {
            
            echo "<script> alert('Bạn viết lại mật khẩu Sai!'); </script>";
            return 0;
        }
        
        else{
           if(empty($_POST['name']) || empty($_POST['pass']) || empty($_POST['rpass']) || 
        empty($_POST['email']) || empty($_POST['ngay']) || empty($_POST['gioitinh']))
        {
            echo "<script> alert('Bạn chưa nhập đủ thông tin!'); </script>";
            return 0;
        }
        
            
        } 

        
        
        if($_POST['name']!=$i_da['taikhoan'])
        {
            $select_dangky=$get_data->selectda();
        foreach ($select_dangky as $i_da)
            { 
                
                if($_POST['name']==$i_da['taikhoan'])
                {
                    $kttk=$_POST['name'];
                    $hien=1;
                    echo "<script> alert('Tài khoản đã tồn tại!'); </script>";
                    
                    break;

                } 
            }

        }                                                              
    }
    
    ?>

    <?php
        
        if(isset($_POST['update']))
        {
            $in_da=$get_data->updateda($_POST['name'],$_POST['pass'],$_POST['email'],
            $_POST['ngay'],$_POST['gioitinh'],$_POST['ten'],$idtk);
            if($in_da) {echo "<script> alert('Cập nhật thành công'); 
                window.location='upinfor.php'</script>";
                
  
            }
            else echo "<script> alert ('Cập nhật không thành công'); </script>";
        }
    ?>
    </div>
</body>
</html>