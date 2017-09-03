<?php

require_once("Model/DB.php");
require_once("Model/Entrada.php");
require_once("Model/Comentarios.php");



// función que muestra en una tabla todos los registros de la base de datos
function creaTabla($select, $buscar) {
    // guardamos el resultado de la búsqueda
    $entradas = DB::obtieneDatos($select, $buscar);
    // si no existen registros que mostrar
    if (empty($entradas)) {
        echo
        "<script type=''>sinRegistros();</script>";
    }// Si la BBDD contiene registros, los mostramos
    require_once  'Views/modules/muestraTabla.php';      
}

// funcion que muestra los datos del registro pasado por parámetro y un formulario
//para insertar comentarios de la misma
function muestraEntrada($id) {  
    
    $entrada = DB::obtieneEntrada($id);
    $comentarios = DB::obtieneComentarios($id);
    $date = date_create($entrada->getFecha());
    $number = $entrada->getKilogramos();
    require_once  'Views/modules/muestraComentarios.php';
    
}

// función que pinta un formulario para ingresar una nueva ENTRADA en la base de datos
function creaFormularioNuevaEntrada() {
    require_once  'Views/modules/nuevaEntrada.php';
}

// pinta un formulario para editar los datos del registro que coincida con el id pasado por parámetro
function creaFormularioModificarEntrada($id) {
    //guardamos y mostramos los datos del registro  
    $entrada = DB::obtieneEntrada($id);
    $date = date_create($entrada->getFecha());    
    require_once  'Views/modules/editarEntrada.php';
}

?>
