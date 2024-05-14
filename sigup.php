<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sigup.css">
    <title>Document</title>
</head>
<body >

    <form method="POST" >
    <div style="width: 1329px; height: 1000px;">
        <div class="header">
            <img src="./img/logo.jpg" alt="" class="logo">
            <div style="margin-top: -155px; margin-left: 300px;">
                <span class="zab">Zabook</span> 
                <span class="noi"> nơi mọi người kết nối với nhau</span>
            </div>
        </div>
        <div class="bgr" >

        
        <div class="sigup" style="text-align: center;">
            <div class="bang1" style="color: aliceblue;">
                <span class="zab" style="color: pink;">Điều khoản</span>
                <h2>Tài khoản: dài từ 6 đến 16 ký tự gồm có chữ và số.</h2>
                    <h2>  Mật khẩu: Nên gồm có chữ và số, không 
                        được sử dụng ký tự đặc biệt.</h2>
                        <h2>Dành cho người trên 16 tuổi.</h2>
                <div style="color: aliceblue; font-size: 25px;">
                    <br><br><span>Quay lại đăng nhập</span>
                <a href="sigin.php" style="background-color: aliceblue;
                padding: 10px; border-radius: 10px; text-decoration: none;">Đăng nhập</a>
                </div>

            </div>

            <div class="bang2" style="text-align: center; color: aliceblue;">
            <span class="zab" style="color: pink;">Đăng ký</span>
            <table style="font-size: 30px; margin-left: 60px; text-align: left; ">
                    <tr>
                        <td>
                             <span class="text" style="float: left; 
                            margin-top: 10px;">
                                Tài khoản</span><?php 
                                include('control.php');
                                    $get_data=new datadoan();
                                    $hien=0;
                                    $kttk='';
                                if(isset($_POST['kiemtra'])){
                                    
                                    $select_dangky=$get_data->selectda();
                                    
                                    foreach ($select_dangky as $i_da)
                                        { 
                                            
                                            if($_POST['name']==$i_da['taikhoan'])
                                            {
                                                $kttk=$_POST['name'];
                                                $hien=1;
                                                echo "<script> alert('Tài khoản đã tồn tại!'); 
                                                </script>";
                                                break;
                                            } 
                                            if(strlen($_POST['name'])<=5)
                                                {
                                                    $kttk=$_POST['name'];
                                                     echo "<script> alert('Bạn phải nhập trên 8 ký tự!');</script>"; 
                                                    $hien=1;
                                                    break;
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

                    <tr>
                        <td>
                             <span class="text">Mật khẩu</span>
                            
                        </td>

                        <td>
                            <input type="password" name="pass" placeholder="Mật khẩu">
                        </td>
                    </tr>

                    <tr>
                        <td>
                             <span class="text" >Viết lại mật khẩu</span>
                            
                        </td>

                        <td>
                            <input type="password" name="rpass" placeholder="Viết lại mật khẩu">
                        </td>
                    </tr>

                    <tr>
                        <td>
                        <span class="text" >Số điện thoại</span>
                            
                        </td>
                        <td>
                            <input type="text" name="sdt" placeholder="Số điện thoại">
                        </td>
                    </tr>

                    <tr>
                        <td>
                        <span class="text" >Ngày sinh</span>
                            
                        </td>
                        <td>
                            <input type="date" name="ngay" placeholder="Ngày sinh" style="float: left;">
                        </td>
                    </tr>

                    <tr>
                        <td>
                        <span class="text" >
                            Giới tính </span>
                            
                        </td>
                        <td>
                            <input type="radio" style="float: left;" name="gioitinh" value="Nam">
                            
                            <span style="float: left; font-size: 20px;">Nam</span>

                            <span style="float: right; font-size: 20px;">Nữ</span>
                            
                            <input type="radio" style="float: right;" name="gioitinh" value="Nữ">
                            
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                        <span class="text" >
                            Tôi đồng ý điều khoản </span>
                            
                        
                            <input type="checkbox" name="st[]">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" style="text-align: center;">
                            
                            <input type="submit" class="zab" 
                            style="border-radius: 10px; font-size: 25px;
                           " value="Đăng ký" name="dangky">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        </div>

        <div style="margin-left: 100px; margin-right: 100px; ">
            <div style="float: left; ">
                <h3>Người phân tích: NGUYỄN HỮU MẪN</h3>
            <h3>Người thiết kế: NGUYỄN HỮU MẪN</h3>
            <h3>Người DEV: NGUYỄN HỮU MẪN</h3>
            </div>
            <div style="float: right;"><h3>Người kiểm thử: NGUYỄN HỮU MẪN</h3>
                <h3>Người triển khai: NGUYỄN HỮU MẪN</h3>
                <h3>Cám ơn đã sử dụng Zabook :))</h3>
            </div>
        </div>
        </div>
    </form>

    <?php
    if(isset($_POST['dangky']))
    {
        if(strlen($_POST['name'])<=5){
            echo "<script> alert('Bạn phải nhập trên 8 ký tự!');
            window.location='sigup.php'</script>"; 
            return 0;
            
        }
        if($_POST['rpass']!=$_POST['pass'])
        {
            
            echo "<script> alert('Bạn viết lại mật khẩu Sai!'); </script>";
            return 0;
        }
        
        else{
           if(empty($_POST['name']) || empty($_POST['pass']) || empty($_POST['rpass']) || 
        empty($_POST['sdt']) || empty($_POST['ngay']) || empty($_POST['gioitinh']) ||
         empty($_POST['st']))
        {
            echo "<script> alert('Bạn chưa nhập đủ thông tin!'); </script>";
            return 0;
        }
        else
        {
            $check="";
            foreach($_POST['st'] as $icheck) 
            {
                $check.=$icheck;
            }
            
        } 
        }
        
        $select_dangky2=$get_data->selectda();
        foreach ($select_dangky2 as $i_da2)
        { 
                                            
            if($_POST['name']==$i_da2['taikhoan'])
            {
                
                echo "<script> alert('Tài khoản đã tồn tại!'); 
                window.location='sigup.php'</script>";
                
                return 0;
            }   
        }                                  
    }
    
    
        
        if(isset($_POST['dangky']))
        {
            $in_da=$get_data->insertda($_POST['name'],$_POST['pass'],$_POST['sdt'],
            $_POST['ngay'],$_POST['gioitinh'],$check);
            if($in_da) {echo "<script> alert('Đăng ký thành công'); 
                window.location='sigin.php?idtk=$idtk'</script>";
                
  
            }
            else echo "<script> alert ('Đăng ký không thành công'); </script>";
        }
    ?>

</body>
</html>