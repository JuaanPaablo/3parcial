<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <h1>Es el formulario para ingreso</h1>
    <form id="myForm" action="<?php echo base_url(); ?>crear2" method="post">
        <div class="mb-3">
            <label for="Inp_Nombre" class="form-label">Nombre</label>
            <input name="Inp_Nombre" id="Inp_Nombre" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="Inp_Apellido" class="form-label">Apellido</label>
            <input name="Inp_Apellido" id="Inp_Apellido" type="text" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Guardar Datos</button>
    </form>
    <h1>Este es el resultado del Select de usuario</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>ACCIONES</th> <!-- Columna adicional para el botón de editar y eliminar -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($keyselectbdd as $key) : ?>
                <tr>
                    <td><?php echo $key->usu_id ?></td>
                    <td><?php echo $key->usu_nombre ?></td>
                    <td><?php echo $key->usu_apellido ?></td>
                    <td>
                        <!-- Botón de Editar que redirige a la página de edición del usuario -->
                        <a href="<?php echo base_url('editarusu/' . $key->usu_id); ?>" class="btn btn-warning">Editar</a>
                        <!-- Botón de Eliminar que redirige a la acción de eliminación -->
                        <a href="<?php echo base_url('eliminarusu/' . $key->usu_id); ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script>
        document.getElementById('myForm').addEventListener('submit', function(event) {
            let nombre = document.getElementById('Inp_Nombre').value.trim();
            let apellido = document.getElementById('Inp_Apellido').value.trim();

            if (nombre === '' || apellido === '') {
                event.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Campos Vacíos',
                    text: 'Por favor, rellene todos los campos antes de enviar el formulario.',
                    confirmButtonText: 'Aceptar'
                });
            }
        });
    </script>
</body>

</html>
