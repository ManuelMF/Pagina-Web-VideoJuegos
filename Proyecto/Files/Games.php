<?php
include("../ToImport/Header.php");

if (isset($_COOKIE['id'])) {
    $user_id = $_COOKIE['id'];
}

echo '<br><br><h1 class="display-5 fw-bold lh-1 mb-3"  id="h1_subtitel">Todos los juegos</h1>';

//pintamos lista de juegos
include("../ToImport/ListGames.php");

include("../ToImport/Footer.php");
?>