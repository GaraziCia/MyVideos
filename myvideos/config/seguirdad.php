<?php
session_start();

if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    $hoy = date('Y-m-d H:i:s');

    include("conex.php");    
}else{
    header("location: index.php");
}

?>