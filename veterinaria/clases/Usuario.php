<?php

namespace Clases;

use Clases\ConexionDB as db;

require_once "config/autoload.php";

class Usuario
{
    private $usuario;
    private $password;
    private $tipo;
    private $id_cliente;

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario): void
    {
        $this->usuario = $usuario;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
    }

    public function getIdCliente()
    {
        return $this->id_estudiante;
    }

    public function setIdCliente($id_cliente): void
    {
        $this->id_cliente = $id_cliente;
    }

    public function getDataLogin($usuario)
    {
        $resultados = null;
        try {
            $db = new db();
            $conn = $db->abrirConexion();

            $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
            $respuesta = $conn->prepare($sql);
            $respuesta->execute();
            $resultados = $respuesta->fetchAll();

            $db->cerrarConexion();

        } catch (Exception $u) {
            echo $e->getMessage();
        }

        return $resultados;
    }

    public function crearUsuario(): bool
    {
        try {
            $db = new db();
            $conn = $db->abrirConexion();

            $sql = "INSERT INTO usuarios(usuario, pass, tipo, id_tabla) 
                    VALUES('$this->usuario','$this->password', '$this->tipo', $this->id_estudiante)";
            $respuesta = $conn->prepare($sql);
            $respuesta->execute();
            $numRows = $respuesta->rowCount();
            if ($numRows != 0) {
                $result = true;
            } else {
                $result = false;
            }

            $db->cerrarConexion();

            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}