<?php

namespace Modelo;

use PDO;

class EstudianteDAO
{
    private PDO $con;

    public function __construct()
    {
        $this->con = Conf::conectar(); // Usa la clase Conf para obtener la conexión PDO
    }

    /**
     * Crear un nuevo estudiante
     */
    public function crear(Estudiante $est): bool
    {
        $sql = "INSERT INTO estudiantes 
                (nombre, apellido, usuario, password, ciudad, estado, zip, est) 
                VALUES (:nombre, :apellido, :usuario, :password, :ciudad, :estado, :zip, 'A')";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':nombre', $est->nombre);
        $stmt->bindValue(':apellido', $est->apellido);
        $stmt->bindValue(':usuario', $est->usuario);
        $stmt->bindValue(':password', $est->password); // ya viene con password_hash
        $stmt->bindValue(':ciudad', $est->ciudad);
        $stmt->bindValue(':estado', $est->estado);
        $stmt->bindValue(':zip', $est->zip);

        return $stmt->execute();
    }

    /**
     * Listar estudiantes activos
     */
    public function listar(): array
    {
        $sql = "SELECT * FROM estudiantes WHERE est = 'A'";
        $stmt = $this->con->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Buscar estudiante por ID
     */
    public function buscarPorId(int $id): ?array
    {
        $sql = "SELECT * FROM estudiantes WHERE id = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);

        return $res ?: null;
    }

    /**
     * Actualizar estudiante
     */
    public function actualizar(int $id, Estudiante $est): bool
    {
        $sql = "UPDATE estudiantes 
                SET nombre = :nombre, apellido = :apellido, usuario = :usuario, 
                    password = :password, ciudad = :ciudad, estado = :estado, zip = :zip 
                WHERE id = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':nombre', $est->nombre);
        $stmt->bindValue(':apellido', $est->apellido);
        $stmt->bindValue(':usuario', $est->usuario);
        $stmt->bindValue(':password', $est->password);
        $stmt->bindValue(':ciudad', $est->ciudad);
        $stmt->bindValue(':estado', $est->estado);
        $stmt->bindValue(':zip', $est->zip);

        return $stmt->execute();
    }

    /**
     * Eliminar estudiante (marcar como inactivo)
     */
    public function eliminar(int $id): bool
    {
        $sql = "UPDATE estudiantes SET est = 'I' WHERE id = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    /**
     * Login seguro con verificación de contraseña
     */
   public function login(string $usuario, string $password): false|array
    {
        $sql = "SELECT * FROM estudiantes WHERE usuario = :usuario AND est = 'A'";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':usuario', $usuario);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica la contraseña ingresada contra el hash almacenado
        if ($user && password_verify($password, $user['password'])) {
            return $user; // Login correcto
        }

        return false; // Login incorrecto
    }
}