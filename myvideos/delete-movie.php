<?php
header("Content-Type: text/html;charset=utf-8");
include("config/seguirdad.php");
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

            <input type="text" class="form-control mt-2" id="title" placeholder="Title" required>

            <div class="row mt-3 text-center" id="btns">
               
            </div>

            <?php
            if (isset($_GET['save'])) {
                echo '<div class="alert alert-success mt-2" role="alert">Saved correctly</div>';
            }
            ?>

            <div class="row text-center text-lg-left mt-3" id="movies">

                <?php
                $consulta = "SELECT * FROM `movies` WHERE 1 ORDER BY `date` DESC";
                $resultado = mysqli_query($live, $consulta);

                while ($peliculas = $resultado->fetch_array()) {
                    $nombre = $peliculas['nombre'];
                    $url_portada = $peliculas['url_portada'];
                    $id = $peliculas['id'];

                    echo '
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="d-block mb-4 h-100">
                        <img loading="lazy" class="img-fluid film img-thumbnail" id="' . $id . '" src="img/thumbnail/' . $url_portada . '" alt="">
                    </div>
                </div>
                ';
                }
                ?>

            </div>


            <!-- Modal -->
            <div class="modal fade" id="confirmdelete" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are u sure?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" onclick="yesdelete()" class="btn btn-primary">Yes</button>
                </div>
                </div>
            </div>
            </div>


            <?php include("partes/footer.php"); ?>

            <?php include("partes/script.php"); ?>

            <script>
                $(document).on('keyup', '#title', function() {
                    var valor = $(this).val();
                    $.ajax({
                            url: '/config/buscar2.php',
                            type: 'POST',
                            dataType: 'html',
                            data: {
                                valor: valor
                            },
                        })
                        .done(function(respuesta) {
                            document.getElementById('movies').innerHTML = respuesta;
                        })
                        .fail(function() {
                            console.log("error");
                        });

                })

                let arrayDelete = [];

                let img = document.getElementsByClassName("film")
                for (let i = 0; i < img.length; i++) {
                    let elem = img[i];

                    elem.addEventListener("click", function() {
                        document.getElementById('btns').innerHTML= `
                            <div class="col"><button onclick="deletefilm()" class="btn btn-danger">Delete</button></div>
                            <div class="col"><button onclick="cancel()" class="btn btn-success">Cancel</button></div>`
                        elem.src = "img/delete.png";
                        arrayDelete.push(elem.id)

                    })
            
                }

                function cancel(){
                    location.reload()
                }

                function deletefilm(){
                    $('#confirmdelete').modal('show')
                }
                
                function yesdelete(){
                    $.ajax({
                            url: '/config/delete.php',
                            type: 'POST',
                            dataType: 'html',
                            data: {
                                arrayDelete: arrayDelete
                            },
                        })
                        .done(function(respuesta) {
                            location.reload();
                        })
                        .fail(function() {
                            console.log("error");
                        });
                }
            </script>

</body>

</html>