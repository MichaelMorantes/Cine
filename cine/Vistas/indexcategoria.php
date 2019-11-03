<!-- Index -->
<div id="categorias">
    <div class="float-right">
        <button class="btn btn-primary btn-sm" id="nuevo" title="Nueva categoría"><i class="fa fa-plus" aria-hidden="true"></i></button> 
        <button class="btn btn-danger btn-sm btncerrar" data-toggle="tooltip" title="Ocultar"><i class="fa fa-times"></i></button>
    </div>
    <div class="card-body">
        <table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Categoría</th>
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
    <script src="Funciones/funcionesCategoria.js"></script>
    </div><!-- /.categorias -->

<!-- Modal Nuevo -->
<div class="modal fade" id="modalnuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Agregar nueva categoría</h4>
      </div>
      <div class="modal-body">
        <form id="nuevacategoria">
        <fieldset>
        <input type="hidden" class="category_id" id="category_id" value="" name="category_id"/>
        </fieldset>
        <div class="form-group">
            <label for="name" class="col-form-label">Categoría</label>
            <input type="text" class="form-control input name" name="name" id="name" placeholder="Ingrese categoría">
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
          <h4 class="modal-title" id="exampleModalLabel">Editar categoría</h4>
        </div>
        <div class="modal-body">
          <form id="editarcategoria">
          <div class="form-group">  
          <label for="category_id">Codigo categoría</label>
              <input type="text" class="form-control category_id" id="category_id" name="category_id" readonly="true">
          </div>
              <div class="form-group">
            <label for="name" class="col-form-label">Categoría</label>
            <input type="text" class="form-control input name" name="name" id="name" placeholder="Ingrese categoría">
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