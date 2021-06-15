<?php
include("config/conex.php");


    if(isset($_POST['crear'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $pass2 = $_POST['pass2'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
		$nombre =str_replace(' ', '', $nombre); //Elimino espacios vacios
		
        $query = "SELECT COUNT(*) as contar FROM usuarios where `usuario` = '$email'";
        $consulta = mysqli_query($live,$query);
        $parametros = mysqli_fetch_array($consulta);
        if($parametros['contar'] == 0){
            if($pass == $pass2){
                $pass = password_hash($pass2, PASSWORD_DEFAULT);


                $nuvoUsuario = "INSERT INTO `usuarios`(`usuario`, `pass`, `nombre`, `apellidos`, `validado`) VALUES ('$email','$pass','$nombre','$apellidos','3')";
                $crear = mysqli_query($live,$nuvoUsuario);
               
                echo "<div class='alert alert-success' role='alert'>Cuenta creada.</div>";
                echo "<script>change()</script>";


            }else{
                echo "<div class='alert alert-danger' role='alert'>Las contraseñas no son iguales</div>";
            }
        }else{
            echo '
            <div class="alert alert-success" role="alert">
                Upps ya tienes una cuenta. Puedes acceder desde <a href="index.php" class="alert-link">aqui</a>.
            </div>';
        }
    }
    
?>