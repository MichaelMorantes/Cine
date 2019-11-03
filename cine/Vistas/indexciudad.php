<!-- Index -->
<div id="ciudades">
    <div class="float-right">
        <button class="btn btn-primary btn-sm" id="nuevo" title="Nueva ciudad"><i class="fa fa-plus" aria-hidden="true"></i></button> 
        <button class="btn btn-danger btn-sm btncerrar" data-toggle="tooltip" title="Ocultar"><i class="fa fa-times"></i></button>
    </div>
    <div class="card-body">
        <table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ciudad</th>
                    <th>Pais</th>
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
    <script src="Funciones/funcionesCiudad.js"></script>
    </div><!-- /.ciudad -->

<!-- Modal Nuevo -->
<div class="modal fade" id="modalnuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Agregar nueva ciudad</h4>
      </div>
      <div class="modal-body">
        <form id="nuevaciudad">
        <fieldset>
        <input type="hidden" class="city_id" id="city_id" value="" name="city_id"/>
        </fieldset>
        <div class="form-group">
          <label for="country_id">Pais</label>
            <select class="form-control country_id" id="country_id" name="country_id">
              
            </select>	
        </div>
        <div class="form-group">
            <label for="city" class="col-form-label">Ciudad</label>
            <input type="text" class="form-control input city" name="city" id="city" placeholder="Ingrese ciudad">
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
          <h4 class="modal-title" id="exampleModalLabel">Editar ciudad</h4>
        </div>
        <div class="modal-body">
          <form id="editarciudad">
          <div class="form-group">  
          <label for="city_id">Codigo ciudad</label>
              <input type="text" class="form-control city_id" id="city_id" name="city_id" readonly="true">
          </div>
              <div class="form-group">
            <label for="city" class="col-form-label">Ciudad</label>
            <input type="text" class="form-control input city" name="city" id="city" placeholder="Ingrese ciudad">
        </div>
        <div class="form-group">
          <label for="country_id">Pais</label>
            <select class="form-control country_id" id="country_id" name="country_id">
              
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