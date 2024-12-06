<?php
session_start();
$usuario = $_SESSION["usuario"];

if ($usuario == null) {
    header('location: ./');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    include 'header.php';
    ?>
    <title>Ventas</title>
    <link rel="icon" href="favicon.ico" type="favicon.icon"/>

</head>

<body>
    <?php include 'menu.php'; ?>
    <br><br>

    <div class="container">
        <div class="card card-info">
            <div class="card-heading">
                <div class="btn-group float-right">
                    <a href="ventas/agregarfactura.php" class="btn btn-success">
                        <span class="fa fa-plus"></span> Agregar venta
                    </a>
                </div>
                <h3>Facturas de ventas</h3>
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
<script src="http://localhost/proyectolp3/tallerpoophp/js/fventas.js"></script>

</html>