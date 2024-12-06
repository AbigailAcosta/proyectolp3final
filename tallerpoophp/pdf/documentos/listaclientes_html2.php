<page backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm">
    <page_header><br><br>
        <table style="width: 100%; border: solid 1px black;">
            <tr>
                <td style="text-align: left; width: 33%">Listado de Clientes</td>
                <td style="text-align: center; width: 34%">CLIENTES</td>
                <td style="text-align: right; width: 33%"><?php echo date('d/m/Y'); ?></td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%; border: solid 1px black;">
            <tr>
                <td style="text-align: left; width: 50%">Leng. Prog. III</td>
                <td style="text-align: right; width: 50%">página [[page_cu]]/[[page_nb]]</td>
            </tr>
        </table>
    </page_footer>

    <br><br>
    <br>
    <table style="width: 80%; border: solid 1px #5544DD; border-collapse: collapse" align="center">
        <thead>
            <tr>
                <th style="width: 20%; text-align: left; border: solid 1px #900C3F; background: #900C3F; color: #FFFFFF;"><span style="color: #FFFFFF;">ID</span></th>
                <th style="width: 25%; text-align: left; border: solid 1px #900C3F; background: #900C3F; color: #FFFFFF;"><span style="color: #FFFFFF;">RAZÓN SOCIAL</span></th>
                <th style="width: 20%; text-align: left; border: solid 1px #900C3F; background: #900C3F; color: #FFFFFF;"><span style="color: #FFFFFF;">CI/RUC</span></th>
                <th style="width: 20%; text-align: left; border: solid 1px #900C3F; background: #900C3F; color: #FFFFFF;"><span style="color: #FFFFFF;">DOMICILIO</span></th>
                <th style="width: 15%; text-align: left; border: solid 1px #900C3F; background: #900C3F; color: #FFFFFF;"><span style="color: #FFFFFF;">TELÉFONO</span></th>
            </tr>
        </thead>
        <tbody>
            <?php
            include dirname(__DIR__).'../../class/class.clientes.php';
            $clientes = new Clientes();
            $resultado = $clientes->getClientes();

            foreach ($resultado as $fila) {
            ?>
            <tr>
                <td style="width: 20%; text-align: left; border: solid 1px #900C3F">
                    <?=$fila['idPersona'] ?>
                </td>
                <td style="width: 25%; text-align: left; border: solid 1px #900C3F">
                    <?=$fila['razonsocial'] ?>
                </td>
                <td style="width: 20%; text-align: left; border: solid 1px #900C3F">
                    <?=$fila['ciruc'] ?>
                </td>
                <td style="width: 20%; text-align: left; border: solid 1px #900C3F">
                    <?=$fila['domicilio'] ?>
                </td>
                <td style="width: 15%; text-align: left; border: solid 1px #900C3F">
                    <?=$fila['telefono'] ?>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</page>
