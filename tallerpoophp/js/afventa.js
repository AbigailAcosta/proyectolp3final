$(document).ready(function() {
    load(1);

    // Validar cuando se cambia el valor del campo de fecha
    $('#fecha').on('change', function() {
        var fecha = $(this).val();

        // Verificar el formato de la fecha 'DD/MM/YYYY'
        var fechaConvertida = moment(fecha, 'DD/MM/YYYY', true);
        var fechavalida = moment().format('DD/MM/YYYY');

        if (!fechaConvertida.isValid()) {
            Swal.fire({
                icon: 'error',
                title: '¡Fecha no válida!',
                text: 'Por favor, selecciona una fecha válida en formato DD/MM/YYYY.',
                timer: 3000,
                timerProgressBar: true
            });
            $(this).focus();
            return false;
        }

        // Verifica si la fecha seleccionada no es posterior a la fecha actual
        if (fechaConvertida.isAfter(fechavalida)) {
            Swal.fire({
                title: '¡Seleccionar fecha válida!',
                text: 'La fecha seleccionada no puede ser posterior a la fecha actual.',
                icon: 'warning',
                confirmButtonText: 'Aceptar',
                timer: 3000,
                timerProgressBar: true
            });
            $(this).focus();
            return false;
        }
    });

    // Al enviar el formulario
    $('#afactura').submit(function() {
        var idpersona = $('#idpersona').val();
        var idusuario = $('#idusuario').val();
        var condicion = $('#condicion').val();
        var fecha = $('#fecha').val();

        // Verificar nuevamente la fecha al enviar el formulario
        var fechaConvertida = moment(fecha, 'DD/MM/YYYY', true);
        var fechavalida = moment().format('DD/MM/YYYY');

        if (!fechaConvertida.isValid()) {
            Swal.fire({
                icon: 'error',
                title: '¡Fecha no válida!',
                text: 'Por favor, selecciona una fecha válida en formato DD/MM/YYYY.',
                timer: 3000,
                timerProgressBar: true
            });
            $('#fecha').focus();
            return false;
        }

        // Verificar si la fecha es posterior a la fecha actual
        if (fechaConvertida.isAfter(fechavalida)) {
            Swal.fire({
                title: '¡Seleccionar fecha válida!',
                text: 'La fecha seleccionada no puede ser posterior a la fecha actual.',
                icon: 'warning',
                confirmButtonText: 'Aceptar',
                timer: 3000,
                timerProgressBar: true
            });
            $('#fecha').focus();
            return false;
        }

        // Si todo es válido, proceder con la generación del PDF
        WindowCenter('../pdf/venta_pdf.php?idcliente=' + idpersona + '&fecha=' + fechaConvertida.format('DD/MM/YYYY') + '&condicion=' + condicion + '&idusuario=' + idusuario, 'Factura de Venta', '', '1024', '768', 'true');
    });
});

function load(page) {
    var q = $('#q').val();
    $('#loader').fadeIn('slow');
    var parametros = {
        'action': 'ajax',
        'page': page,
        'q': q
    };
    $.ajax({
        url: 'buscaritem.php',
        data: parametros,
        beforeSend: function(objeto) {
            $('#loader').html('<img width="10%" heigth="10%" src="../images/loading.gif">Cargando...');
        },
        success: function(data) {
            $('#outer_div').html(data).fadeIn('slow');
            $('#loader').html('');
        }
    });
}

function agregar(id) {
    var precio = document.getElementById("precio_" + id).value;
    var cantidad = document.getElementById("cantidad_" + id).value;
    var concepto = document.getElementById("concepto_" + id).value;
    if (isNaN(precio)) {
        alert('Esto no es numero!');
        document.getElementById("precio_" + id).focus();
        return false;
    }
    if (isNaN(cantidad)) {
        alert('Esto no es numero!');
        document.getElementById("cantidad_" + id).focus();
        return false;
    }
    var parametros = {
        'idConcepto': id,
        'concepto': concepto,
        'unitario': precio,
        'cantidad': cantidad
    };

    $.ajax({
        type: 'POST',
        url: '../ventas/agregarfacturaitem.php',
        data: parametros,
        beforeSend: function(objeto) {
            $('#resultados').html("Cargando...");
        },
        success: function(data) {
            $('#resultados').empty();
            $('#resultados').html(data);
        }
    });
}

function eliminar(id) {
    Swal.fire({
        title: 'Eliminar este detalle?',
        text: "¡No podrás revertir esto!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#27BDBB',
        cancelButtonColor: '#E86F54',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'GET',
                url: '../ventas/agregarfacturaitem.php',
                data: 'id=' + id,
                beforeSend: function(objeto) {
                    $('#resultados').html("Cargando...");
                },
                success: function(data) {
                    $('#resultados').html(data);
                }
            });
        }
    });
}

function imprimir(numero) {}

function number_format(number, decimals, dec_point, thousands_sep) {
    number = (number + '')
        .replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function(n, prec) {
            var k = Math.pow(10, prec);
            return '' + (Math.round(n * k) / k)
                .toFixed(prec);
        };
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n))
        .split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '')
        .length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1)
            .join('0');
    }
    return s.join(dec);
}
