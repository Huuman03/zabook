<?php
session_start();
include ("PHPMailer/src/Exception.php");
include ("PHPMailer/src/PHPMailer.php");
include ("PHPMailer/src/SMTP.php");
include ("PHPMailer/src/OAuth.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(!empty($_SESSION['idtk'])){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zabook</title>
    <link rel="stylesheet" href="css/style-signin.css">
</head>

<body class="body"  >
    <div  class="container"  id="container" class="opati" >
        <div class="form-container sign-up-container" class="opati">
            
            <form method="POST" >
                <h1 >Tạo tài khoản</h1>
                
                <input type="text"  placeholder="Tài khoản"  name="name"
                value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">   
                
                <input type="password" name="pass" placeholder="mật khẩu" 
                value="<?php echo isset($_POST['pass']) ? $_POST['pass'] : ''; ?>">
                
                
                <input type="text" name="rpass" placeholder="Viết lại mật khẩu" 
                value="<?php echo isset($_POST['rpass']) ? $_POST['rpass'] : ''; ?>"/>

                <input type="email" name="email" placeholder="Email" 
                value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">

                <input type="date" name="ngay" class="placeholder" placeholder="Ngày sinh" 
                value="<?php echo isset($_POST['ngay']) ? $_POST['ngay'] : ''; ?>">
                
                <div class="form-group" >
                    <div class="formgt">
                    <label for="gender" class="gioitinh">Giới Tính</label>
                    <div class="wrapper">
                
                        <div class="option">
                          <input class="inp" type="radio" name="gioitinh" value="othor" checked="">
                          <div class="btn">
                            <span class="span" id="gender" name="gioitinh" value="othor">Khác</span>
                          </div>
                        </div>
                        <div class="option">
                          <input class="inp" type="radio" name="gioitinh" value="Nam">
                          <div class="btn">
                            <span class="span" id="gender" name="gioitinh" value="Nam">Nam</span>
                          </div>  </div>
                        <div class="option">
                          <input class="inp" type="radio" name="gioitinh" value="Nữ" >
                          <div class="btn">
                            <span class="span" id="gender" name="gioitinh" value="Nữ">Nữ</span>
                          </div>  
                        </div>
                        
                      </div>
                    </div>
                        </div>

                
           
                <button type="submit" name="dangky" class="neon" >Đăng ký</button>
            </form>
        </div>
        <div class="form-container sign-in-container" >
            <form method="POST">
                <h1 class="color">Đăng nhập</h1>
                <div class="form__group field">
                    <input type="input" name="tk" placeholder="Tài khoản" class="form__field"
                    value="<?php echo isset($_POST['tk']) ? $_POST['tk'] : ''; ?>">
                    <label for="name" class="form__label">Tài khoản</label>
                </div>
                <div class="form__group field">
                    <input type="password" name="mk" placeholder="Mật khẩu" class="form__field"
                    value="<?php echo isset($_POST['mk']) ? $_POST['mk'] : ''; ?>">
                    <label for="name" class="form__label">Mật khẩu</label>
                </div>
                <a href="#" class="color">Quên mật khẩu?</a>
                <button name="dangnhap" class="neon">Đăng nhập</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Chào bạn trở lại!</h1>
                    <br>
                    <img src="img/avatar.png" class="logo" alt="">

                    <p>Để duy trì kết nối với chúng tôi vui lòng đăng nhập bằng thông tin cá nhân của bạn</p>
                    <button class="ghost"  id="signIn">Đăng nhập</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Chào bạn đến với <span class="lkg">
                        Zabook
                    </span></h1>
                    <img src="img/logo.jpg" alt="" class="logo">
                    <p>Nhập thông tin của bạn và bắt đầu nào
                    </p>
                    <button class="ghost" id="signUp" >Đăng ký</button>
                </div>
            </div>
        </div>
    </div>

    <?php
     include('control.php');
     $get_data=new datadoan();
    $dn=0;
    if(isset($_POST['dangnhap']))
    {

        $select_da=$get_data->selectda();
        foreach ($select_da as $i_da)
            {
                if($_POST['tk']=='admin')
                {
                    if($_POST['mk']=='admin2003')
                    {
                        $_SESSION['idtk']='1';
                        echo "<script> alert('Xin chào Admin Hữu Mẫn <:>');
                            window.location='index.php'</script>";
                            return;
                    }
                }

                if($_POST['tk']==$i_da['taikhoan'])
                {
                    if($_POST['mk']==$i_da['matkhau'])
                    {
                        $dn=1;
                        
                        $_SESSION['idtk']=$i_da['id'];

                    }
                }

            }  
            if($dn!=1){
                echo "<script> alert('Tài khoản hoặc mật khẩu chưa đúng!');</script>"; 
                
            }
            else
            {
                $in_da=$get_data->id($_SESSION['idtk']);
            foreach ($in_da as $i_doan)
            {
            if(empty($i_doan['ten']))
                {
                    
                    echo "<script> alert('Đăng nhập thành công');
                    
                    window.location='toname.php'</script>";
                }
                else 
                {
                    if(empty($i_doan['avatar'])){
                        echo "<script> alert('Đăng nhập thành công');
                    window.location='avatar.php'</script>";
                    }
                    else {
                        echo "<script> alert('Đăng nhập thành công');
                    window.location='index.php'</script>";
                    }    
                }
            }
            }
    }
        

//----------------------------------------------------------------------



    if(isset($_POST['dangky']))
    {
        if(strlen($_POST['name'])<=5){
            echo "<script> alert('Bạn phải nhập trên 8 ký tự!');</script>"; 
        }
        else
        {
            if($_POST['rpass']!=$_POST['pass'])
            {
            echo "<script> alert('Bạn viết lại mật khẩu Sai!'); </script>";
            }
            else
            {
                if(empty($_POST['name']) || empty($_POST['pass']) || empty($_POST['rpass']) || 
                empty($_POST['email']) || empty($_POST['ngay']) || empty($_POST['gioitinh']))
                {
                    echo "<script> alert('Bạn chưa nhập đủ thông tin!'); </script>";
                }
                else
                {
                    $select_dangky2=$get_data->selectda();
                    foreach ($select_dangky2 as $i_da2)
                    {                                 
                        if($_POST['name']==$i_da2['taikhoan'])
                        {    
                            echo "<script> alert('Tài khoản đã tồn tại!');</script>";
                        }   
                        else
                        {
                            if(isset($_POST['dangky']))
                            {
                                $maxn=random_int(1000,9999);
                                $_SESSION['maxn']=$maxn;
                                $mail=new PHPMailer(true);
                                try{
                                $mail->SMTPDebug=0;
                                $mail->isSMTP();
                                $mail->Host = 'smtp.gmail.com';
                                $mail->SMTPAuth = true;
                                $mail->Username='nguyenhuuman2003@gmail.com';
                                $mail->Password = 'bejthtadrkizzsxn';
                                $mail->SMTPSecure = 'tls';
                                $mail->Port = 587;
                                $mail->CharSet ='UTF-8';
                                $mail->setFrom('nguyenhuuman2003@gmail.com'); 
                                $mail->addAddress($_POST['email'],'Huu Man'); //email nguoi nhan
                                $mail->isHTML(true);
                                $mail->Subject='Mã xác nhận(Tuyệt đối không cung cấp mã này cho người khác)';    // Tieu de
                                // noi dung
                                $mail->Body = $maxn;  // noi dung
                                $mail->send();
                                $mail->AltBody = 'cố gắng ngheng';
                                //echo "<script> alert ('Email đã được gửi'); </script>";
                                $_SESSION['name']=$_POST['name'];
                                $_SESSION['pass']=$_POST['pass'];
                                $_SESSION['email']=$_POST['email'];
                                $_SESSION['ngay']=$_POST['ngay'];
                                $_SESSION['gioitinh']=$_POST['gioitinh'];
                                $_SESSION['check']=$check;
                                echo "<script> window.location='confirmemail.php'</script>";
                                }
                                catch(Exception $e)
                                {
                                echo "<script> alert ('Email gửi thất bại'); </script>";
                                }
                            
                            }
                        }
                    } 
                } 
            }
        }                                   
    }
?>
    


    <script src="js/style-signin.js"></script>


</body>
</html>
