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
    <title>Listado de Clientes</title>
    <link rel="icon" href="favicon.ico" type="favicon.icon"/>

    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">

</head>

<body>
    <?php include 'menu.php'; ?>
    <main role="main">
        <div class="jumbotron">
            <div class="col-sm-8 mx-auto">
                <h2>Listado de Clientes</h2>
                <a class="btn btn-primary" href="clientes.php">Nuevo</a>
                <a class="btn btn-warning" target="_blank" href="pdf/listaclientes.php">PDF Simple</a>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Razón Social</th>
                            <th>CI/RUC</th>
                            <th>Domicilio</th>
                            <th>Teléfono</th>
                            <th colspan="2" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php
                        include 'class/class.clientes.php';
                        $clientes = new Clientes();
                        $resultado = $clientes->getClientes();

                        foreach ($resultado as $fila) { ?>
                            <tr>
                                <td><?= $fila['idPersona'] ?></td>
                                <td><?= $fila['razonsocial'] ?></td>
                                <td><?= $fila['ciruc'] ?></td>
                                <td><?= $fila['domicilio'] ?></td>
                                <td><?= $fila['telefono'] ?></td>
                                <td><a href="ecliente.php?id=<?= $fila['idPersona'] ?>">Editar</a></td>
                                <td><a href="#" onclick="borrar(<?= $fila['idPersona'] ?>);">Borrar</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
<?php include 'footer.php'; ?>
<script src="js/clientes.js"></script>
</html>
