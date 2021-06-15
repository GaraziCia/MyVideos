<?php
header("Content-Type: text/html;charset=utf-8");
include("config/seguirdad.php");

if ($_SESSION['level'] != 1) {
    header("location: portada");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("partes/header.php"); ?>

    <title>My videos</title>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->

        <?php include("partes/menu-vertical.php"); ?>

        <!-- Page Content  -->
        <div id="content">

            <?php include("partes/menu-orizontal.php"); ?>
            <!-- Aqui va el contenido -->
            <?php

            //Seguridad de matriculaciones            
            ?>

            <div class="container">


                <form action="config/nueva-peli.php" enctype="multipart/form-data" method="post">

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="titulo" id="title" placeholder="Movie title" required>
                    </div>

                    <div class="form-group">
                        <label for="thumbnail">Thumbnail</label>
                        <input name="caratula"  class="form-control"  list="brow">
                        <datalist id="brow">
                            <?php
                            $directorio = 'img/thumbnail/';
                            $ficheros1  = scandir($directorio);

                            for ($i = 2; $i < count($ficheros1); $i++) {
                                $valor = $ficheros1[$i];
                                echo "<option value='$valor'>";
                            }
                            ?>
                       </datalist>  

                    </div>



                    <div class="form-group">
                        <label for="movie">Movie</label>
                        <input name="movie"  class="form-control"  list="browmovies">
                        <datalist id="browmovies">
                            <?php
                            $directorio = 'movies/';
                            $ficheros1  = scandir($directorio);

                            for ($i = 2; $i < count($ficheros1); $i++) {
                                $valor = $ficheros1[$i];
                                echo "<option value='$valor'>";
                            }
                            ?>
                       </datalist>  
                    </div>

                    <button type="submit" class="btn btn-success">Send</button>
                </form>
            </div>



            <?php include("partes/footer.php"); ?>

            <?php include("partes/script.php"); ?>

</body>

</html>