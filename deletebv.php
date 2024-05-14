
<?php
    include('control.php');
    $get_data=new datadoan();
    $data_bv=$get_data->selectbv();
        foreach ($data_bv as $i_bv)

    $in_da=$get_data->deletebv($_GET['delbv']);

    $data_bl=$get_data->deletebl($_GET['delbv']);
    if($in_da) {echo "<script>
        window.location='trangchinh.php'</script>";
        

    }
    else echo "<script> alert ('Chưa xóa được bài viết'); </script>";

?>
    