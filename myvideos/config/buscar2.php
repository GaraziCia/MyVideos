<?php

$valor = $_POST['valor'];
$valor2 = str_replace(" ", "-", $valor);
include("conex.php");

$consulta = "SELECT * FROM `movies` WHERE `nombre` like '%$valor%' OR `nombre` like '%$valor2%' ORDER BY `date` DESC";
$resultado = mysqli_query($live, $consulta);
if($resultado->num_rows != 0){
    while ($peliculas = $resultado->fetch_array()) {
        $nombre = $peliculas['nombre'];
        $url_portada = $peliculas['url_portada'];
    
        echo '
        <div class="col-lg-3 col-md-4 col-6">
            <div class="d-block mb-4 h-100">
                <img loading="lazy" class="img-fluid film img-thumbnail" id="' . $id . '" src="img/thumbnail/' . $url_portada . '" alt="">
            </div>
        </div>
        ';
    }
}else{
    echo "<p>Sorry, no hay vidos</p>";
}
