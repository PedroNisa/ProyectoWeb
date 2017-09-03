<?php
/**
 * Obtiene todos las entradas de la base de datos
 */

/**
 * Constantes para construcción de respuesta
 */
const ESTADO = "estado";
const DATOS = "entradas";
const MENSAJE = "mensaje";

const CODIGO_EXITO = 1;
const CODIGO_FALLO = 2;
const CODIGO_bdVACIA = 3;

require 'Entradas.php';


if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Obtener entradas de la base de datos
    $entradas = Entradas::getAll();

    // Definir tipo de la respuesta
    header('Content-Type: application/json');

    if ($entradas) {
        $datos[ESTADO] = CODIGO_EXITO;
        $datos[DATOS] = $entradas;
        print json_encode($datos);
    }else if ($entradas==null) {
        $datos[ESTADO] = CODIGO_bdVACIA;
        $datos[DATOS] = $entradas;
        print json_encode(array(
            ESTADO => CODIGO_bdVACIA,
            MENSAJE => "LA BASE DE DATOS ESTÁ VACIA"
        ));
    }

else {
        print json_encode(array(
            ESTADO => CODIGO_FALLO,
            MENSAJE => "Ha ocurrido un error"
        ));
    }
}



