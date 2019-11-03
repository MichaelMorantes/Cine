<!-- Index -->
<div id="cliente">
    <div class="float-right">
        <button class="btn btn-primary btn-sm" id="nuevo" title="Nuevo cliente"><i class="fa fa-plus" aria-hidden="true"></i></button> 
        <button class="btn btn-danger btn-sm btncerrar" data-toggle="tooltip" title="Ocultar"><i class="fa fa-times"></i></button>
    </div>
    <div class="card-body">
        <table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Tienda</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Dirección</th>
                    <th>Fecha creación</th>
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
    <script src="Funciones/funcionesCliente.js"></script>
    </div><!-- /.cliente -->

<!-- Modal Nuevo -->
<div class="modal fade" id="modalnuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Agregar nuevo cliente</h4>	
      </div>
      <div class="modal-body">
        <form id="nuevoform">
            <fieldset>
                <input type="hidden" class="customer_id" id="customer_id" value="" name="customer_id"/>
            </fieldset>
            <div class="form-group">
                <label for="store_id">ID Tienda</label>
                <select class="form-control store_id" id="store_id" name="store_id">
                
                </select>	
            </div>
            <div class="form-group">
                <label for="first_name">Nombres</label>
                <input type="text" class="form-control first_name" id="first_name" name="first_name">
            </div>
            <div class="form-group">
                <label for="last_name">Apellidos</label>
                <input type="text" class="form-control last_name" id="last_name" name="last_name">	
            </div>
            <div class="form-group">  
                <label for="email">Email</label>
                <input type="text" class="form-control email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="address_id">Dirección</label>
                <select class="form-control address_id" id="address_id" name="address_id">
                
                </select>	
            </div>
            <div class="form-group">
                <label for="f_crea_nuevo">Fecha creación</label>
                <div class="input-group date f_crea_nuevo" id="f_crea_nuevo" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" name="create_date" data-target="#f_crea_nuevo"/>
                    <div class="input-group-append" data-target="#f_crea_nuevo" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
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
          <h4 class="modal-title" id="exampleModalLabel">Editar cliente</h4>
        </div>
        <div class="modal-body">
        <form id="editarform">
            <div class="form-group">  
                <label for="customer_id">Codigo cliente</label>
                <input type="text" class="form-control customer_id" id="customer_id" name="customer_id" readonly="true">
            </div>
            <div class="form-group">
                <label for="store_id">ID Tienda</label>
                <select class="form-control store_id" id="store_id" name="store_id">
                
                </select>	
            </div>
            <div class="form-group">
                <label for="first_name">Nombres</label>
                <input type="text" class="form-control first_name" id="first_name" name="first_name">
            </div>
            <div class="form-group">
                <label for="last_name">Apellidos</label>
                <input type="text" class="form-control last_name" id="last_name" name="last_name">	
            </div>
            <div class="form-group">  
                <label for="email">Email</label>
                <input type="text" class="form-control email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="address_id">Dirección</label>
                <select class="form-control address_id" id="address_id" name="address_id">
                
                </select>	
            </div>
            <div class="form-group">
                <label for="f_crea_editar">Fecha creación</label>
                <div class="input-group date f_crea_editar" id="f_crea_editar" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" name="create_date" data-target="#f_crea_editar"/>
                    <div class="input-group-append" data-target="#f_crea_editar" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
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