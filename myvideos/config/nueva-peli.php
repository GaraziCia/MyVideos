<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['level'] == 1) {
    include("conex.php");

    $titulo = $_POST['titulo'];

    $fileNameCaratula = $_POST['caratula']; 

    $fileNameMovie = "movies/".$_POST['movie'];
    
    $titulo = str_replace(" ", "-", $titulo);


    $insert = "INSERT INTO `movies`(`nombre`, `url_video`, `url_portada`) VALUES ('$titulo','$fileNameMovie','$fileNameCaratula')";
    $resultado = mysqli_query($live, $insert);
    header("location: ../portada.php?save");

} else {
    header("location: ../portada.php");
}
