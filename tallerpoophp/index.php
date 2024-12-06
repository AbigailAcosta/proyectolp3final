<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <style>
        body {
            background-image: url('../images/tienda.jpg'); /* Asegúrate de que la ruta sea correcta */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
        }
    </style>
    
    <?php include 'header.php'; ?>
    <title>LIBRERIA DICOSTA</title>
    <link rel="icon" href="favicon.ico" type="favicon.icon"/>
</head>

<body>
    <div class="container-login">
        <div class="wrap-login">
            <form class="login-form validate-form" id="formLogin" action="" method="post">
                <span class="login-form-title">ACCESO</span>

                <div class="wrap-input100" data-validate="Usuario incorrecto">
                    <input class="input100" type="text" id="nombre" name="nombre" placeholder="Usuario">
                    <span class="focus-efecto"></span>
                </div>

                <div class="wrap-input100" data-validate="Password incorrecto">
                    <input class="input100" type="password" id="clave" name="clave" placeholder="Clave">
                    <span class="focus-efecto"></span>
                </div>

                <div class="container-login-form-btn">
                    <div class="wrap-login-form-btn">
                        <div class="login-form-bgbtn"></div>
                        <button type="submit" name="submit" class="login-form-btn">Aceptar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

<?php include 'footer.php'; ?>
</html>
