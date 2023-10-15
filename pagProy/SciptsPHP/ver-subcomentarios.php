<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "politicando";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}
if (isset($_GET['id'])) {
    $comentario_id = $_GET['id'];
    // consulta  para obtener solo los comentarios de esa publicacion
    $sql = "SELECT * FROM subcomentarios WHERE publicacion_id=$comentario_id ORDER by fecha_comentario";
    $result = $conn->query($sql);
}

if ($result->num_rows > 0) {
    // mostrar info
    while ($row = $result->fetch_assoc()) {
        echo "<div class='coments'>";
        echo '<p><i class="fas fa-user"></i>' . $row['usuario_nombre'] . '</p>';
        echo '<p><i class="fas fa-calendar"></i>' . $row['fecha_comentario'] . '</p>';
        echo '<p>' .  $row ['comentario']. '</p>';
        echo "</div>";
    }
} 

$conn->close();
?>