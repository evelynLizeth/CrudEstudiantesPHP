<?php
require_once '../Modelo/Conf.php';
require_once '../Modelo/Estudiante.php';
require_once '../Modelo/EstudianteDAO.php';

use Modelo\Estudiante;
use Modelo\EstudianteDAO;

if (isset($_POST['guardar'])) {
    $estudiante = new Estudiante(
        $_POST['nombre'],
        $_POST['apellido'],
        $_POST['usuario'],
        $_POST['password'],
        $_POST['ciudad'],
        $_POST['estado'],
        $_POST['zip']
    );

    // Luego se pasa al DAO para guardarlo
    $dao = new EstudianteDAO();
    $dao->crear($estudiante);

    header("Location:../Vista/lista.php");
    exit;
}
// Actualizar
if (isset($_POST['actualizar'])) {
    $id = $_POST['id'];
    $estudiante = new Estudiante(
        $_POST['nombre'],
        $_POST['apellido'],
        $_POST['usuario'],
        $_POST['password'],
        $_POST['ciudad'],
        $_POST['estado'],
        $_POST['zip']
    );
    $dao = new EstudianteDAO();
    $dao->actualizar($id, $estudiante);
    header("Location:../Vista/lista.php");
    exit;
}

// Eliminar
if (isset($_POST['eliminar'])) {
    $id = $_POST['id'];
    $dao = new EstudianteDAO();
    $dao->eliminar($id);
    header("Location:../Vista/lista.php");
    exit;
}