<?php
namespace Modelo;

use PDO;
use PDOException;

class Conf
{
    private static string $host = "localhost";
    private static string $db   = "actualizacion"; // nombre de base de datos
    private static string $user = "root";          // usuario de MySQL
    private static string $pass = "";              // contraseña de MySQL (vacía en Laragon)

    /**
     * Retorna una conexión PDO
     */
    public static function conectar(): PDO
    {
        try {
            $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$db . ";charset=utf8";
            $pdo = new PDO($dsn, self::$user, self::$pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}