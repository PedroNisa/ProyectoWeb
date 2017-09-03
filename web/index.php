<?php
require_once("Model/DB.php");
require_once("Model/Entrada.php");
require_once("Model/Comentarios.php");
require_once("Controller/funciones.php");
//require_once ('Controller/operaciones.php');


// Recuperamos la información de la sesión
session_start();
// guardamos en una variable el nombre del administrador
$permitido = "admin";

// Y comprobamos que el usuario se haya autentificado
if (!isset($_SESSION['usuario']))
    die("Error - debe <a href='Views/login.php'>identificarse</a>.<br />");
//guardamos en una variable la sesion del usuario activo
$usuario = $_SESSION['usuario'];
?>
<HTML>
    <!-- Pedro Miranda Nisa-->  
    <HEAD>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <TITLE>OlivesServices</TITLE>  
        <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
          <script src="http://code.jquery.com/jquery-latest.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <script type="text/javascript" src="Views/js/codigo.js"></script>      
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <link rel="stylesheet" type="text/css" href="Views/css/estilos.css" media="screen" />
    </HEAD>

    <BODY  onload="myFunction()">
      
  <DIV class="container">
    <header>
      <br>
         <section class="jumbotron" id="titulo"><h1 class="title-blog">OlivesServices</h1></section>
      <div class="container">
        <nav class="navbar navbar-nav container">
          <div class="row">
            <div class="col-xs-12 col-md-8">
                <form action="index.php" class="form-inline" method="post">
                      
                         <div class="form-group">
                              <SELECT NAME='select' class="form-control" >
                                 <OPTION  Value=""> Buscar por el campo... </OPTION>
                                 <OPTION  Value=cliente> Cliente </OPTION>
                                  <OPTION  Value=fecha> Fecha </OPTION>
                               </SELECT>
                         </div>
                       
                       
                       <div class="form-group">
                            <input type="text" class="form-control" id="buscar" NAME='buscar' placeholder="Introduzca el texto">
                            <button type="submit" class="btn btn-primary">
                            <span class="glyphicon glyphicon-search"></span>
                             <input type="hidden" NAME='boton_buscar'/>  
                            </button>     
                        </div>
                  </form>
              </div>
                <div class="col-xs-12 col-md-4">                                
                        <div class="col-xs-2 col-md-3">
                          <form action="index.php" method="post">
                                  <INPUT TYPE='image' src=Views/imagenes/listar.png title="listar registros" onsubmit='submit();'>   
                                  <input type="hidden" NAME='listado'/>  
                          </form>
                        </div>
                       
                      <div class="col-xs-2 col-md-3">
                         <form action="index.php" method="post">
                             <INPUT TYPE='image' src=Views/imagenes/atras.png title="atras" onsubmit='submit();'>
                             <input type="hidden" NAME='atras'>
                        </form>
                      </div>
                      <div class="col-xs-2 col-md-3">
                          <?php
                    //si el usuario es el administrador, habilitamos el botón para insertar nuevas entradas en la BBDD
                    //en caso contrario, deshabilitamos el botón.
                    if ($usuario == $permitido) {
                        ?>
                        <FORM name='form4' METHOD='POST' ACTION='index.php'> 
                            <INPUT TYPE='image' src=Views/imagenes/nuevo.png title="nueva entrada"  onsubmit='submit();' align=right>
                            <input type="hidden" NAME='alta'>
                        </FORM>
                        <?php
                    } else {
                        ?>
                        <FORM name='form4bis' METHOD='POST' ACTION='index.php'> 
                            <INPUT TYPE='image' src=Views/imagenes/nuevo.png title="nueva entrada" width=60 height=60 onclick='noAutorizada()' align=right >
                        </FORM>
                    <?php } ?>
                      </div>             
                </div>
              </div>
        
        
          </div>
          </div>
        </nav>
      </div>
    </header>
  </DIV>
                 <!-- Bloque donde pintaremos el CRUD  de la aplicación-->
        
          <DIV style="display:none;" id="myDiv">
              <?php
              include("Controller/operaciones.php");
           //   var_dump($_POST);
              ?>
             <div class="container pie col-md-12">
                <h6>El n&deg; total de registros es: <?= DB::numeEntradas() ?></H6>            
               <hr class='divisor'/>
               
               <!-- Botón para desconectar al usuario-->
                            
                   <form action='Views/logoff.php' method='post' id="pie">
                       <input type='submit' name='desconectar' value='Desconectar usuario'<?= $_SESSION['usuario'] ?>/>
                   </form>
             </div>
                                    
          </DIV>
        
        
        <!--Pinta un loader de carga-->
        <div class="loader" id="loader">Cargando...</div>
        

    </BODY><!-- Fin del cuerpo de la aplicación-->
</HTML>

