<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sigin.css">
    <title>Zabook</title>
</head>
<body style="position: relative;">
    <div style="position: absolute;
    left: 50%;
    transform: translate(-50%);">
    <form method="POST" >
<div style="width: 1329px; height: 1000px;">

        <div class="header">
            <img src="./img/logo.jpg" alt="" class="logo">
            <div style="margin-top: -155px; margin-left: 300px;">
                <span class="zab">Zabook</span> &nbsp;
                <span class="noi"> nơi mọi người kết nối với nhau</span>
            </div>
        </div>

    <div class="bgr" style="background-size: 100%; width: 1300px; height: 600px;">
        
        
        <div class="sigup" style="text-align: center;">
            <div class="bang1">
                <span class="zab" style="color: pink;">Đăng nhập</span>

                <table style="font-size: 30px;">
                    <tr>
                        <td>
                            <span class="text">Tài khoản</span>
                        </td>

                        <td>
                            <input type="text" placeholder="Tài khoản" name="tk">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <span class="text" >Mật khẩu</span>
                        </td>

                        <td>
                            <input type="password" placeholder="Mật khẩu" name="mk">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            
                            <input type="submit" class="zab" style="border-radius: 10px; font-size: 25px;
                            margin-top: 30px;" value="Đăng nhập" name="dangnhap">
                        </td>
                    </tr>
                    <tr><br><br></tr>
                    <tr>
                        <td colspan="2">
                            <br><br>
                            <span style="color: aliceblue;">Bạn chưa có tài khoản hãy :</span>
                            <a href="./sigup.php" class="zab" style="border-radius: 10px; font-size: 25px;
                            margin-top: 30px; color: rgb(253, 0, 177); text-decoration: none;
                            background-color: rgb(255, 255, 255); padding: 3px;">Đăng ký</a>
                            
                        </td>
                    </tr>
                </table>

            </div>

            <div class="bang2" style="text-align: center;  text-align: left;">
                <span class="zab" style="color: white;">Điều khoản</span>
                
                <h2 style="font-size: 18px; color: aliceblue; margin: 10px; ">
                    Nội dung được tạo và phân phối bằng tài khoản giả. <br>
                    Nội dung chứa từ đã được xác định là gây thù ghét.<br>
                    Hành vi bắt nạt và quấy rối<br>
                    Spam<br>
                    Hình ảnh phản cảm<br>
                    Hoạt động tình dục và ảnh khỏa thân người lớn.<br>
                    
                    Bài viết mua bán, giao dịch hoặc quảng cáo hàng hóa hoặc 
                    dịch vụ bị hạn chế (theo định 
                    nghĩa trong Tiêu chuẩn cộng đồng của chúng tôi).<br>
                </h2>
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
     include('control.php');
     $get_data=new datadoan();
    $dn=0;
    if(isset($_POST['dangnhap']))
    {

        $select_da=$get_data->selectda();
        foreach ($select_da as $i_da)
            {
                if($_POST['tk']==$i_da['taikhoan'])
                {
                    if($_POST['mk']==$i_da['matkhau'])
                    {
                        $dn=1;
                        
                        $_SESSION['idtk']=$i_da['id'];

                    }
                }

                if($_POST['tk']=='admin')
                {
                    if($_POST['mk']=='admin2003')
                    {
                        echo "<script> alert('Xin chào Admin Hữu Mẫn <:>');
                            window.location='trangchinh.php'</script>";
                            return 0;
                    }
                }


            }  
            if($dn!=1){
                echo "<script> alert('Tài khoản hoặc mật khẩu chưa đúng!');</script>"; 
                return 0;
            }
    }
       
        if(isset($_POST['dangnhap']))
        {
            
            $in_da=$get_data->id($_SESSION['idtk']);
            foreach ($in_da as $i_doan)
            {
            if(empty($i_doan['ten']))
                {
                    
                    echo "<script> alert('Đăng nhập thành công');
                    
                    window.location='datten.php'</script>";
                }
                else 
                {
                    if(empty($i_doan['avatar'])){
                        echo "<script> alert('Đăng nhập thành công');
                    window.location='avatar.php'</script>";
                    }
                    else {
                        echo "<script> alert('Đăng nhập thành công');
                    window.location='trangchinh.php'</script>";
                    }    
                }
        }
            
        }
        
    ?>
</div>
</body>
</html>