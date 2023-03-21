<?php
include_once('../modelo/Modelo.php');
$modelo = new Modelo();

// recibimos un proyecto por un post y lo metemos en la base de datos
if (isset($_POST)) {
    $title = $_POST["title"];
    $pequeDescripcion = $_POST["pequeDescripcion"];
    $url = $_POST["url"];
    $subtitulo = $_POST["subtitulo"];
    $granDescripcion = $_POST["granDescripcion"];
    //$portada = $_POST["portada"];
    $portada = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $portada = file_get_contents($_POST["portada"]);
    }
    $ArchJuego = $_POST["ArchJuego"];
    $idUser = $_POST["idUser"];
    $fecha_actual = date('Y-m-d');

    $modelo->InsertarProyecto($title, $pequeDescripcion, $url, $subtitulo, $granDescripcion, $fecha_actual, $idUser, $ArchJuego, $portada);
    header('Location: ../Files/MyProyects.php');
}
?>