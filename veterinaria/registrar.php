<?php
use Clases\Cliente as Cliente;
use Clases\Mascota as Mascota;

session_start();
if($_SESSION["id"]==null){
    header("Location: index.php");
}

include_once "config/autoload.php";
include_once "layout/header.php";
include_once "menu.php";
?>
    <h1 class="mt-4">Registrar Clientes</h1>
    <form method="post" action="#">
        <div class="form-group" style="width: 400px">
        <input class="form-control" type="text" name="nombres" placeholder="Nombres" required/><br>
        <input class="form-control" type="text" name="telefono" placeholder="Telefono"/><br>
        <input class="form-control" type="email" name="correo" placeholder="Email"/><br>
        
            <?php
            $mascota = new Mascota();
            $mascota = $mascota->verMascota();
            foreach ($mascota as $mascota) {
                echo "<option value='" . $mascota["id"] . "'>" . $mascota["nombre"] . $mascota["raza"] .$mascota["color"].$mascota["sexo"]. $mascota["peso"].$mascota["especie"]."</option>";
            }
            ?>
        </select>
        </div>
        <input type="submit" class="btn btn-info" name="submit" value="Guardar">

    </form>

<?php
if (isset($_POST["submit"])) {
    $nombres = $_POST["nombres"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];

    $cliente = new Cliente();
    $cliente->setNombres($nombres);
    $cliente->setTelefono($telefono);
    $cliente->setCorreo($codigo);

    if ($cliente->crearCliente()) {
        echo "Datos guardados";
    } else {
        echo "Error: Los datos no se guardaron";
    }
}
include_once "layout/footer.php";
