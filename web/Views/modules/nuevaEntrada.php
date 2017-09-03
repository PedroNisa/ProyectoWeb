
<!-- Formulario para la entrada de registros en la BBDD -->

<div id="alta" class="container">
    <FORM class="form-horizontal" name='form9' method='post' action='index.php'>
      
           <legend><h2>ALTA DE NUEVA ENTRADA</h2></legend>
           <div class="form-group bg-info">
                    <label for="kilogramos" class="control-label col-md-3">KILOGRAMOS </label>
                    <div class="col-md-9">
                            <input type='text' name='kilogramos' size='35'
                    value = '' maxlength='5' placeholder='Inserte el peso de la mercancia' 
                    required autofocus>
                    </div>          
                </div>

                 <div class="form-group bg-info">
                    <label for="cliente" class="control-label col-md-3">CLIENTE </label>
                    <div class="col-md-9">
                          <input type='text' list="cliente" name='cliente' size='35' placeholder='Inserte el nombre del cliente' required>
                    <datalist id="cliente">
                <option value="Aceitunas Cazorla">
                <option value="Aceitunas San-Mer">
                <option value="Cooperativa San Marcos">  
                <option value="Sovena España">
                <option value="Pickles Olives">       
                     </datalist>
                    </div>                   
                </div>

                <div class="div">
                    <div class="form-group bg-info">
                        <label for="fecha" class="control-label col-md-3">FECHA </label>
                        <div class="col-md-9">
                             <input type='date' name='fecha' size='10'
                    value =<?= date("d-m-Y") ?>  maxlength='10'required>
                        </div>                   
                    </div>
                </div>

                <div class="form-group bg-info">
                        <label for="escandallo" class="control-label col-md-3">ESCANDALLO </label>                      
                      <div class="col-md-9">
                       <textarea  rows=5 cols=20 id="escandallo" class="form-control" maxlength='30'  name='descripcion'
                           name='escandallo'></textarea>
                       </div>
                 </div>


               <div class="form-group">
                    <INPUT type='hidden' NAME='id' value = 'id'>
                        <div class="col-md-7 col-lg-9 col-md-offset-2 col-lg-offset-3">
                             <button TYPE="submit" class="btn btn-success" NAME='pulsa' onClick="submit">Alta Entrada</button>
                             <button TYPE="submit" class="btn btn-success" NAME='cancelar' formnovalidate onClick='index.php'>Cancelar</button>
                                     </div>
                    </div>
    </FORM>
</div>
