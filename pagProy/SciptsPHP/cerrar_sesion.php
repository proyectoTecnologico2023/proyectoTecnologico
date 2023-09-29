<?php
session_start();
// dstruye todas las variables de sesión
session_unset();
// destruye la sesión
session_destroy();
//redirige al usuario a la pagina principal
header("Location: ../index.html");
exit();

?>