<!DOCTYPE html>  
<!-- pagina para cerrar sesion -->
<html>
<head>
    <title>Cerrar Sesión</title>
    <link rel="stylesheet" href="../EstilosCSS/loggin.css">
</head>
<body>
    <?php include("header.php"); ?>
    <div class="main">
        <div class="perfil">
            <!-- Botón para cerrar sesión -->
            <form action="../SciptsPHP/cerrar_sesion.php" method="post">
                <button type="submit">Cerrar Sesión</button>
            </form>
        </div>
    </div>
</body>
</html>
 