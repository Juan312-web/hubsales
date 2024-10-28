<?php

namespace Model;

use PDO;

class ActiveRecord
{

    // Base DE DATOS
    protected static $db;
    protected static $tabla = '';
    protected static $columnasDB = [];

    // Alertas y Mensajes
    protected static $alertas = [];

    // Definir la conexión a la BD - includes/database.php
    public static function setDB($database)
    {
        self::$db = $database;
    }

    public static function setAlerta($tipo, $mensaje)
    {
        static::$alertas[$tipo][] = $mensaje;
    }
    // Validación
    public static function getAlertas()
    {
        return static::$alertas;
    }

    public function validar()
    {
        static::$alertas = [];
        return static::$alertas;
    }

    // Registros - CRUD
    public function guardar($pre)
    {
        $resultado = '';
        if (!is_null($this->$pre)) {
            // actualizar
            $resultado = $this->actualizar($pre);
        } else {
            // Creando un nuevo registro
            $resultado = $this->crear($pre);
        }
        return $resultado;
    }

    public static function all($pre = '')
    {
        $query = "SELECT * FROM " . static::$tabla;
        if ($pre) {
            $query .= " ORDER BY {$pre} ASC";
        }
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    // Busca un registro por su id
    public static function find($pre, $id)
    {
        $query = "SELECT * FROM " . static::$tabla  . " WHERE {$pre} = {$id}";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    // Obtener Registro
    public static function get($limite)
    {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT {$limite}";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    // Busqueda Where con Columna 
    public static function where($columna, $valor)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE {$columna} = '{$valor}'";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    // Busqueda Where con Columna 
    public static function whereContains($columna, $valor)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE {$columna} LIKE '{$valor}%'";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    // SQL para Consultas Avanzadas.
    public static function SQL($consulta)
    {
        $query = $consulta;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    // crea un nuevo registro
    public function crear($pre)
    {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos($pre);

        $query = "INSERT INTO " . static::$tabla . " (";
        $query .= join(", ", array_keys($atributos));
        $query .= ") VALUES (";

        $query .= join(', ', array_fill(0, count($atributos), '?'));
        $query .= ")";

        $resultado = self::$db->prepare($query);
        $valores = array_values($atributos);
        $resultado->execute($valores);
        $id = self::$db->lastInsertId();
        return [
            'resultado' =>  $resultado,
            'id' => $id
        ];
    }

    public function actualizar($pre)
    {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos($pre);
        // Iterar para ir agregando cada campo de la BD
        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query = "UPDATE " . static::$tabla . " SET ";
        $query .=  join(', ', $valores);
        $query .= " WHERE {$pre} = '" . intval($this->$pre) . "'";
        $resultado = self::$db->prepare($query);
        $resultado->execute();

        return $resultado;
    }

    // Eliminar un registro - Toma el ID de Active Record
    public function eliminar($pre = '')
    {
        $query = "DELETE FROM "  . static::$tabla . " WHERE {$pre} = " . $this->$pre;
        $resultado = self::$db->prepare($query);
        $resultado->execute();

        return $resultado;
    }

    public static function consultarSQL($query)
    {
        // Consultar la base de datos
        $resultado = self::$db->prepare($query);
        $resultado->execute();

        // Iterar los resultados
        $array = [];
        while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $array[] = static::crearObjeto($registro);
        }

        // retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro)
    {
        $objeto = new static;

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }



    // Identificar y unir los atributos de la BD
    public function atributos($pre)
    {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === $pre) continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos($pre)
    {
        if ($pre) {
            $atributos = $this->atributos($pre);
        }

        $sanitizado = [];
        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = $value;
        }
        return $atributos;
    }

    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}
