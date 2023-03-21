<?php
class Conexion
{
    private $servidor = "localhost";
    private $usuario = "root";
    private $contrasena = "";
    private $bd = "paginaweb";

    public $conexion;

    public function __construct()
    {
        $this->conexion = new mysqli($this->servidor, $this->usuario, $this->contrasena, $this->bd);

        if (!$this->conexion) {
            die("La conexión falló: " . mysqli_connect_error());
        }
    }
}

?>