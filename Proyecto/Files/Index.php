<?php
include("../ToImport/Header.php");
?>
<div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-4" src="../Recourses/logo.png" alt="" width="200px" height="200px">
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4" id="white">Página web donde puedes ver y exponer proyectos o videojuegos</p>
        <?php
        //si estas registrado puedes crear el proyecto sino te lleva a registrate
        if (isset($_COOKIE['id'])) {
            echo '<div class="d-grid gap-2 d-sm-flex justify-content-sm-center">';
            echo '    <a href="CreateProyect.php"><button type="button" class="btn btn-primary btn-lg px-4 gap-3">Expon tu proyecto aqui!</button></a>';
            echo '</div>';
        } else {
            echo '<div class="d-grid gap-2 d-sm-flex justify-content-sm-center">';
            echo '    <a href="RegIni.php"><button type="button" class="btn btn-primary btn-lg px-4 gap-3">Expon tu proyecto aqui!</button></a>';
            echo '</div>';
        }
        ?>
    </div>
</div>

<div class="col-lg-6">
    <h1 class="display-5 fw-bold lh-1 mb-3" id="h1_title">Proyectos destacados</h1>
</div>

<?php
$modelo = new Modelo();

//pintamos los proyectos destacados que queramos solo sabiendo la id
$proyecto1 = $modelo->GetProyectoPorId(1);
$proyecto1->printProyect();

$proyecto2 = $modelo->GetProyectoPorId(2);
$proyecto2->printProyect();

echo '<h1 class="display-5 fw-bold lh-1 mb-3" id="h1_subtitel">Todos los juegos</h1>';
//pintamos lista de album 
Modelo::PrintListGames();

include("../ToImport/Footer.php");
?>