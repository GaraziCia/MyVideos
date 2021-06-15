<?php
header("Content-Type: text/html;charset=utf-8");
?>
<!DOCTYPE html>
<html lang="es">

<head>
<?php include("partes/header.php");?>

<title>Mis Matronas Live</title>
</head>

<body>

        <!-- Aqui va el contenido -->

        <?php 
        /*if(isMobileDevice()){ 
            echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            Recuerda que puedes descargarte la app de Mis Matronas Live desde <strong>aqui!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            '; 
        } */
        ?> 
        
        <div class="container">
                <div class="row">
                  <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                      
                    <div class="card my-5">
                    <img src="img/logo-mis-matronas.png" class="img-fluid mt-2" alt="Responsive image">
                
                    <?php include("config/login.php");?>
                      <div class="card-body">
                        <form  method="post" class="form-signin">
                            
                          <div class="form-label-group">
                            <input value="<?php if (isset($_COOKIE["email"])) echo $_COOKIE["email"] ?>" type="text" name="email" class="form-control" placeholder="Username" required>
                          </div>
            
                          <div class="form-label-group mt-3">
                            <input value="<?php if (isset($_COOKIE["pass"])) echo $_COOKIE["pass"] ?>" type="password" name="pass" class="form-control" placeholder="Password" required>
                          </div>

                          <button type="submit" name="acceder" class="btn btn-lg btn-success btn-block text-uppercase mt-2">Log in</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
           
      <?php include("partes/script.php");?>

</body>

</html>