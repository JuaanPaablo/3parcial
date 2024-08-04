<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <h1>Formulario para editar usuarios</h1>
    <form id="myForm" action="<?php echo base_url('editarusu'); ?>" method="post">
        <input type="hidden" name="usu_id" value="<?php echo $usuario->usu_id; ?>">
        <div class="mb-3">
            <label for="Inp_Nombre" class="form-label">Nuevo nombre:</label>
            <input name="Inp_Nombre" id="Inp_Nombre" type="text" class="form-control" value="<?php echo $usuario->usu_nombre; ?>">
        </div>
        <div class="mb-3">
            <label for="Inp_Apellido" class="form-label">Nuevo apellido:</label>
            <input name="Inp_Apellido" id="Inp_Apellido" type="text" class="form-control" value="<?php echo $usuario->usu_apellido; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Guardar Datos</button>
    </form>
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
