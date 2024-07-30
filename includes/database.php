<?php

include('config.php');


class Conexion
{
    public static function conectar()
    {

        $dbHost = $_ENV['DB_HOST'];
        $dbUser = $_ENV['DB_USER'];
        $dbPass = $_ENV['DB_PASS'];
        $dbName = $_ENV['DB_NAME'];

        try {
            $dsn = "pgsql:host=" . $dbHost . "; port=5432; dbname=" . $dbName . ";options='--client_encoding=UTF8'";
            $conexion = new PDO($dsn,  $dbUser, $dbPass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            return $conexion;
        } catch (Exception $error) {
            die("El error de conexion es: " . $error->getMessage());
        }
    }
}
