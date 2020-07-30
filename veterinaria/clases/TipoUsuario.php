<?php
namespace Clases;

class Tipo_Usuario
{
    private $nombre;
    private $descripcion;

    public function __construct($nombre, $descrpcion)
    {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getDescripcion()
    {
        return $this->nombre;
    }

    public function setDescripcion($nombre): void
    {
        $this->nombre = $nombre;
    }
}