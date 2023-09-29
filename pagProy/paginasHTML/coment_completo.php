<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicación</title>
    <!-- una es la hoja de estilos y lo otro para los iconos externos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../EstilosCSS/paginas2.css">
    <!-- ------------------------ -->
    <!--Estilos para la seccion de publicaciones-->
    <style>
        .coment-completa {
            max-width: 75%;
            margin: 100px 5% 0 0; 
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column; 
            justify-content: center; 
            align-items: left; 
        }       

        /* titulo de la noticia */
        .coment-completa h1 {
            font-size: 28px;
            font-family: 'Bangers';
            font-weight: bold;
            text-align: left;
            color: black;
        }


        /* texto de la noticia */
        .coment-completa p {
            font-size: 20px;
            line-height: 1.5;
            margin-bottom: 20px;
            font-family: 'Arvo';
        }

        /* fecha */
        .coment-completa p.fecha{
            font-style: italic;
            color: gray;
            font-size: 15px;
        }
        .formulario {
            margin-top: 10px;
            margin-right: 50%;
        }

    </style>
</head>
<body>
    <?php include("header.php"); ?>
    <!--Mostrar info publicaciones-->
    <?php
    //conexión BD
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "politicando";
    
    $conn = new mysqli($servername, $username, $password, $database);
    
    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }
    // obtener el id de la noticia desde la url
    if (isset($_GET['id'])) {
        $comentario_id = $_GET['id'];
        // Consulta SQL para obtener los detalles de la noticia
        $sql = "SELECT * FROM comentarios WHERE id = $comentario_id";
        $result = $conn->query($sql);
    }
    
    if ($result->num_rows > 0) {
        // Mostrar los detalles del comentario completa
        $row = $result->fetch_assoc();
        echo '<div class="coment-completa">';
        echo '<h1>' . $row['titulo'] . '</h1>';
        echo '<p>' . $row['comentario'] . '</p>';
        echo '<p class="fecha">Fecha de publicación: ' . $row['fecha'] . '</p>';
        echo '</div>'; 
    } else {
        echo 'No se encontró el comentario.';

    }
    $conn->close();
    ?>
    <!-- ----------------------------------------------------------->
    <!-- Formulario para agregar comentarios a la publicacion -->
    <div class="formulario">
        <form action="../SciptsPHP/procesar_subcomentario.php" method="post">
            <label for="comentario">Comentario:</label>
            <textarea name="comentario" id="comentario" rows="4" required></textarea>

            <input type="hidden" name="comentario_id" value="<?php echo $comentario_id; ?>">
            <input type="submit" value="Publicar Comentario">
        </form>
    </div>
    <!-- ------------------------------------------------ -->
    <!-- Ver los comentarios de la publicacion-->
    <section class="ver-subcomentarios.php">
        <?php include("../SciptsPHP/ver-subcomentarios.php"); ?>
    </section>
    <!-- ---------------------------------------------------------->
    <?php include("footer.php"); ?>
</body>
</html>