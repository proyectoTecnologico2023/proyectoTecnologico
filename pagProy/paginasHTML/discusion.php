<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discusión</title>
    <link rel="stylesheet" href="../EstilosCSS/paginas2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <?php include("header.php"); ?>
    <!--FORM PARA AGREGAR PUBLICACIONES -->
    <div class="comentar" width="100%">
        <section class="formulario" id="formulario-publicacion">
            <form action="../SciptsPHP/procesar_comentario.php" method="post" enctype="multipart/form-data">
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo" required>
                <label for="comentario">Texto:</label>
                <textarea name="comentario" id="comentario" rows="4" required></textarea>
            
                <input type="submit" value="Publicar">
            </form>
        </section>
    </div>
    <!-- ----------------------------------------------------------->
    <h2>Publicaciones</h2>
    <section class="ver-publicaciones">
        <?php include("../SciptsPHP/ver-publicaciones.php"); ?>
    </section>
    <footer>
        <div class="footer-content">
            <p>&copy; 2023 POLITICANDO. Todos los derechos reservados.</p>
            <p>Contacto: info@politicando.com</p>
        </div>    
    </footer>
</body>
</html>