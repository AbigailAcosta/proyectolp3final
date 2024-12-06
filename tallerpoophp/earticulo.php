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
    <title>Alta articulo</title>

    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">

</head>

<body>
<?php
include 'class/class.articulos.php';

$articulos = new Articulo();
$id = $_REQUEST['id']; // ID obtenido desde la solicitud
$resultado = $articulos->getArticulos($id); // Llamada con parámetro para obtener un solo artículo

if ($resultado) {
    ?>
    <main role="main">
        <div class="jumbotron">
            <div class="col-sm-8 mx-auto">
                <h1>Editar artículo</h1>
                <form action="php/editaarticulo.php" method="post">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <label class="label label-secondary" for="descripcion">Descripción:</label>
                    <input class="form-control" type="text" name="descripcion" id="descripcion" size="45" value="<?= $resultado['descripcion'] ?>" required><br>
                    <label class="label label-secondary" for="precioventa">Precio de venta:</label>
                    <input class="form-control" type="text" name="precioventa" id="precioventa" size="45" value="<?= $resultado['precioventa'] ?>" required><br>
                    <label class="label label-secondary" for="id_Categoria">Categoría:</label>
                    <select class="form-control" name="id_Categoria" id="id_Categoria">
                        <option value="0">SELECCIONE</option>
                        <?php
                        include 'class/class.categorias.php';
                        $categoria = new Categoria();
                        $resultador = $categoria->getCategorias();

                        foreach ($resultador as $filar) { ?>
                            <option value="<?= $filar['id_Categoria'] ?>" <?php if ($filar['id_Categoria'] == $resultado['id_Categoria']) echo 'selected'; ?>>
                                <?= $filar['nombre'] ?>
                            </option>
                        <?php } ?>
                    </select><br>
                    <input class="btn btn-lg btn-success" type="submit" value="Guardar">
                </form>
            </div>
        </div>
    </main>
<?php
} else {
    echo "Artículo no encontrado.";
}
?>

</body>

<?php include 'footer.php'; ?>

<script src="js/articulos.js"></script>
<script>
    document.getElementById("descripcion").addEventListener("keypress", forceKeyPressUppercase, false);
</script>
</html>
