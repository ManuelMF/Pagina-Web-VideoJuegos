<?php
include_once('../modelo/Modelo.php');
$modelo = new Modelo();

// obtenemos un Registro o un inicio de sesion lo validamos, si esta todo bien y segun lo que sea crea la cuenta y crea las cookies o solo inicia sesion
if (isset($_POST)) {
    if (isset($_POST['nombre'])) {
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $fotoPerfil = $_POST["fotoPefil"];

        $modelo->InsertarUsuario($nombre, $email, $pass, $fotoPerfil);

        $id = $modelo->GetUsuarioPorEmail($email)->getId();
        $_SESSION['id'] = $id;
        setcookie('id', $id, time() + 3600, '/');
        header('Location: ../Files/Index.php?id=' . $id);
        exit;

    } else {

        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $id = $modelo->GetUsuarioPorEmail($email)->getId();

        if ($modelo->ComprovarSiContraEmailCorrecto($email, $pass)) {
            $_SESSION['id'] = $id;
            setcookie('id', $id, time() + 3600, '/');
            header('Location: ../Files/Index.php?id=' . $id);
            exit;
        } else {
            header('Location: ../Files/RegIni.php?email=' . $email . '&datosMal=true');
            exit;
        }
    }


}

?>