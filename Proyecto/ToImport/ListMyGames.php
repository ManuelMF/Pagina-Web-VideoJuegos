<!--Pinta un album cunado lo importen pero mira solo los proyectos que sean tuyos-->
<article>
    <?php

    //  cogemos la id para filtrar
    if (isset($_GET['id'])) {
        $user_id = $_GET['id'];
    }

    $modelo = new Modelo();
    //lista de tus proyetos
    $list = $modelo->GetAllProyectById($user_id);

    //pintamos con un bucle
    echo '<div >';
    echo '<div class="container">';
    echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';
    foreach ($list as $proyecto) {
        echo '<div class="col">';
        echo '<div class="card shadow-sm" >';
        echo '<a id="refSinBarra" href="Game.php?id=' . $proyecto->getId() . '" style=" color: black;">';

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
    ?>
</article>