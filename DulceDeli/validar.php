<?php
session_start();

include('inc/mensaje.php');
include('inc/conexion.php');

$usuario = $_REQUEST['usuario'];
$clave = $_REQUEST['clave'];

$sql = "SELECT * FROM `login` INNER JOIN usuario ON login.email = usuario.login_email WHERE login.email = '$usuario' AND login.clave = '$clave' ";


$consulta=$conexion->query($sql);

if($resultado = mysqli_fetch_array($consulta)) {

  $_SESSION['tipoUsuario'] = $resultado[2];
  
    $dato = $resultado[2];

    switch($dato) {
      case 'administrador':
        header('Location: respuesta.php');
        break;

      case 'usuario':
        header('Location: inicio2.php');
        $_SESSION['correo'] = $resultado[0];
        break;

    default:
      mensaje("Revisa usuario y/o contraseña", "login.php", "no.png");
    }
}

else{
  mensaje("Revisa usuario y/o contraseña", "login.php", "no.png");

}

?>