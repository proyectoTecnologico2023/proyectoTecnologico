<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // si el usuario no está logeado, lo envia a la pagina de inicio de sesion
    session_start();
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: ../paginasHTML/loginPAG.php");
        exit();
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "politicando";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    // obtnr datos del formulario
    $nombre = $_SESSION["usuario"]; // obtiene el nombre actual del usuario logeado
    $titulo = $_POST["titulo"];
    $comentario = $_POST["comentario"];
    $sql = "INSERT INTO comentarios (nombre, titulo, comentario, fecha) VALUES (?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error en la consulta SQL: " . $conn->error);
    }

    // vincula los parametros y ejecuta la consulta
    $stmt->bind_param("sss", $nombre, $titulo, $comentario);
    if ($stmt->execute()) {
        echo "Comentario enviado con éxito. Gracias por tu opinión.";
    } else {
        echo "Error al enviar el comentario: " . $stmt->error;
    }
    // Cerrar la conexión
    $stmt->close();
    $conn->close();
} else {
    echo "No se ha enviado un formulario de comentario.";
}
header("Location: ../paginasHTML/discusion.php");
exit();
?>