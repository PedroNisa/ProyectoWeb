<!-- Formulario para editar un registro -->


<div class="container" id="editar">
    <form action="index.php" class="form-horizontal" method="post">
        <br>
        <legend><h2>MODIFICAR ENTRADA</h2></legend>
                <div class="form-group bg-info">
                    <label for="kilogramos" class="control-label col-md-3">KILOGRAMOS </label>
                    <div class="col-md-9">
                            <input type="text" class="form-control" id="kilogramos" name="kilogramos"
                            value = <?= $entrada->getKilogramos() ?> maxlength='5'>
                    </div>          
                </div>
    
                <div class="form-group bg-info">
                    <label for="cliente" class="control-label col-md-3">CLIENTE </label>
                    <div class="col-md-9">
                            <input type='text' id='cliente' class="form-control" name="cliente"
                           value = "<?= $entrada->getCliente() ?>" readonly='readonly'>    
                    </div>                   
                </div>
    
                <div class="div">
                    <div class="form-group bg-info">
                        <label for="fecha" class="control-label col-md-3">FECHA </label>
                        <div class="col-md-9">
                             <input type='date' id='fecha' class="form-control" name="fecha"
                              value = <?= $entrada->getFecha()?> maxlength='8'>
                        </div>                   
                    </div>
                </div>
                
                <div class="form-group bg-info">
                        <label for="escandallo" class="control-label col-md-3">ESCANDALLO </label>                      
                      <div class="col-md-9">
                       <textarea  rows=5 cols=20 id="escandallo" class="form-control"
                           name='escandallo'><?= $entrada->getEscandallo() ?></textarea>
                       </div>
                 </div>

                    <div class="form-group">
                       <INPUT type='hidden' NAME='idEditar' value =<?= $entrada->getIdEntrada() ?> >
                         <INPUT type='hidden' NAME='modifica' >
                          <div class="col-md-7 col-lg-9 col-md-offset-2 col-lg-offset-3">
                              <button type="button" class="btn btn-success" NAME='modifica' data-toggle="modal" data-target="#miModal">Modificar</button>

                              <!-- VENTANA MODAL-->
                           <div class="modal fade" id="miModal">
                           <div class="modal-dialog">
                             <div class="modal-content">
                               <div class="modal-header">
                                 <button class="close" area-hidden="true" data-dismiss="modal">&times;</button>
                                 <h4 class="modal-title">ATENCIÓN !!</h4>
                               </div>
                               <div class="modal-body">¿Esta seguro de modificar el registro?</div>
                               <div class="modal-footer">
                                 <button class="btn btn-primary">Aceptar</button>
                                 <button class="btn btn-default" data-dismiss="modal">Cancelar</button>
                               </div>
                             </div>
                           </div>
                         </div>
                              <button class="btn btn-success" NAME='cancelar'>Cancelar</button>
                          
                        </div>
                    </div>
                  </form>
                </div>
    