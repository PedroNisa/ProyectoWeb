<?php
require_once('Entrada.php');
require_once ('Comentarios.php');


class DB {  
    protected static function ejecutaConsulta($sql) {
         $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $dsn = "mysql:host=localhost;dbname=stockolives";
        $usuario = 'root';
        $contrasena = '';        
        $conexion = new PDO($dsn, $usuario, $contrasena, $opc);     
        $resultado = null;
        if (isset($conexion)) $resultado = $conexion->query($sql);
        return $resultado;
    }

    // obtiene los registros basados en la búsqueda 
    public static function obtieneDatos($select,$texto) {
        $sql = "SELECT idEntrada, kilogramos, cliente, fecha,"
                . "escandallo FROM entrada";
        $sql .= " WHERE ". $select . " like '%".$texto."%';";
        $resultado = self::ejecutaConsulta ($sql);
        $entrada = array();

	if($resultado) {
            // Añadimos un elemento por cada registro obtenido
            $row = $resultado->fetch();
            while ($row != null) {
                $entrada[] = new Entrada($row);
                $row = $resultado->fetch();
            }
	}
        
        return $entrada;
    }
    
    // obtiene los comentarios que coincida con el id pasado por parámetro
    public static function obtieneComentarios($id) {
        $comentarios = NULL;
        $sql = "SELECT id, id_cliente, fermentador, texto,"
                . "fecha FROM comentarios";
        $sql .= " WHERE id_cliente='" . $id . "'";
        $resultado = self::ejecutaConsulta ($sql);
        $entrada = array();

	if($resultado) {
            // Añadimos un elemento por cada elemento obtenido
            $row = $resultado->fetch();
            while ($row != null) {
                $comentarios[] = new Comentarios($row);
                $row = $resultado->fetch();
            }
	}        
        return $comentarios;
    }

     // obtiene la ruta que coincida con el id pasado por parámetro
    public static function obtieneEntrada($id) {
        $sql = "SELECT idEntrada, kilogramos, cliente, fecha,"
                . "escandallo FROM entrada";
        $sql .= " WHERE idEntrada='" . $id . "'";
        $resultado = self::ejecutaConsulta ($sql);
        $entrada = null;

	if(isset($resultado)) {
            $row = $resultado->fetch();
            $entrada = new Entrada($row);
	}        
        return $entrada;    
    }
    
    
    // Borrar la entrada que coincida con el id pasado por parámetro
    public static function borrarEntrada($idBorrar) {
		$sql = "DELETE FROM entrada where idEntrada='$idBorrar'";
		self::ejecutaConsulta($sql);
               
    }
    
     // inserta en la base de datos un nuevo registro    
     public static function insertarEntrada($kilogramos,$cliente,$fecha,$escandallo) {
         if($escandallo==""){
             $escandallo="PENDIENTE INSERTAR DATOS";
         }
		$sql = "insert into entrada (kilogramos,cliente,fecha,escandallo) values ('"
                        .$kilogramos."','".$cliente."','".$fecha."','".$escandallo."');";
		self::ejecutaConsulta($sql);
    }
    
     // inserta en al base de datos un nuevo comentario 
     public static function insertarComentario($id,$fermentador,$texto,$fecha) {
		$sql = "insert into comentarios (id_cliente,fermentador,texto,fecha)"
                        . " values ('".$id."','".$fermentador."','".$texto."','".$fecha."');";
		self::ejecutaConsulta($sql);
    }
    
    // actualiza el registro con la id pasada por parámtro
    public static function actualizarEntrada($id,$kilogramos,$cliente,$fecha,$escandallo) {
     
		$sql = "update entrada set kilogramos='".$kilogramos."', "
                        . "cliente='".$cliente."', "
                        . "fecha='".$fecha."', "
                        . "escandallo='".$escandallo."' "
                        . "where idEntrada='".$id."';";
                       
		self::ejecutaConsulta($sql);
            
     
    }
    
    public static function verificaCliente($nombre, $contrasena) {
        $sql = "SELECT usuario FROM usuarios ";
        $sql .= "WHERE usuario='$nombre' ";
        $sql .= "AND contrasena='".md5($contrasena)."';";
        $resultado = self::ejecutaConsulta ($sql);
        $verificado = false;

        if(isset($resultado)) {
            $fila = $resultado->fetch();
            if($fila !== false) $verificado=true;
        }
        return $verificado;
    }
    
    // Nº total de registros
    public static function numeEntradas () {
    		$sql = "SELECT * FROM entrada";
			$resultado=  self::ejecutaConsulta($sql);
			// Devolvemos el nº de filas que devuelve la consulta
    		return $resultado->rowCount();
    }
    
       
    
}

