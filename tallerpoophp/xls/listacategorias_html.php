<?php

include '../class/class.categorias.php';
$categoria = new Categoria();
$resultado = $categoria->getCategorias();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Categoria a Excel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
</head>
<body>
    <div class="container">
        <br />
        <h3 align="center">Listado de Categorías</h3>
        <br />
        <div class="table-responsive">
            <form method="POST" id="convert_form" action="listacategorias_xlsx.php">
                <table class="table table-striped table-bordered" id="table_content">
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                    </tr>
                    <?php
                    foreach ($resultado as $fila) {
                        echo '
                        <tr>
                            <td>'.$fila["id_Categoria"].'</td>
                            <td>'.$fila["nombre"].'</td>
                        </tr>
                        ';
                    }
                    ?>
                </table>
                <input type="hidden" name="file_content" id="file_content" />
                <button type="button" name="convert" id="convert" class="btn btn-success">Descargar</button>
            </form>
        </div>
    </div>

    <script src="../js/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#convert').click(function(){
                var table_content = '<table>';
                table_content += $('#table_content').html();
                table_content += '</table>';
                $('#file_content').val(table_content);
                $('#convert_form').submit();
            });
        });
    </script>
</body>
</html>