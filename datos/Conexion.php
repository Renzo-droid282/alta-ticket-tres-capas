<?php

class Conexion
{
    public static function obtenerConexion(): mysqli
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $conexion->set_charset('utf8mb4');

        return $conexion;
    }
}
