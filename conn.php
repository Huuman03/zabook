<?php
session_start();
if(empty($_SESSION['idtk'])){
    header("location: sigin.php");
    
}
$idtk=$_SESSION['idtk'];



$_SESSION['idnn']=$_GET['idnn'];
header("location: inbox.php");


?>