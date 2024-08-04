<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Bootbox.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootbox@5.5.2/dist/bootbox.min.js"></script>
    <!-- SweetAlert2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <h1>Formulario para ingreso de inventario</h1>
    <form id="myForm" action="<?php echo base_url(); ?>crear1" method="post">
        <div class="mb-3">
            <label for="Inp_Titulo" class="form-label">Titulo</label>
            <input name="Inp_Titulo" id="Inp_Titulo" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="Inp_Descripcion" class="form-label">Descripcion</label>
            <input name="Inp_Descripcion" id="Inp_Descripcion" type="text" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Guardar Datos</button>
    </form>
    <h1>Resultado del Select de inventario</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>TITULO</th>
                <th>DESCRIPCION</th>
                <th>ACCIONES</th> <!-- Columna adicional para botones de editar y eliminar -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($keyselectbdd as $key): ?>
                <tr>
                    <td><?php echo $key->inv_id ?></td>
                    <td><?php echo $key->inv_titulo ?></td>
                    <td><?php echo $key->inv_descripcion ?></td>
                    <td>
                        <!-- Botón de Editar -->
                        <a href="<?php echo base_url('editarinv/' . $key->inv_id); ?>" class="btn btn-warning">Editar</a>
                        <!-- Botón de Eliminar -->
                        <a href="<?php echo base_url('eliminarinv/' . $key->inv_id); ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este ítem?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script>
        document.getElementById('myForm').addEventListener('submit', function(event) {
            let titulo = document.getElementById('Inp_Titulo').value.trim();
            let descripcion = document.getElementById('Inp_Descripcion').value.trim();

            if (titulo === '' || descripcion === '') {
                event.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Campos Vacíos',
                    text: 'Por favor, rellene todos los campos antes de enviar el formulario.',
                    confirmButtonText: 'Aceptar'
                });
            } else {
                // Confirmación adicional con Bootbox
                bootbox.confirm({
                    title: 'Confirmación',
                    message: '¿Está seguro de que desea enviar el formulario?',
                    buttons: {
                        confirm: {
                            label: 'Sí',
                            className: 'btn-success'
                        },
                        cancel: {
                            label: 'No',
                            className: 'btn-danger'
                        }
                    },
                    callback: function(result) {
                        if (!result) {
                            event.preventDefault();
                        }
                    }
                });
            }
        });
    </script>
</body>

</html>
