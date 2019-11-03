<!-- Index -->
<div id="inventario">
    <div class="float-right">
        <button class="btn btn-primary btn-sm" id="nuevo" title="Nueva registro"><i class="fa fa-plus" aria-hidden="true"></i></button> 
        <button class="btn btn-danger btn-sm btncerrar" data-toggle="tooltip" title="Ocultar"><i class="fa fa-times"></i></button>
    </div>
    <div class="card-body">
        <table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pelicula</th>
                    <th>Tienda</th>
                    <th>Ultima modificación</th>
                    <!-- <th>Estado</th> -->
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>	
            </tbody>
        </table>
    </div><!-- /.box-body -->  
    <script src="Funciones/funcionesInventario.js"></script>
    </div><!-- /.tiendas -->

<!-- Modal Nuevo -->
<div class="modal fade" id="modalnuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Agregar registro</h4>
      </div>
      <div class="modal-body">
        <form id="nuevoinventario">
        <fieldset>
        <input type="hidden" class="inventory_id" id="inventory_id" value="" name="inventory_id"/>
        </fieldset>
        <div class="form-group">
          <label for="film_id">Pelicula</label>
            <select class="form-control film_id" id="film_id" name="film_id">
              
            </select>	
        </div>
        <div class="form-group">
          <label for="store_id">Tienda</label>
            <select class="form-control store_id" id="store_id" name="store_id">
              
            </select>	
        </div>
        <fieldset>
            <input type="hidden" id="nuevo" value="nuevo" name="accion"/>
        </fieldset>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" id="btnnuevo" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Editar -->
<div class="modal fade" id="modaleditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Editar</h4>
        </div>
        <div class="modal-body">
          <form id="editarinventario">
          <div class="form-group">  
          <label for="inventory_id">Codigo</label>
              <input type="text" class="form-control inventory_id" id="inventory_id" name="inventory_id" readonly="true">
          </div>
          <div class="form-group">
          <label for="film_id">Pelicula</label>
            <select class="form-control film_id" id="film_id" name="film_id">
              
            </select>	
        </div>
        <div class="form-group">
          <label for="store_id">Tienda</label>
            <select class="form-control store_id" id="store_id" name="store_id">
              
            </select>	
        </div>
        <fieldset>
          <input type="hidden" id="editar" value="editar" name="accion"/>
        </fieldset>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-warning" id="btnactualizar" >Actualizar</button>
        </div>
      </div>
    </div>
</div>