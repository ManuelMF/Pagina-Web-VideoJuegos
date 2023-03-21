<?php
class Usuario
{
    private $id;
    private $nombre;
    private $email;
    private $contra;
    private $fecha_creacion;

    private $fotoPerfil;

    public function __construct($id, $nombre, $email, $contra, $fecha_creacion, $fotoPerfil)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->contra = $contra;
        $this->fecha_creacion = $fecha_creacion;
        $this->fotoPerfil = $fotoPerfil;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getContra()
    {
        return $this->contra;
    }
    public function getFechaCreacion()
    {
        return $this->fecha_creacion;
    }
    public function getFotoPerfil()
    {
        return $this->fotoPerfil;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setContra($contra)
    {
        $this->contra = $contra;
    }
    public function setFechaCreacion($fecha_creacion)
    {
        $this->fecha_creacion = $fecha_creacion;
    }
    public function setFotoPerfil($fotoPerfil)
    {
        $this->fotoPerfil = $fotoPerfil;
    }
}
?>