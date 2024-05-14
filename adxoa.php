
<?php
    include('control.php');
    
    $get_data=new datadoan();
    if($_GET['idtk']=='1') {
        echo "<script> alert('Không thể xóa admin!');
        window.location='admin.php'</script>";
        return 0;
    }
    $in_da=$get_data->deleteda($_GET['idtk']);
    if($in_da) {echo "<script>window.location='admin.php'</script>";
        

    }
    else echo "<script> alert ('Xóa tài khoản không thành công'); </script>";

?>
    