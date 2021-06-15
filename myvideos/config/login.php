<?php
include("config/conex.php");

function getRealIP(){
    if (isset($_SERVER["HTTP_CLIENT_IP"]))
    {
        return $_SERVER["HTTP_CLIENT_IP"];
    }
    elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
    {
        return $_SERVER["HTTP_X_FORWARDED_FOR"];
    }
    elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
    {
        return $_SERVER["HTTP_X_FORWARDED"];
    }
    elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
    {
        return $_SERVER["HTTP_FORWARDED_FOR"];
    }
    elseif (isset($_SERVER["HTTP_FORWARDED"]))
    {
        return $_SERVER["HTTP_FORWARDED"];
    }
    else
    {
        return $_SERVER["REMOTE_ADDR"];
    }
}


    if(isset($_POST['acceder'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $query = "SELECT COUNT(*) as contar FROM usuarios where `usuario` = '$email'";
        $consulta = mysqli_query($live,$query);
        $parametros = mysqli_fetch_array($consulta);
        if($parametros['contar'] >0){
            $query = "SELECT * FROM usuarios where `usuario` = '$email'";
            $consulta = mysqli_query($live,$query);
            while ($row = $consulta->fetch_array()) {
                if (password_verify($pass, $row['pass'])) {

                    if($row['validado'] != 0){
                        session_start();
                    
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['apellidos'] = $row['apellidos'];
                        $_SESSION['nombre'] = $row['nombre'];
                        $_SESSION['level'] = $row['level'];
                        $idUsuario = $row['id'];
						
						$ipReal = getRealIP();
                        $query = "INSERT INTO `historial_login`(`idUsuario`,`ip`) VALUES ('$idUsuario','$ipReal')";
                        $consulta = mysqli_query($live,$query);
                        setcookie("email", $email, time() + (864000 * 3000), '/');  /* expira en 1 hora */
                        setcookie("pass", $pass, time() + (864000 * 3000), '/');  /* expira en 1 hora */
						
						header("location: portada");
					
					
                    }else{
                        echo "<div class='alert alert-danger' role='alert'>Debes verificar tu email</div>";
                    }

                } else {
                    echo "<div class='alert alert-danger' role='alert'>La contraseña no es válida</div>";
                }
            }
        }else {
            echo "<div class='alert alert-danger' role='alert'>Datos incorrectos</div>";
        }

    }

?>