<?php

session_start();
if(empty($_SESSION['idtk'])){
    header("location: sigin.php");
    
}

if($_SESSION['idtk']!=1){
    header("location: sigin.php");
    
}


$idtk=$_SESSION['idtk'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <title>Document</title>
</head>
<body >
<?php
    include('control.php');
    
    $get_data=new datadoan();
    $select_dangky=$get_data->selectda();
?>

<form enctype="multipart/form-data" method="POST" >
    <div style="width: 1329px; height: 1000px;">
        <div class="header">

            
            
            <div class="user"> 
                <span class="name">Admin: Hữu Mẫn</span>&nbsp;
            </div>

            <div style="margin-left: 800px;">
            <a href="sigin.php" style="background-color: aliceblue; 
                padding: 10px; border-radius: 10px; text-decoration: none;">Đăng nhập</a>
                 <a href="sigup.php" style="background-color: aliceblue; 
                 padding: 10px; border-radius: 10px; text-decoration: none;">Đăng ký</a>
            </div>
        
        </div>

        <div>
        <table border="1" class="k1" >
                <tr class="k2">
                    <td><h4>Họ và tên</h4></td>
                    <td><h4>Tài khoản</h4></td>
                    <td><h4>Mật khẩu</h4></td>
                    <td><h4>số ĐT</h4></td>
                    <td><h4>Ngày sinh</h4></td>
                    <td><h4>Giới tính</h4></td>
                    <td><h4>Avatar</h4></td>
                    <td><h4>Sửa</h4></td>
                    <td><h4>xóa</h4></td>
                </tr>

            <?php
            
            foreach ($select_dangky as $i_dk)
            {

                ?>
                
                <tr class="k2">
                <td><?php echo $i_dk['ten'] ?></td>
                    <td>
                        <?php if($i_dk['id']=='1'){ echo "...";}
                        else echo $i_dk['taikhoan'] ?>
                    </td>
                    <td>
                    <?php if($i_dk['id']=='1'){ echo "...";}
                        else echo $i_dk['matkhau'] ?>
                    </td>

                    <td><?php echo $i_dk['sdt'] ?></td>
                    
                    <td><?php echo $i_dk['ngaysinh'] ?></td>
                    <td><?php echo $i_dk['gioitinh'] ?></td>
                    <td><img src="upload/<?php echo $i_dk['avatar'] ?>" alt="" width="100px" height="50px"></td>

                    <td ><a href="trunggiantk.php?idtk=<?php echo $i_dk['id']?>"> Đăng nhập </a></td>
                    
                    <td><a href="adxoa.php?idtk=<?php echo $i_dk['id']?>"
                    onclick="if(confirm('Bạn có chắc muốn xóa'))return true;
                    else return false";> Xóa </td>
                </tr> 
                <?php
            }
   
            
            ?>
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
</body>
</html>