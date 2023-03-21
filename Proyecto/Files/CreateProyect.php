<?php
include("../ToImport/Header.php");

if (isset($_COOKIE['id'])) {
    $user_id = $_COOKIE['id'];
}
// formulario para crear poryectos
?>
<div id="divProyectos">
    <form method="post" action="../Code/RecibirProyecto.php">

        <h1 class="h3 mb-3 fw-normal" id="white">Sube un proyecto</h1>

        <div class="form-floating">
            <input name="title" class="form-control" type="text" required /><br>
            <label for="title">Title</label>
        </div>

        <div class="form-floating">
            <input name="pequeDescripcion" class="form-control" type="text" required /><br>
            <label for="floatingInput">Pequeña descripcion</label>
        </div>

        <div class="form-floating">
            <input name="url" class="form-control" type="text" required /><br>
            <label for="floatingInput">Url a youtube</label>
        </div>

        <div class="form-floating">
            <input name="subtitulo" class="form-control" type="text" required /><br>
            <label for="floatingInput">Subtitulo</label>
        </div>

        <div class="form-floating">
            <input name="granDescripcion" class="form-control" type="text" required /><br>
            <label for="floatingInput">Gran descripcion</label>
        </div>

        <label id="textIzquierda" for="portada">Portada</label><br>
        <input name="portada" type="file" required /><br><br>

        <label id="textIzquierda" for="ArchJuego">Archivo Juego</label><br>
        <input name="ArchJuego" type="file" required /><br><br>

        <input type="hidden" name="idUser" value="<?php echo $user_id ?>">

        <input type="submit" name="submit" value="Subir proyecto" class="w-100 btn btn-lg btn-primary">
    </form>
</div>
<?php
include("../ToImport/Footer.php");
?>