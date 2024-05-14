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
    $up_select=$get_data->selecttn();
    foreach($up_select as $i_tn)
    {
        if($idtk==$i_tn['idng'])
                        {
                            if($_SESSION['idnn']==$i_tn['idnn'])
                            {
                                $up_xoa=$get_data->deletetn($i_tn['idtn']);
                            }
                        }

                        if($_SESSION['idtk']==$i_tn['idnn'])
                        {
                            if($_SESSION['idnn']==$i_tn['idng'])
                            {
                                
                                $up_xoa=$get_data->deletetn($i_tn['idtn']);
                                
                            }
                        }
    }
    echo "<script> window.location='inbox.php' </script>";



    


?>