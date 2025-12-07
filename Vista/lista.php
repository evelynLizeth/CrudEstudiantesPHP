<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit;
}

require_once '../Modelo/Conf.php';
require_once '../Modelo/EstudianteDAO.php';

use Modelo\EstudianteDAO;

$dao = new EstudianteDAO();
$estudiantes = $dao->listar();
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Lista de estudiantes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-4">

    <!-- Barra superior con bienvenida y logout -->
    <div class="d-flex justify-content-end mb-3">
      <span class="me-3">Bienvenido, <?= htmlspecialchars($_SESSION['nombre']) ?></span>
      <a href="../logout.php" class="btn btn-outline-danger">Cerrar sesión</a>
    </div>

    <h2 class="mb-4">Estudiantes registrados</h2>

    <!-- Botón para crear nuevo estudiante -->
    <a href="crear.php" class="btn btn-success mb-3">Nuevo estudiante</a>

    <!-- Tabla de estudiantes -->
    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Usuario</th>
          <th>Ciudad</th>
          <th>Estado</th>
          <th>Zip</th>
          <th>Est</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($estudiantes)): ?>
          <?php foreach ($estudiantes as $e): ?>
            <tr>
              <td><?= htmlspecialchars($e['id']) ?></td>
              <td><?= htmlspecialchars($e['nombre']) ?></td>
              <td><?= htmlspecialchars($e['apellido']) ?></td>
              <td><?= htmlspecialchars($e['usuario']) ?></td>
              <td><?= htmlspecialchars($e['ciudad']) ?></td>
              <td><?= htmlspecialchars($e['estado']) ?></td>
              <td><?= htmlspecialchars($e['zip']) ?></td>
              <td><?= htmlspecialchars($e['est']) ?></td>
              <td>
                <a href="editar.php?id=<?= $e['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                <a href="eliminar.php?id=<?= $e['id'] ?>" class="btn btn-sm btn-danger">Eliminar</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="9" class="text-center">No hay estudiantes registrados</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</body>
</html>