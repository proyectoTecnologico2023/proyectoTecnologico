<?php
error_reporting(E_ALL);
$servername = "localhost";
$username = "root";
$password = "";
$database = "politicando";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// consola para recuperar las noticias ordenadas por fecha de publicación
$sql = "SELECT * FROM noticias ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar las noticias
    while ($row = $result->fetch_assoc()) {
        echo '<div class="noticia">';
        echo '<p><i class="fas fa-user"></i>' . $row['usuario'] . '</p>';
        echo '<h3><a href="noticia_completa.php?id=' . $row['id'] . '">' . $row['titulo'] . '</a></h3>';
        echo '<a href="noticia_completa.php?id=' . $row['id'] . '"><img src="' . $row['imagen'] . '" alt="Imagen de la noticia"></a>';
        echo '</div>';
    }
} else {
    echo 'No se encontraron noticias.';
}

$conn->close();
?>
