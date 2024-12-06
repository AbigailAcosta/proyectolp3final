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
    <title>Listado Categorias</title>
    <link rel="icon" href="favicon.ico" type="favicon.icon"/>


    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">

</head>

<body>
    <?php
    include 'menu.php';

    // Mostrar mensaje de éxito o error
    if (isset($_SESSION['mensaje'])) {
        echo '<div class="alert alert-info">' . $_SESSION['mensaje'] . '</div>';
        unset($_SESSION['mensaje']);
    }
    ?>
    <main role="main">
        <div class="jumbotron">
            <div class="col-sm-8 mx-auto">
                <h2>Listado de Categorías</h2>
                <link rel="icon" href="favicon.ico" type="favicon.icon"/>
                <a class="btn btn-primary" href="categoria.php">Nuevo</a>
                <a class="btn btn-warning" target="_blank" href="pdf/listacategorias.php">PDF Simple</a>
                <a class="btn btn-danger" target="_blank" href="pdf/listacategorias2.php">PDF Formateado</a>
                <a class="btn btn-info" target="_blank" href="xls/listacategorias_html.php">XLSX Simple</a>
                <a class="btn btn-success" href="xls/listacategorias2_xlsx.php">XLSX Formateado</a>

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th colspan="2" class="text-center">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'class/class.categorias.php';
                        $categoria = new Categoria();
                        $resultado = $categoria->getCategorias();

                        foreach ($resultado as $fila) { ?>
                            <tr>
                                <td><?=$fila['id_Categoria'] ?></td>
                                <td><?=$fila['nombre'] ?></td>
                                <td><a href="ecategoria.php?id=<?php echo $fila['id_Categoria'] ?>">editar</a></td>
                                <td><a href="#" onclick="borrar(<?=$fila['id_Categoria']?>);">borrar</a></td>
                            </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script>
        function borrar(id) {
            if (confirm('¿Seguro que deseas eliminar esta categoría?')) {
                window.location.href = 'php/borrar_categoria.php?id=' + id;
            }
        }
    </script>
</body>

<?php
    include 'footer.php';
?>

<script src="js/categorias.js"></script>
</html>
