<?php
require_once '../Modelo/Conf.php';
require_once '../Modelo/EstudianteDAO.php';

use Modelo\EstudianteDAO;

$id = $_GET['id'] ?? null;
$dao = new EstudianteDAO();
$est = $dao->buscarPorId($id); // método que debes agregar en DAO

if (!$est) {
    echo "Estudiante no encontrado.";
    exit;
}
?>

<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Editar estudiante</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-4">
    <h2>Editar estudiante</h2>
    <form action="../Controlador/EstudianteController.php" method="POST">
      <input type="hidden" name="id" value="<?= $est['id'] ?>">
      <input type="text" name="nombre" class="form-control mb-2" value="<?= $est['nombre'] ?>" required>
      <input type="text" name="apellido" class="form-control mb-2" value="<?= $est['apellido'] ?>" required>
      <input type="text" name="usuario" class="form-control mb-2" value="<?= $est['usuario'] ?>" required>
      <input type="password" name="password" class="form-control mb-2" placeholder="Nueva contraseña">
      <input type="text" name="ciudad" class="form-control mb-2" value="<?= $est['ciudad'] ?>" required>
      <input type="text" name="estado" class="form-control mb-2" value="<?= $est['estado'] ?>" required>
      <input type="text" name="zip" class="form-control mb-2" value="<?= $est['zip'] ?>" required>
      <button type="submit" name="actualizar" class="btn btn-warning">Actualizar</button>
      <a href="lista.php" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</body>
</html>