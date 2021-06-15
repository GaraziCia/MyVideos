<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['level'] == 1) {
    include("conex.php");

    $arrayDelete = $_POST['arrayDelete'];

    
    foreach ($arrayDelete as $key => $value) {
        $insert = "DELETE FROM `movies` WHERE `id` = '$value'";
        $resultado = mysqli_query($live, $insert);
    }

    echo "full";
} else {
    header("location: ../portada.php");
}
