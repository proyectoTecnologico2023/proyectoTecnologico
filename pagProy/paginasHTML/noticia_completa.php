<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticia</title>
    <link rel="stylesheet" href="../EstilosCSS/paginas2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <style>
        .noticia-completa {
            max-width: 75%;
            margin: 100px 0 0 5%; 
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column; 
            justify-content: center; 
            align-items: left;
        }       

        .noticia-completa h1 {
            font-size: 28px;
            font-family: 'Bangers';
            font-weight: bold;
            text-align: left;
            color: black;
        }

        .noticia-completa img {
            width: 75%;
            height: auto;
            margin-bottom: 20px;
        }

        .noticia-completa p {
            font-size: 15px;
            line-height: 1.5;
            margin-bottom: 20px;
            font-family: 'Arvo';
        }

        .noticia-completa p.fecha{
            font-style: italic;
            color: gray;
            font-size: 15px;
        }

    </style>
</head>
<body>
    <?php include("header.php"); ?>
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
        $noticia_id = $_GET['id'];
        $sql = "SELECT * FROM noticias WHERE id = $noticia_id";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo '<div class="noticia-completa">';
            echo '<p><i class="fas fa-user"></i>' . $row['usuario'] . '</p>';
            echo '<h1>"' . $row['titulo'] . '"</h1>';
            echo '<img src="' . $row['imagen'] . '" alt="Imagen de la noticia">';
            echo '<p>' . $row['texto'] . '</p>';
            echo '<p class="fecha"></i>Fecha de publicación: ' . $row['fecha'] . '</p>';
            echo '</div>'; 
            echo 'No se encontró la noticia.';
        }
    } else {
        echo 'ID de noticia no especificado.';
    }
    
    $conn->close();
    ?>
    <?php include("footer.php"); ?>
</body>
</html>