<!DOCTYPE html>
<html>
<head>
	<title>Registro/Login</title>
	<link rel="stylesheet" href="../EstilosCSS/loggin.css">
</head>
<body>
    <?php include("header.php"); ?>
<!-- FORMULARIOS  -->
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">
            <!-- Formulario de registro -->
			<div class="signup">
				<form action="../SciptsPHP/registro.php" method="post">
					<label for="chk" aria-hidden="true">REGISTRO</label>
					<input type="text" name="usuario" placeholder="Nombre de usuario" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Contraseña" required="">
					<button>REGISTRATE</button>
				</form>
			</div>
            <!-- Form login -->
			<div class="login">
                <form action="../SciptsPHP/login.php" method="post">
                    <label for="chk" aria-hidden="true">LOG-IN</label>
                    <input type="text" name="usuario" placeholder="Username" required="">
                    <input type="password" name="pswd" placeholder="Contraseña" required="">
                    <button type="submit">INICIAR SESIÓN</button>
                </form>
            </div>
	</div>
<!-- --------------------------------------->
<!-- SCRIPT: si el usuario ya está logeado, lo manda a la pagina de cerrar sesion-->
    <script>
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            echo 'window.location.href = "cerrarsesionPAG.php";';
        }
        ?>
    </script>
</body>
</html>