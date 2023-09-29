<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../paginasHTML/loginPAG.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "politicando";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    $nombre = $_SESSION["usuario"]; 
    $titulo = $_POST["titulo"];
    $texto = $_POST["texto"];
    //fecha actual
    $fecha_actual = date("Y-m-d");
    // subir la imagen al servidor
    $imagenNombre = $_FILES['imagen']['name'];
    $imagenTemp = $_FILES['imagen']['tmp_name'];
    $imagenRuta = "../fotosSubidas/" . $imagenNombre; // ruta donde se suben las imagenes

    if (move_uploaded_file($imagenTemp, $imagenRuta)) {
        // insertar la noticia en la bd
        $sql = "INSERT INTO noticias (titulo, usuario, imagen, texto, fecha) VALUES (?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Error en la consulta SQL: " . $conn->error);
        }

        //vincular los prmetros y ejecuta
        $stmt->bind_param("sssss", $titulo, $nombre, $imagenRuta, $texto, $fecha_actual);

        if ($stmt->execute()) {
            echo "Noticia publicada con éxito.";
        } else {
            echo "Error al publicar la noticia: " . $stmt->error;
        }

        //cierra la conxion
        $stmt->close();
    } else {
        echo "Error al subir la imagen.";
    }

    $conn->close();
} else {
    echo "No se ha enviado un formulario de noticia.";
}
header("Location: ../paginasHTML/noticias.php"); // redirige a la pagina de noticias
exit();
?>
