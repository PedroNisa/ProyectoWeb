<?php
require_once 'funciones.php';
// si pulsamos el botón listado completo
//nos muestra el inicio de la aplicación
if (isset($_POST['listado'])) {
    header('Location: index.php');
} else if (isset($_POST['atras'])) {
    header('Location: index.php');
    // si pulsamos en comentar llamamos a la función que muestra los 
    //datos del registro pasado por parámetro
} else if (isset($_POST['comentar'])) {
    muestraEntrada($_POST['idEntrada']);
} else if (isset($_POST['insertaComentario'])) {
    //si pulsamos sobre añadir un comentario
    // y dejamos el campo nombre vacio, creamos un aviso
    if ($_POST['nombre'] == "") {
        echo '<H3>No se puede realizar la operación,'
        . ' es obligatorio indicar el número de Fermentador.</H3>';
        // avisamos que el campo texto está vacio
    } else if ($_POST['texto'] == "") {
        echo '<H3>No se puede realizar la operación,'
        . ' el texto del Tratamiento es obligatorio.</H3>';
    } else {
        // si hemos completado los campos, llamamos a la función que inserta 
        //el comentario en la BD
        $fecha = date("Y/m/d");        
        DB::insertarComentario($_POST['id'], $_POST['nombre'], $_POST['texto'], $fecha);       
        echo"<H3>Se ha dado de alta correctamente al tratamiento.</H3>";        
    }

    // si pulsamos el botón editar, mostramos el formulario para 
    //editar el registro pasado por parámetro
} else if (isset($_POST['editar'])) {
    creaFormularioModificarEntrada($_POST['idEntrada']);

    // si pulsamos el botón borrar, llamamos a la función que 
    //borra el registro pasado por parámetro
} else if (isset($_POST['borrar'])) {   
    $idBorrar=$_POST['idEntrada'];  
    DB::borrarEntrada($_POST['idEntrada']);
    echo"<H3>Registro eliminado con éxito.</H3> ";
    //header('Location: index.php');

    // si pulsamos el botón buscar y no dejamos vacio el campo
    //llamamos a la funcion que pinta la tabla con los registros que 
    //coincidan con la búsqueda
} else if (isset($_POST['boton_buscar'])) {
    //si recibimos datos 
    if ($_POST['buscar'] == "")
        header('Location: index.php');

    if ($_POST['buscar'] != "")
    //si hemos seleccionados busqueda por fecha, formateamos la fecha para adaptarnos
    //al formato de mysql
        if ($_POST['select'] == 'fecha') {
            $formatearFecha = date_create($_POST['buscar']);
            creaTabla($_POST['select'], date_format($formatearFecha, 'Y-m-d'));
            //si seleccionamos busqueda por cliente
        } else
            creaTabla($_POST['select'], $_POST['buscar']);
}

// si pulsamos el botón nuevo registro, llamamos a la funcion que pinta 
//el formulario para ingresar un nuevo registro en la base de datos
else if (isset($_POST['alta'])) {
    creaFormularioNuevaEntrada();

    // si pulsamos el botón nueva entrada, llamamos a la función que 
    // insrta los datos de los nuevos registros en la bd
} else if (isset($_POST['pulsa'])) {
    $formatearFecha = date_create($_POST['fecha']);
    $fechaFormateada = date_format($formatearFecha, 'Y-m-d');
    DB::insertarEntrada($_POST['kilogramos'], $_POST['cliente'], $fechaFormateada
            , $_POST['descripcion']);
    echo "<H3>Entrada registrada con éxito para el cliente: " . $_POST['cliente'] . " </H3> ";
    // si pulsamos sobre el boton modificar entrada, actualizamos 
    // los datos del registro en la bd
} else if (isset($_POST['modifica'])) {
    
    DB::actualizarEntrada($_POST['idEditar'], $_POST['kilogramos'], $_POST['cliente'], $_POST['fecha']
            , $_POST['escandallo']);
    echo "<H3>Se ha modificado correctamente el cliente: " . $_POST['cliente'] . "</H3> ";   
} else {

    // si no hemos pulsado ningún botón, llamamos a la función que muestra
    // la tabla con todos los registros de la bd
    if (DB::numeEntradas() == 0) {
        echo"<H3>LA BASE DE DATOS NO CONTIENE REGISTRO QUE MOSTRAR</H3> ";
    } else
        creaTabla("kilogramos", "");
}