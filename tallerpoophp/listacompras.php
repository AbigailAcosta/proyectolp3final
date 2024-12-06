<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header('Location: ./');
    exit;
}
$usuario = $_SESSION["usuario"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'header.php'; ?>
    <title>Compras</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
</head>

<body>
    <?php include 'menu.php'; ?>
    <br><br>

    <div class="container">
        <div class="card card-info">
            <div class="card-header">
                <div class="btn-group float-right">
                    <a href="compras/agregarfactura.php" class="btn btn-success">
                        <span class="fa fa-plus"></span> Agregar Factura
                    </a>
                </div>
                <h3>Facturas de compras</h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" role="form" id="formFactura">
                    <div class="form-group row">
                    
                            <span id="loader"></span>
                        </div>
                    </div>
                </form>
                <div id="resultados"></div>
                <div id="salidas"></div>
            </div>
        </div>
    </div>
</body>

<?php include 'footer.php'; ?>
<script src="http://localhost/proyectolp3/tallerpoophp/js/fcompras.js"></script>

</html>
