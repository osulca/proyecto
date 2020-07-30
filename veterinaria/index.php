<?php

use Clases\ControladorUsuario as ControladorUsuario;

include_once "config/autoload.php";
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Sistema Clinica Veterinaria</title>
    </head>
    <body class="bg-light">
    <div class="text-center mt-5">
        <h1>Login</h1>
    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
        <input type="text" name="usuario" placeholder="Ingrese Usuario"></br>
        <input class="mt-1" type="password" name="pass" placeholder="Ingrese Contraseña"></br>
        <input class="btn btn-info mt-2" type="submit" name="submit" value="Login">
    </form>
    <a href="registrar usuario.php">Registrese</a>
    </div>
    </body>
    </html>
<?php
if (isset($_POST["submit"])) {
    $usuario = $_POST["usuario"];
    $pass = $_POST["pass"];

    $controladorUsuario = new ControladorUsuario();
    $login = $controladorUsuario->login($usuario, $pass);

    if ($login) {
        header("Location: bienvenido.php");
    } else {
        echo "<contraseña incorrecto<div>";
    }
}