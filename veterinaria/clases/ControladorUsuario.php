<?php

namespace Clases;

use Clases\cliente as cliente;
use Clases\Usuario as Usuario;

require_once "config/autoload.php";

class ControladorUsuario
{
    public function login($usuario, $password): bool
    {
        $claseUsuario = new Usuario();
        $resultados = $claseUsuario->getDataLogin($usuario);

        if (count($resultados) != 0) {
            foreach ($resultados as $item) {
                $usuario_BD = $item["usuario"];
                $pass_BD = $item["pass"];
                $tipo = $item["tipo_usuario_id"];
            }

            echo $pass_BD;
            if ($usuario_BD == $usuario) {
              
                if (1) {
                    $cliente = new cliente();
                    $resultados = $cliente->getDataClientePorId($id);
                    foreach ($resultados as $item) {
                        $id_cliente = $id;
                        $nombres = $item["nombres"];
                        $telefono = $item["telefono"];
                        $correo = $item["correo"];
                    }
                    session_start();
                    $_SESSION["id"] = $id_cliente;
                    $_SESSION["nombres"] = $nombres;
                    $_SESSION["telefono"] = $telefono;
                    $_SESSION["correo"] = $correo;
                    $resultado = true;

                } else {
                    $resultado = false;
                }
            } else {
                $resultado = false;
            }
            return $resultado;
        } else {
            return false;
        }
    }
}