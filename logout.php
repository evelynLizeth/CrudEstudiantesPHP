<?php
session_start();       // inicia la sesión para poder destruirla
session_destroy();     // elimina todas las variables de sesión
header("Location: index.php"); // redirige al login
exit;