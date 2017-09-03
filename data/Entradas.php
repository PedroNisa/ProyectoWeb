<?php

/**
 * Representa el data de las entradas
 * almacenados en la base de datos
 */
require 'DatabaseConnection.php';

class Entradas
{
    // Nombre de la tabla asociada a esta clase
    const TABLE_NAME = "entrada";

    const KILOGRAMOS = "kilogramos";

    const CLIENTE = "cliente";

    const FECHA = "fecha";

    const ESCANDALLO = "escandallo";

    function __construct()
    {
    }

    /**
     * Obtiene todos los gastos de la base de datos
     * @return array|bool Arreglo con todos los gastos o false en caso de error
     */
    public static function getAll()
    {
        $consulta = "SELECT * FROM " . self::TABLE_NAME;
        try {
            // Preparar sentencia
            $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    public static function insertRow($object)
    {
        try {

            $pdo = DatabaseConnection::getInstance()->getDb();

            // Sentencia INSERT
            $comando = "INSERT INTO " . self::TABLE_NAME . " ( " .
                self::KILOGRAMOS . "," .
                self::CLIENTE . "," .
                self::FECHA . "," .
                self::ESCANDALLO . ")" .
                " VALUES(?,?,?,?)";

            // Preparar la sentencia
            $sentencia = $pdo->prepare($comando);

            $sentencia->bindParam(1, $kilogramos);
            $sentencia->bindParam(2, $cliente);
            $sentencia->bindParam(3, $fecha);
            $sentencia->bindParam(4, $escandallo);

            $kilogramos = $object[self::KILOGRAMOS];
            $cliente = $object[self::CLIENTE];
            $fecha = $object[self::FECHA];
            $escandallo = $object[self::ESCANDALLO];

            $sentencia->execute();

            // Retornar en el último id insertado
            return $pdo->lastInsertId();
        } catch (PDOException $e) {
            return false;
        }

    }
}

?>
