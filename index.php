<?php
require_once 'Modelo/Conf.php';
require_once 'Modelo/EstudianteDAO.php';

use Modelo\EstudianteDAO;

session_start();

$error = "";

if (isset($_POST['ingresar'])) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $dao = new EstudianteDAO();
    $user = $dao->login($usuario, $password);

    if ($user) {
        // Guardamos datos en sesión
        $_SESSION['usuario'] = $user['usuario'];
        $_SESSION['nombre']  = $user['nombre'];
        header("Location: Vista/lista.php"); // redirige a lista
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Login - CRUD Estudiantes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center mb-4">Iniciar sesión</h2>
    <?php if ($error): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form method="POST" class="mx-auto" style="max-width:400px;">
      <div class="mb-3">
        <label for="usuario" class="form-label">Usuario</label>
        <input type="text" name="usuario" id="usuario" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" name="password" id="password" class="form-control" required>
      </div>
      <button type="submit" name="ingresar" class="btn btn-primary w-100">Ingresar</button> 
    </form>
    <div class="text-center mt-3">
      <a href="Vista/crear.php">Crear usuario</a>
    </div>
  </div>
</body>
</html>