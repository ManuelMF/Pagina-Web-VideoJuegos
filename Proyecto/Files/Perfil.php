<?php
include("../ToImport/Header.php");
$modelo = new Modelo();

//obtenemos el id del userpor get no por cookies ya que puedes entrar a ver otros perfiles de la gente
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $usuario = $modelo->GetUsuarioPorId($user_id);

    $imagen_binaria = $usuario->getFotoPerfil();

    // Convertir la imagen a una URL de datos (data URI)
    $imagen_base64 = base64_encode($imagen_binaria);
    $tipo_mime = mime_content_type('data:image/jpeg;base64,' . $imagen_base64);

    // Mostrar la imagen en un elemento <img>
    echo "<img class='rounded-image' src='data:$tipo_mime;base64,$imagen_base64'  width='10%' height='20%'/> <br>";

    echo '<div id="divConP">';
    echo '<label id="white">' . $usuario->getNombre() . '</label>';

    echo '<section id="perfilUsuario">';
    echo '<h1 class="h3 mb-3 fw-normal" id="white"> Datos Usuario</h1>';

    echo '<b id="white">Fecha de ingreso</b> <br>';
    echo '<label id="white">' . $usuario->getFechaCreacion() . '</label>';

    echo '<br><b id="white">Usuario</b><br>';
    echo '<label id="white">' . $usuario->getNombre() . '</label>';

    echo '<br><b id="white">Correo electronico</b><br>';
    echo '<label id="white">' . $usuario->getEmail() . '</label>';
    echo '</section>';
    echo '</div>';

    echo '<section id="list">';
    echo '<h1 class="h3 mb-3 fw-normal" id="h1_subtitel">Proyectos de ' . $usuario->getNombre() . '</h1>';
    include("../ToImport/ListMyGames.php");

    echo '<section>';
}

include("../ToImport/Footer.php");
?>