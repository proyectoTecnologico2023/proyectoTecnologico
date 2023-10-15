<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "politicando";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

$sql = "SELECT id, nombre, fecha, titulo, comentario FROM comentarios ORDER BY fecha DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='publicacion'>";
        echo "<div class='info'>";
        echo '<p><i class="fas fa-user"></i>' . $row['nombre'] . '</p>';
        echo '<p><i class="fas fa-calendar"></i>' . $row['fecha'] . '</p>';
        echo '<h3><a href="coment_completo.php?id=' . $row['id'] . '">' . $row['titulo'] . '</a></h3>';
        echo '<p><a href="coment_completo.php?id=' . $row['id'] . '">'. $row ['comentario']. '</a></p>';
        echo "</div>";
        echo '<a href="coment_completo.php?id=' . $row['id'] . '"><i class="fas fa-external-link-alt"></i></a>';
        echo "</div>";
    }
} else {
    echo "No se encontraron publicaciones.";
}


$conn->close();
?>