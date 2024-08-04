<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Inventario</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <h1>Formulario para editar inventario</h1>
    <form id="myForm" action="<?php echo base_url('editarinv'); ?>" method="post">
        <input type="hidden" name="inv_id" value="<?php echo $inventario->inv_id; ?>">
        <div class="mb-3">
            <label for="Inp_Titulo" class="form-label">Título</label>
            <input name="Inp_Titulo" id="Inp_Titulo" type="text" class="form-control" value="<?php echo $inventario->inv_titulo; ?>">
        </div>
        <div class="mb-3">
            <label for="Inp_Descripcion" class="form-label">Descripción</label>
            <input name="Inp_Descripcion" id="Inp_Descripcion" type="text" class="form-control" value="<?php echo $inventario->inv_descripcion; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Guardar Datos</button>
    </form>
</body>

</html>
