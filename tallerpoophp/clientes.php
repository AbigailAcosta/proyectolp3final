<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
$usuario = $_SESSION["usuario"];

if ($usuario == null) {
    header('location: ./');
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Cliente</title>

    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" href="favicon.ico" type="favicon.icon" />
</head>

<body>
    <?php include 'menu.php'; ?>

    <main role="main">
        <div class="jumbotron">
            <div class="col-sm-8 mx-auto">
                <h1>Agregar Cliente</h1>
                <form action="php/altacliente.php" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre del Cliente:</label>
                        <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Ej. Juan Pérez" required>
                    </div>
                    <div class="form-group">
                        <label for="ciruc">CI/RUC:</label>
                        <input class="form-control" type="text" name="ciruc" id="ciruc" placeholder="Ej. 12345678" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input class="form-control" type="text" name="telefono" id="telefono" placeholder="Ej. 0981 234 567">
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección:</label>
                        <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Ej. Calle Falsa 123">
                    </div>
                    <div class="form-group">
                        <label for="tipo">Tipo:</label>
                        <select class="form-control" name="tipo" id="tipo" required>
                            <option value="1">Cliente</option>
                            <option value="2">Proveedor</option>
                        </select>
                    </div>
                    <button class="btn btn-lg btn-success" type="submit">Guardar</button>
                </form>
            </div>
        </div>
    </main>
</body>

<?php include 'footer.php'; ?>
<script src="js/clientes.js"></script>
<script>
    // Convierte el texto ingresado en mayúsculas automáticamente
    document.getElementById("nombre").addEventListener("keypress", function (e) {
        e.target.value = e.target.value.toUpperCase();
    });
</script>
</html>
