<?php
namespace Clases;
use Clases\ConexionDB as db;

require_once "config/autoload.php";

class Cliente
{
    protected $nombres;
    protected $telefono;
    protected $correo;

    public function getNombres()
    {
        return $this->nombres;
    }

    public function setNombres($nombres): void
    {
        $this->nombres = $nombres;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono): void
    {
        $this->telefono = $telefono;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function setCorreo($correo): void
    {
        $this->correo = $correo;
    }

    public function crearCliente() : bool {
        try {
            $db = new db();
            $conn = $db->abrirConexion();

            $sql = "INSERT INTO cliente(nombres, telefono, correo) 
                    VALUES('$this->nombres','$this->telefono', '$this->correo')";
            $respuesta = $conn->prepare($sql);
            $respuesta->execute();
            $numRows = $respuesta->rowCount();
            if($numRows!=0){
                $result = true;
            }else{
                $result = false;
            }

            $db->cerrarConexion();

            return $result;
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getDataCliente(){
        $resultados = null;
        try {
            $db = new db();
            $conn = $db->abrirConexion();

            $sql = "SELECT id, nombres, telefono, correo FROM cliente";
            $respuesta = $conn->prepare($sql);
            $respuesta->execute();
            $resultados = $respuesta->fetchAll();

            $db->cerrarConexion();

        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $resultados;
    }

    public function getDataClientePorId($id){
        $resultados = null;
        try {
            $db = new db();
            $conn = $db->abrirConexion();

            $sql = "SELECT * FROM cliente WHERE id = $id";
            $respuesta = $conn->prepare($sql);
            $respuesta->execute();
            $resultados = $respuesta->fetchAll();

            $db->cerrarConexion();

        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $resultados;
    }
}