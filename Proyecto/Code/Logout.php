<?php
// acaba el tiempo de las cookies
if (!isset($_SESSION)) {
  session_start();
}
setcookie("id", "", time() - 3600, "/");
session_destroy();
header('Location: ../Files/Index.php');
exit;
?>