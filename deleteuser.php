<?php

session_start();

if(empty($_SESSION['idtk'])){
    header("location: sigin.php");
    
}
$idtk=$_SESSION['idtk'];
?>
<?php
    include('control.php');
    
    $get_data=new datadoan();

    if($idtk=='1') {
        $idtk=1;
        echo "<script> alert('Không thể xóa admin!');
        window.location='index.php'</script>";
        return 0;
    }
    $in_da=$get_data->deleteda($idtk);
    if($in_da) {echo "<script> alert('Đã xóa tài khoản thành công'); 
        window.location='sigup.php'</script>";
        

    }
    else echo "<script> alert ('Xóa tài khoản không thành công'); </script>";

?>
    