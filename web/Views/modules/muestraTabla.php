<div class="row">
<div class="col-md-12 col-lg-12">
    
            <!-- Tabla con el listado principal de los registros -->
        <table class="responsive">
            <table class="table table-striped table-bordered table-hover table-condensed">
                <br><br>
            <tr class="info">
                <th>KILOGRAMOS</th>
                <th>CLIENTE</th>
                <th>FECHA</th>
                <th>ESCANDALLO</th>
                <TH colspan="3">OPERACIONES</TH>
            </tr>
             </TR>
            <?php
            //recorremos los registros
            foreach ($entradas as $p) {
                //Formateamos la fecha
                $date = date_create($p->getFecha());
                //Formateamos la salida de los kilogramos
                $number = $p->getKilogramos();       
                ?>    
            
            <!-- Formulario con los botones para las distintas acciones sobre cada registro-->   
                <TR>               
                <FORM name='operaciones' id='<?php echo $p->getIdEntrada(); ?>' action='index.php' method='post'>
                    <input type='hidden'  name='idEntrada' value=<?php echo $p->getIdEntrada(); ?> >
                    <input type="hidden" name="borrar">
                    <TD align="center"><?= number_format($number, 2, ',', '.') ?></TD>
                    <TD><?= $p->getCliente() ?></TD>
                    <TD align="center"><?= date_format($date, 'd-m-Y') ?></TD>
                    <TD><?= $p->getEscandallo() ?></TD>
                    <TD><input type='submit' name='comentar' value='Tratar' /></td>
                    <TD><input type='submit' name='editar' value='Editar' /></TD>
                    <TD><button type='button' data-toggle="modal" data-target="#miModal" style="width: 100%;"/>Borrar</button></TD>
                   
                   <!--  <button type="button" class="btn btn-success" NAME='borrar' data-toggle="modal" data-target="#miModal">Borrar</button> -->


                           <!-- VENTANA MODAL -->

                       <div class="modal fade" id="miModal">
                           <div class="modal-dialog">
                             <div class="modal-content">
                               <div class="modal-header">
                                 <button class="close" area-hidden="true" data-dismiss="modal">&times;</button>
                                 <h4 class="modal-title">ATENCIÓN !!</h4>
                               </div> 
                               <div class="modal-body">¿Esta seguro de eliminar el Registro?</div>
                               <div class="modal-footer">
                                 <button class="btn btn-primary">Aceptar</button>
                                 <button class="btn btn-default" data-dismiss="modal">Cancelar</button>
                               </div>
                             </div>
                           </div>
                         </div>


                </TR>
            </FORM> 
                   <?php
                  }// end bucle
                ?>
        </TABLE>
</div>

</div>