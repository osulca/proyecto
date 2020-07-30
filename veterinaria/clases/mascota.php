<?php
namespace Clases;
use Clases\ConexionDB as db;

require_once "config/autoload.php";

class Mascota
{
    protected $nombres;
    protected $raza;
    protected $color;
    protected $sexo;
    protected $peso;
    protected $especie;
    protected $cliente_id;

    public function getNombres()
    {
        return $this->nombres;
    }

    public function setNombres($nombres): void
    {
        $this->nombres = $nombres;
    }

    public function getRaza()
    {
        return $this->raza;
    }

    public function setRaza($raza): void
    {
        $this->raza = $raza;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color): void
    {
        $this->color = $color;
    }

    public function getSexo()
    {
        return $this->sexo;
    }
    public function setSexo()
    {
        $this->sexo =$sexo;
    }

    public function getPeso()
    {
        return $this->peso;
    }
    public function setPeso()
    {
        $this->peso =$peso;
    }

    public function getEspecie()
    {
        return $this->especie;
    }
    public function setEspecie()
    {
        $this->especie =$especie;
    }

    public function getClienteId()
    {
        return $this->cliente_id;
    }
    public function setClienteId()
    {
        $this->cliente_id =$cliente_id;
    }

    public function crearmascota() : bool {
        try {
            $db = new db();
            $conn = $db->abrirConexion();

            $sql = "INSERT INTO mascota(nombre, raza, color, sexo, peso, especie) 
                    VALUES('$this->nombre','$this->raza', '$this->color', '$this->sexo', '$this->peso', '$this->especie')";
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

    public function getDataMascota(){
        $resultados = null;
        try {
            $db = new db();
            $conn = $db->abrirConexion();

            $sql = "SELECT id, nombre, raza, color, sexo, peso, especie FROM mascota";
            $respuesta = $conn->prepare($sql);
            $respuesta->execute();
            $resultados = $respuesta->fetchAll();

            $db->cerrarConexion();

        } catch (Exception $m) {
            echo $e->getMessage();
        }
        return $resultados;
    }

    public function getDataMascotaPorId($id){
        $resultados = null;
        try {
            $db = new db();
            $conn = $db->abrirConexion();

            $sql = "SELECT * FROM mascota WHERE id = $id";
            $respuesta = $conn->prepare($sql);
            $respuesta->execute();
            $resultados = $respuesta->fetchAll();

            $db->cerrarConexion();

        } catch (Exception $m) {
            echo $e->getMessage();
        }
        return $resultados;
    }
}