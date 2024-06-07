<?php
session_start();
if(empty($_SESSION['idtk'])){
    header("location: sigin.php");
    
}
$idtk=$_SESSION['idtk'];



$_SESSION['imgbv']=$_GET['imgbv'];
header("location: imgbv.php");


?>