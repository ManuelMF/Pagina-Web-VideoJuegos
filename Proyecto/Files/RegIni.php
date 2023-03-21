<script src="../JS/RegIni.js"></script>
<?php

include("../ToImport/Header.php");
//cogemos la eleccion si es registro o iniciar sesion
$eleccion = "";
if (isset($_GET['ele']))
    $eleccion = $_GET['ele'];

echo '<div id="divConR"><br><br>';


if (isset($_GET['ele']) && $eleccion == "reg") {
    // si es registro pintamos el form de registro
    echo '<a href="RegIni.php?ele=reg"><input id="btn" class="button-colorSelected" type="submit" value="Sign Up"></a>';
    echo '<a href="RegIni.php?ele=ini"><input id="btn" class="button-colorNoSelected" type="submit" value="Log In"></a><br><br>';

    echo '<form id="reg" method="POST" action="../Code/RecibirDatos.php" onsubmit="return validarRegistro(this)">';
    echo "<section>";
    echo '<h1 class="h3 mb-3 fw-normal" id="white">Registrate gratis</h1>';

    echo '<div class="form-floating">';
    echo '<input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre Completo">';
    echo '<label for="nombre">Nombre Completo</label>';
    echo '</div>';

    echo '<div class="form-floating">';
    echo '<input id="email" class="form-control" type="email" name="email" placeholder="Direccion de Email">';
    echo '<label for="email">Direccion de Email</label>';
    echo '</div>';

    echo '<div class="form-floating">';
    echo '<input id="password" class="form-control" type="password" name="pass" placeholder="Contraseña">';
    echo '<label for="password">Contraseña</label>';
    echo '</div><br>';

    echo '<label id="textIzquierda" for="fotoPefil">Foto de perfil</label><br>';
    echo '<input type="file" name="fotoPefil"><br><br>';


    echo '<input class="w-100 btn btn-lg btn-primary" type="submit" value="EMPEZAR">';

    echo "</section>";
} else {
    // sino sera iniciar sesion
    echo '<a href="RegIni.php?ele=reg"><input id="btn" class="button-colorNoSelected" type="submit" value="Sign Up"></a>';
    echo '<a href="RegIni.php?ele=ini"><input id="btn" class="button-colorSelected" type="submit" value="Log In"></a><br><br>';

    echo '<form id="iniSes" method="POST" action="../Code/RecibirDatos.php" onsubmit="return validarInicioSesion(this)">';
    echo "<section>";
    echo '<h1 class="h3 mb-3 fw-normal" id="white">¡Bienvenido de nuevo!</h1>';
    //si le llega un get de datos mal los pinta
    if (isset($_GET['datosMal'])) {
        $email = $_GET['email'];
        echo '<div class="form-floating">';
        echo '<input id="email" class="form-control" type="email" name="email" placeholder="Direccion de Email" value="' . $email . '"> ';
        echo '<label for="email">Direccion de Email</label>';
        echo '</div>';
    } else {
        echo '<div class="form-floating">';
        echo '<input id="email" class="form-control" type="email" name="email" placeholder="Direccion de Email">';
        echo '<label for="email">Direccion de Email</label>';
        echo '</div>';
    }
    echo '<div class="form-floating">';
    echo '<input id="password" class="form-control" type="password" name="pass" placeholder="Contraseña">';
    echo '<label for="floatingPassword">Contraseña</label>';
    echo '</div>';
    echo '<div class="checkbox mb-3"> </div>';

    echo '<input class="w-100 btn btn-lg btn-primary" type="submit" value="ACCEDER">';
    echo "</section>";
}
// pinta errores
if (isset($_GET['datosMal'])) {
    echo '<p style="color: red;" id="error">Contrasña incorrecta</p>';
} else if (isset($_GET['inises'])) {
    echo '<p style="color: red;" id="error">Inicia sesion para ver los proyectos</p>';
} else
    echo '<p style="color: red;" id="error"></p>';
echo "</form>";
echo '</div>';

if (isset($_GET['ele']) && $eleccion == "reg") {
    echo '<br><br><br><br><br><br><br>';
} else {
    echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
}


echo '<script src="../JS/RegIniValidator.js"></script>';

include("../ToImport/Footer.php");


?>