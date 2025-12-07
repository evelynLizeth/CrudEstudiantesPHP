<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Registrar estudiante</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-4">
    <h2>Registrar estudiante</h2>
    <form action="../Controlador/EstudianteController.php" method="POST">
      <div class="row mb-3">
        <div class="col">
          <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
        </div>
        <div class="col">
          <input type="text" name="apellido" class="form-control" placeholder="Apellido" required>
        </div>
      </div>
      <input type="text" name="usuario" class="form-control mb-3" placeholder="Usuario" required>
      <input type="password" name="password" class="form-control mb-3" placeholder="Contraseña" required>
      <input type="text" name="ciudad" class="form-control mb-3" placeholder="Ciudad" required>
      <input type="text" name="estado" class="form-control mb-3" placeholder="Estado" required>
      <input type="text" name="zip" class="form-control mb-3" placeholder="Código postal" required>
      <button type="submit" name="guardar" class="btn btn-primary">Guardar</button>
      <a href="lista.php" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</body>
</html>