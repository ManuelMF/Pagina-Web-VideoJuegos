<?php

include("Conexion.php");
include("Usuario.php");
include("Proyecto.php");

class Modelo
{
    public function GetUsuarioPorId($id)
    {
        $conexion = new Conexion();
        $con = $conexion->conexion;

        $stmt = $con->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $nombre = $row["nombre"];
            $email = $row["email"];
            $contra = $row["contra"];
            $fecha_creacion = $row["fecha_creacion"];
            $fotoPerfil = $row["fotoPerfil"];
            $user = new Usuario($id, $nombre, $email, $contra, $fecha_creacion, $fotoPerfil);
        }
        $stmt->close();
        $con->close();
        return $user;
    }
    public function GetUsuarioPorEmail($email)
    {
        $conexion = new Conexion();
        $con = $conexion->conexion;

        $stmt = $con->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);

        $stmt->execute();

        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $nombre = $row["nombre"];
            $email = $row["email"];
            $contra = $row["contra"];
            $fecha_creacion = $row["fecha_creacion"];
            $fotoPerfil = $row["fotoPerfil"];
            $user = new Usuario($id, $nombre, $email, $contra, $fecha_creacion, $fotoPerfil);
        }
        $stmt->close();
        $con->close();
        return $user;
    }

    public function ComprovarSiContraEmailCorrecto($email, $pass)
    {
        $conexion = new Conexion();
        $con = $conexion->conexion;

        $stmt = $con->prepare("SELECT * FROM usuarios WHERE email = ? and contra = ?");
        $stmt->bind_param("ss", $email, $pass);

        $stmt->execute();

        $result = $stmt->get_result();

        $bol = true;
        if ($result->num_rows === 0) {
            $bol = false;
        }
        $stmt->close();
        $con->close();
        return $bol;
    }

    public function InsertarUsuario($nombre, $email, $contra, $fotoPerfil)
    {
        $conexion = new Conexion();
        $con = $conexion->conexion;

        $dat = date('Y-m-d');

        $stmt = $con->prepare("INSERT INTO usuarios (nombre, email, contra, fecha_creacion,  fotoPerfil) VALUES (?, ?, ?, ?,?)");
        $stmt->bind_param("sssss", $nombre, $email, $contra, $dat, $fotoPerfil);
        $stmt->execute();

        $stmt->close();
        $con->close();
    }

    public function BorrarUsuario($id)
    {
        $conexion = new Conexion();
        $con = $conexion->conexion;

        $stmt = $con->prepare("DELETE FROM usuarios WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $stmt->close();
        $con->close();
    }


    public function GetProyectoPorId($id)
    {
        $conexion = new Conexion();
        $con = $conexion->conexion;

        $stmt = $con->prepare("SELECT * FROM proyectos WHERE id = ?");
        $stmt->bind_param("i", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $titulo = $row["titulo"];
            $peque_descripcion = $row["peque_descripcion"];
            $url = $row["url"];
            $subtitulo = $row["subtitulo"];
            $gran_descripcion = $row["gran_descripcion"];
            $fecha_publicacion = $row["fecha_publicacion"];
            $usuario_id = $row["usuario_id"];
            $archivo_juego = $row["archivo_juego"];
            $portada = $row["portada"];
            $proyecto = new Proyecto($id, $titulo, $peque_descripcion, $url, $subtitulo, $gran_descripcion, $fecha_publicacion, $usuario_id, $archivo_juego, $portada);
        }
        $stmt->close();
        $con->close();
        return $proyecto;
    }

    public function GetAllProyect()
    {
        $conexion = new Conexion();
        $con = $conexion->conexion;

        $stmt = $con->prepare("SELECT * FROM proyectos");

        $stmt->execute();

        $result = $stmt->get_result();

        $arrayProyectos = array();

        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $titulo = $row["titulo"];
            $peque_descripcion = $row["peque_descripcion"];
            $url = $row["url"];
            $subtitulo = $row["subtitulo"];
            $gran_descripcion = $row["gran_descripcion"];
            $fecha_publicacion = $row["fecha_publicacion"];
            $usuario_id = $row["usuario_id"];
            $archivo_juego = $row["archivo_juego"];
            $portada = $row["portada"];
            $proyecto = new Proyecto($id, $titulo, $peque_descripcion, $url, $subtitulo, $gran_descripcion, $fecha_publicacion, $usuario_id, $archivo_juego, $portada);

            array_push($arrayProyectos, $proyecto);
        }
        $stmt->close();
        $con->close();
        return $arrayProyectos;
    }

    public function GetAllProyectById($id)
    {
        $conexion = new Conexion();
        $con = $conexion->conexion;

        $stmt = $con->prepare("SELECT * FROM proyectos where usuario_id =?");
        $stmt->bind_param("i", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        $arrayProyectos = array();

        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $titulo = $row["titulo"];
            $peque_descripcion = $row["peque_descripcion"];
            $url = $row["url"];
            $subtitulo = $row["subtitulo"];
            $gran_descripcion = $row["gran_descripcion"];
            $fecha_publicacion = $row["fecha_publicacion"];
            $usuario_id = $row["usuario_id"];
            $archivo_juego = $row["archivo_juego"];
            $portada = $row["portada"];
            $proyecto = new Proyecto($id, $titulo, $peque_descripcion, $url, $subtitulo, $gran_descripcion, $fecha_publicacion, $usuario_id, $archivo_juego, $portada);

            array_push($arrayProyectos, $proyecto);
        }
        $stmt->close();
        $con->close();
        return $arrayProyectos;
    }

    public function InsertarProyecto($titulo, $peque_descripcion, $url, $subtitulo, $gran_descripcion, $fecha_publicacion, $usuario_id, $archivo_juego, $portada)
    {
        $conexion = new Conexion();
        $con = $conexion->conexion;
        $image = null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = file_get_contents($portada);
        }
        $stmt = $con->prepare("INSERT INTO proyectos (titulo, peque_descripcion, url, subtitulo, gran_descripcion, fecha_publicacion, usuario_id, archivo_juego, portada) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $titulo, $peque_descripcion, $url, $subtitulo, $gran_descripcion, $fecha_publicacion, $usuario_id, $archivo_juego, $image);
        $stmt->execute();

        $stmt->close();
        $con->close();
    }

    public function BorrarProyecto($id)
    {
        $conexion = new Conexion();
        $con = $conexion->conexion;

        $stmt = $con->prepare("DELETE FROM proyectos WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $stmt->close();
        $con->close();
    }

    //dibuja el album de juegos se hace asi ya que me daba error al importar la lista de ToImport
    public static function PrintListGames()
    {
        $modelo = new Modelo();

        $list = $modelo->GetAllProyect();

        echo '<div >';
        echo '<div class="container">';
        echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';
        foreach ($list as $proyecto) {
            echo '<div class="col">';
            echo '<div class="card shadow-sm" >';
            echo '<a href="Game.php?id=' . $proyecto->getId() . '" style="text-decoration: none; color: black;">';

            $imagen_binaria = $proyecto->getPortada();
            $imagen_base64 = base64_encode($imagen_binaria);
            $tipo_mime = mime_content_type('data:image/jpeg;base64,' . $imagen_base64);

            echo '<img class="bd-placeholder-img card-img-top align-top" src="data:' . $tipo_mime . ';base64,' . $imagen_base64 . '" width="100%" height="225" />';

            echo '<div class="card-body">';
            echo '<label class="card-text"> ' . $proyecto->getTitulo() . '</label> <p class="card-text"> ' . $proyecto->getPeque_descripcion() . '</p>';
            echo '<div class="d-flex justify-content-between align-items-center">';
            echo '<div class="btn-group" style="color: black;">';
            echo $modelo->GetUsuarioPorId($proyecto->getUsuario_id())->getNombre();
            echo '</div>';
            echo '<small class="text-muted">' . date("d/m/Y", strtotime($proyecto->getFecha_publicacion())) . '</small>';
            echo '</div></div></div></div></a>';
        }
        echo '</div></div></div>';
    }
}
?>