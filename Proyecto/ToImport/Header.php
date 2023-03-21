<!--que se importan en cada página ya que es siempre lo mismo -->
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../CSS/CSS.css">
    <link rel="stylesheet" type="text/css" href="../CSS/Perfil.css">
    <link rel="stylesheet" type="text/css" href="../CSS/RegIni.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

    <!--clases de boostrap-->
    <header class="p-3 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                <a href="Index.php"><img src="../Recourses/logo.png" width="50px" height="50px" alt="Logo"></a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">

                    <!--Cogo la pagina actual para aplicarle un estilo diferente si esta en ella si estas en el indice sale el indice mas ocuro-->
                    <?php $currentPage = basename($_SERVER['PHP_SELF']); ?>

                    <li><a href="Index.php" <?php echo ($currentPage == 'Index.php') ? 'class="nav-link px-2 text-secondary""' : 'class="nav-link px-2 text-white"'; ?>>Inicio</a></li>
                    <li><a href="Games.php" <?php echo ($currentPage == 'Games.php') ? 'class="nav-link px-2 text-secondary""' : 'class="nav-link px-2 text-white"'; ?>>Juegos</a></li>
                    <?php
                    session_start();
                    if (isset($_COOKIE['id'])) {
                        // aplicas una o otra segun si es true o false
                        echo '<li><a href="MyProyects.php" ' . (($currentPage == 'MyProyects.php') ? 'class="nav-link px-2 text-secondary"' : 'class="nav-link px-2 text-white"') . '>Tus Proyectos</a></li>';
                    }
                    ?>
                    <li><a href="AboutUs.php" <?php echo ($currentPage == 'AboutUs.php') ? 'class="nav-link px-2 text-secondary""' : 'class="nav-link px-2 text-white"'; ?>>Sobre nosotros</a></li>
                    <li><a href="Contact.php" <?php echo ($currentPage == 'Contact.php') ? 'class="nav-link px-2 text-secondary""' : 'class="nav-link px-2 text-white"'; ?>>Contacto</a></li>
                </ul>
                <?php
                // si estas registrado tienes en el header un logo de suma que si le das vas directamente a crear un proyecto
                if (isset($_COOKIE['id'])) {
                    echo '<div class="text-end" style="margin-right:20px">';

                    echo '<a class="dropdown-item" href="CreateProyect.php"><img src="../Recourses/suma.png" width="25px" height="25px" alt="Logo"></a>';
                    echo '</div>';
                }
                ?>
                <div class="text-end">
                    <?php
                    include_once('../modelo/Modelo.php');
                    // mira si estas registrado para ponerte una imagen con tu foto de perfil o un Registrate y un inicia sesion
                    if (isset($_COOKIE['id'])) {
                        $modelo = new Modelo();
                        $user_id = $_COOKIE['id'];
                        $usuario = $modelo->GetUsuarioPorId($user_id);
                        $imagen_binaria = $usuario->getFotoPerfil();

                        // Convertir la imagen a una URL de datos (data URI)
                        $imagen_base64 = base64_encode($imagen_binaria);
                        $tipo_mime = mime_content_type('data:image/jpeg;base64,' . $imagen_base64);

                        echo '<div class="dropdown text-end">';
                        echo '<a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">';

                        // Mostrar la imagen en un elemento <img>
                        echo '<img src="data:' . $tipo_mime . ';base64,' . $imagen_base64 . '" alt="mdo" width="50" height="50" class="rounded-circle">';
                        echo '</a>';
                        echo '<ul class="dropdown-menu text-small" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 34px);" data-popper-placement="bottom-start">';
                        echo '<li><a class="dropdown-item" href="CreateProyect.php">New project...</a></li>';
                        echo '<li><a class="dropdown-item" href="perfil.php?id=' . $user_id . '">Profile</a></li>';
                        echo '<li><hr class="dropdown-divider"></li>';
                        echo '<li><a class="dropdown-item" href="../Code/Logout.php">Sign out</a></li>';
                        echo '</ul>';
                        echo '</div>';
                    } else {
                        echo '<a href="RegIni.php"><button type="button" class="btn btn-outline-light me-2">Login</button></a>';
                        echo '<a href="RegIni.php?ele=reg"><button type="button" class="btn btn-warning">Sign-up</button></a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </header>