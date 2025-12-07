<?php
require_once '../Modelo/Conf.php';
require_once '../Modelo/EstudianteDAO.php';

use Modelo\EstudianteDAO;

$id = $_GET['id'] ?? null;
$dao = new EstudianteDAO();
$est = $dao->buscarPorId($id);

if (!$est) {
    echo "Estudiante no encontrado.";
    exit;
}
?>

<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Eliminar estudiante</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-4">
    <h2>¿Eliminar estudiante?</h2>
    <p>¿Estás seguro de que deseas eliminar a <strong><?= $est['nombre'] . ' ' . $est['apellido'] ?></strong>?</p>
    <form action="../Controlador/EstudianteController.php" method="POST">
      <input type="hidden" name="id" value="<?= $est['id'] ?>">
      <button type="submit" name="eliminar" class="btn btn-danger">Eliminar</button>
      <a href="lista.php" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</body>
</html>