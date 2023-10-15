<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "politicando";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    // datos form
    $nombreUsuario = $_POST["usuario"];
    $email = $_POST["email"];
    $contrasena = $_POST["pswd"];

    // chequea si el usuario ya existe en la bd
    $sql = "SELECT id FROM usuarios WHERE nombreUsuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nombreUsuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "El nombre de usuario ya está en uso. Por favor, elige otro.";
    } else {
        $sql = "INSERT INTO usuarios (nombreUsuario, email, contrasena) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nombreUsuario, $email, $contrasena);

        if ($stmt->execute()) {
            echo "Registro exitoso. Ahora puedes iniciar sesión.";
        } else {
            echo "Error en el registro: " . $conn->error;
        }
    }
    header("refresh:2;url=../index.html");
    $conn->close();
}
?>
