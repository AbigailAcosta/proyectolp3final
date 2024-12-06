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
    <title>Edición Clientes</title>

    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <?php
    include 'menu.php';

    $id = $_REQUEST['id'];  // Obtener el ID de la URL

    include 'class/class.clientes.php';
    $cliente = new Clientes(); 
    $resultado = $cliente->getClientes($id);  // Obtener el cliente por su ID

    // Verificar si la consulta retorna un resultado
    if ($resultado && $resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();  // Obtener los datos del cliente
    ?>
        <main role="main">
            <div class="jumbotron">
                <div class="col-sm-8 mx-auto">
                   <h1>Modificación de Cliente</h1>
                <form action="php/editarclientes.php" method="post">
                    <input type="hidden" name="id" value="<?= $id ?>">  <!-- ID del cliente -->
                    
                    <label class="label label-secondary" for="razonsocial">Razón Social:</label>
                    <input class="form-control" type="text" name="razonsocial" id="razonsocial" size="45" value="<?= isset($fila['razonsocial']) ? $fila['razonsocial'] : '' ?>" required><br>
                    
                    <label class="label label-secondary" for="ciruc">CI/RUC:</label>
                    <input class="form-control" type="text" name="ciruc" id="ciruc" size="45" value="<?= isset($fila['ciruc']) ? $fila['ciruc'] : '' ?>" required><br>
                    
                    <label class="label label-secondary" for="domicilio">Domicilio:</label>
                    <input class="form-control" type="text" name="domicilio" id="domicilio" size="45" value="<?= isset($fila['domicilio']) ? $fila['domicilio'] : '' ?>" required><br>
                    
                    <label class="label label-secondary" for="telefono">Teléfono:</label>
                    <input class="form-control" type="text" name="telefono" id="telefono" size="45" value="<?= isset($fila['telefono']) ? $fila['telefono'] : '' ?>" required><br>

                    <!-- Agregar campo Tipo -->
                    <label class="label label-secondary" for="tipo">Tipo:</label>
                    <select class="form-control" name="tipo" id="tipo" required>
                        <option value="1" <?= (isset($fila['tipo']) && $fila['tipo'] == 1) ? 'selected' : '' ?>>Cliente</option>
                        <option value="2" <?= (isset($fila['tipo']) && $fila['tipo'] == 2) ? 'selected' : '' ?>>Proveedor</option>
                    </select><br>

                    <input class="btn btn-lg btn-success" type="submit" value="Actualizar">
                </form>
                </div>
            </div>
        </main>
    <?php
    } else {
        echo '<p>Cliente no encontrado.</p>';  // Mensaje si el cliente no existe
    }
    ?>
</body>

<?php
include 'footer.php';
?>

<script src="js/clientes.js"></script>
<script>
    $(document).ready(function() {
        document.getElementById("nombre").addEventListener("keypress", forceKeyPressUppercase, false);
    });
</script>

</html>
