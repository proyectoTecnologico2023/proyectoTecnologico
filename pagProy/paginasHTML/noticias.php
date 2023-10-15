<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
    <link rel="stylesheet" href="../EstilosCSS/paginas2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <?php include("header.php"); ?>
    <!-- BOTON OCULTAR/MOSTRAR FORMULARIO -->
    <button id="mostrar-formulario">Publicar</button>
    <div class="hola" width="100%">
        <section class="publicar-noticia" id="formulario-publicacion">
            <form action="../SciptsPHP/procesar_noticia.php" method="post" enctype="multipart/form-data">
                <label for="titulo">Título de la Noticia/Denuncia:</label>
                <input type="text" name="titulo" id="titulo" required>
            
                <label for="imagen">Imagen:</label>
                <input type="file" name="imagen" id="imagen" accept="image/*" required>
            
                <label for="texto">Información:</label>
                <textarea name="texto" id="texto" rows="4" required></textarea>
            
                <input type="submit" value="Publicar">
            </form>
        </section>
    </div>
    <!-- ------------------------------------------------------- -->
    <h2>Noticias/Denuncias Publicadas</h2>
    <section class="ver-noticias">
        <?php include("../SciptsPHP/ver-noticias.php"); ?>
    </section>
    <footer>
        <div class="footer-content">
            <p>&copy; 2023 POLITICANDO. Todos los derechos reservados.</p>
            <p>Contacto: info@politicando.com</p>
        </div>    
    </footer>
    <!-- SCRIPT BOTON -->
    <script>
        const botonPublicar = document.getElementById('mostrar-formulario');
        const formularioPublicacion = document.getElementById('formulario-publicacion');
        botonPublicar.addEventListener('click', function () {
         // verifcia si el formulario esta visible
        if (formularioPublicacion.style.display === 'none' || formularioPublicacion.style.display === '') {
        // si está oculo, lo muesta
            formularioPublicacion.style.display = 'block';
        }
        else {
        // si está visible, lo oculta
        formularioPublicacion.style.display = 'none';
        }
});
    </script>
</body>
</html>