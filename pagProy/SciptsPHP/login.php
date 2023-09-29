<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "politicando";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    $usuario = $_POST["usuario"];
    $password = $_POST["pswd"];

    $sql = "SELECT * FROM usuarios WHERE nombreUsuario = '$usuario' AND contrasena = '$password'";
    $result = $conn->query($sql);

    header("Location: ../loginPAG.html");
    exit();

    $conn->close();
}
?>
