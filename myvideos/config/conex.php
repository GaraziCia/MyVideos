<?php
 $host = "localhost";
 $user = "admin";
 $clave = 'Q52aMZpk7tS0nSme';
 $bd = "admin_live";
 $live = mysqli_connect($host,$user,$clave,$bd);
 $acentoslive = $live->query("SET NAMES 'utf8'");
 ?>
