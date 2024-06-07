<?php
session_start();
if(empty($_SESSION['idtk'])){
    header("location: sigin.php");
    
}

$_SESSION['idtk']=$_GET['idtk'];
header("location: index.php");


?>