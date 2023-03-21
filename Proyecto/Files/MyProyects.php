<?php
include("../ToImport/Header.php");

echo '<br><br><h1 class="display-5 fw-bold lh-1 mb-3" id="h1_subtitel">Todos tus proyectos</h1>';

include("../ToImport/ListMyGames.php");

echo '<br><a href="CreateProyect.php" id="refSinBarra"><button id="centerbtn" type="button">Sube un proyecto aqui!</button></a>';

include("../ToImport/Footer.php");
?>