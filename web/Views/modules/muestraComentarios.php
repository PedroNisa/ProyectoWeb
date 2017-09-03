
<!-- Formulario para insertar Comentarios en la BBDD -->


<div class="container col-md-12" role='form'>
    <FORM name='form9' method='post' action='index.php'>
    
    <!-- Tabla que nos lista los datos del registro que vamos a Comentar-->
       <table class="responsitive">
            <TABLE class="table table-hover table-condensed" id="listar">
                <br>
                
           <legend><h2>TRATAMIENTOS</h2></legend>
               <TR>
                   <TH>KILOGRAMOS</TH>
                   <TD><?= number_format($number, 2, ',', '.') ?></TD>
               </TR>
               <TR>
                   <TH>CLIENTE</TH>
                   <TD><?= $entrada->getCliente() ?></TD>
               </TR>
               <TR>
                   <TH>FECHA</TH>
                   <TD><?= date_format($date, 'd-m-Y') ?></TD>
               </TR>
               <TR>
                   <TH>ESCANDALLO</TH>
                   <TD><?= $entrada->getEscandallo() ?></TD>
               </TR>
           </TABLE>
       </table>
       <br>
    
        <!-- Tabla para insertar y listar los Comentarios-->
    
       <table class="responsitive">
            <TABLE class="table table-hover table-condensed" id="insertar">
               <TR class="info">
                   <TH>Fdor.</TH>
                   <TH>Fecha</TH>
                   <TH>Tratamiento</TH>                 
               </TR>
               <TR>
                   <TD><input type='number' min='1' max='300' name='nombre'></TD>
                   <TD><STRONG><?= date("d-m-Y") ?></STRONG></TD>
                   <TD><INPUT type='text' name='texto' maxlength='40' size="40">
                       <INPUT type='hidden' NAME='id' value="<?php echo $entrada->getIdEntrada(); ?>" >
                       <button class="btn btn-success" TYPE='submit' NAME='insertaComentario'>Añadir</button></TD> 
                   <?php
                 
                   // recorremos los comentarios para mostrarlos 
                   foreach ((array) $comentarios as $values) {
                       $date = date_create($values->getFecha());
                       ?>        
                   <TR>
                       <TD><?= $values->getFermentador() ?></TD>
                       <TD><?= date_format($date, 'd-m-Y') ?></TD>
                       <TD colspan='5'><?= $values->getTexto() ?></TD>                      
                   </TR>
               <?php }
             ?>
           </TABLE>
       </table>
    </FORM>
</div>
