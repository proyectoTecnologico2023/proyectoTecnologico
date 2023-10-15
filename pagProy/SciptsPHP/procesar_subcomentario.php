<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    $subcomentarioId = $_POST["comentario_id"];
    $comentario = $_POST["comentario"];

    $nombre = $_SESSION["usuario"];

    $sql = "INSERT INTO subcomentarios (comentario, fecha_comentario, usuario_nombre, publicacion_id) VALUES (?, NOW(), ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error en la consulta SQL: " . $conn->error);
    }

    $stmt->bind_param("ssi", $comentario, $nombre, $subcomentarioId);
    if ($stmt->execute()) {
        echo "Comentario enviado con éxito. Gracias por tu opinión.";
    } else {
        echo "Error al enviar el comentario: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "No se ha enviado un formulario de comentario.";
}

header("Location: ../paginasHTML/coment_completo.php?id=" . $subcomentarioId);
exit;
?>
