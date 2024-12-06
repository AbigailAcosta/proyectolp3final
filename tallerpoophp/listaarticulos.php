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
    <?php include 'header.php'; ?>
    <title>Listado Artículos</title>
    <link rel="icon" href="favicon.ico" type="favicon.icon"/>
</head>

<body>
    <?php include 'menu.php'; ?>
    <main role="main">
        <div class="jumbotron">
            <div class="col-sm-12 mx-auto">
                <h2>Listado de Artículos</h2>
                <a class="btn btn-primary" href="articulo.php">Nuevo</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>DESCRIPCION</th>
                            <th>PRECIO VENTA</th>
                            <th colspan="2" class="text-center">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include 'class/class.articulos.php';
                        $articulos = new Articulo();
                        $resultado = $articulos->getArticulos(); // Llamada sin parámetros para obtener todos los artículos

                        if ($resultado) {
                            foreach ($resultado as $fila) { ?>
                                <tr>
                                    <td><?= $fila['id_Articulo'] ?></td>
                                    <td><?= $fila['descripcion'] ?></td>
                                    <td><?= $fila['precioventa'] ?></td>
                                    <td><a href="#" onclick="borrar(<?= $fila['id_Articulo'] ?>);">borrar</a></td>
                                </tr>
                        <?php }
                        } else {
                            echo "<tr><td colspan='6'>No hay artículos disponibles.</td></tr>";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>

<?php include 'footer.php'; ?>
<script src="js/articulos.js"></script>
</html>
