<?php include("../ToImport/Header.php"); ?>

<article>

    <?php
    if (!isset($_COOKIE['id'])) {
        header('Location: RegIni.php?inises="ini"');
    }
    $modelo = new Modelo();
    //obtenemos la id del juego que queremos mostrar
    $id = $_GET['id'];
    //obtenemos el juego 
    $proyecto = $modelo->GetProyectoPorId($id);
    //obtenemos el usuario
    $usuario = $modelo->GetUsuarioPorId($proyecto->getUsuario_id());

    //pintamos
    echo '<div id="divProyect">';

    echo '<h1 class="display-5 fw-bold lh-1 mb-3" id="white">' . $proyecto->getTitulo() . '</h1>';

    echo '<P id="pMediano">' . $proyecto->getPeque_descripcion() . '</P>';

    echo '<iframe src="' . $proyecto->getUrl() . '" width="1200" height="720" allow="autoplay"></iframe>';

    echo '<br><br><h1 id="white" class="h3 mb-3 fw-normal">' . $proyecto->getSubtitulo() . '</h1>';

    echo '<p id="pMediano">' . $proyecto->getGran_decripcion() . '</p>';

    echo '<button id="centerbtn">Descargar aqui!</button>';

    $imagen_binaria = $usuario->getFotoPerfil();

    // Convertir la imagen a una URL de datos (data URI)
    $imagen_base64 = base64_encode($imagen_binaria);
    $tipo_mime = mime_content_type('data:image/jpeg;base64,' . $imagen_base64);

    // Mostrar la imagen en un elemento <img>
    echo "<br><br> <a href='Perfil.php?id=" . $usuario->getId() . "'><img class='roundedIMG' src='data:$tipo_mime;base64,$imagen_base64'  width='100' height='100' />";

    echo '<label id="white">&nbsp; Creado por  ' . $usuario->getNombre() . '</label></a>';

    echo '</div>';


    ?>

</article>

<?php include("../ToImport/Footer.php"); ?>