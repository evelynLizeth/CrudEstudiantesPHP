<?php

namespace Modelo;

class Estudiante
{
    public ?int $id;
    public string $nombre;
    public string $apellido;
    public string $usuario;
    public string $password;
    public string $ciudad;
    public string $estado;
    public string $zip;

    /**
     * Constructor de la clase Estudiante
     */
    public function __construct(
        string $nombre,
        string $apellido,
        string $usuario,
        string $password,
        string $ciudad,
        string $estado,
        string $zip,
        ?int $id = null
    ) {
        $this->id       = $id;
        $this->nombre   = $nombre;
        $this->apellido = $apellido;
        $this->usuario  = $usuario;
        // Se aplica hashing seguro a la contraseña
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->ciudad   = $ciudad;
        $this->estado   = $estado;
        $this->zip      = $zip;
    }
}