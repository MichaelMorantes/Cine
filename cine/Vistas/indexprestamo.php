<!-- Index -->
<div id="rental">
    <div class="float-right">
        <button class="btn btn-primary btn-sm" id="nuevo" title="Nuevo prestamo"><i class="fa fa-plus" aria-hidden="true"></i></button> 
        <button class="btn btn-danger btn-sm btncerrar" data-toggle="tooltip" title="Ocultar"><i class="fa fa-times"></i></button>
    </div>
    <div class="card-body">
        <table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha renta</th>
                    <th>Inventario</th>
                    <th>Cliente</th>
                    <th>Fecha retorno</th>
                    <th>Empleado</th>
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
    <script src="Funciones/funcionesPrestamo.js"></script>
    </div><!-- /.rental -->

<!-- Modal Nuevo -->
<div class="modal fade" id="modalnuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Agregar nuevo prestamo</h4>
      </div>
      <div class="modal-body">
        <form id="nuevoprestamo">
            <fieldset>
                <input type="hidden" class="rental_id" id="rental_id" value="" name="rental_id"/>
            </fieldset>
            <div class="form-group">
                <label for="f_rental_nuevo">Fecha prestamo</label>
                <div class="input-group date f_rental_nuevo" id="f_rental_nuevo" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" name="rental_date" data-target="#f_rental_nuevo"/>
                    <div class="input-group-append" data-target="#f_rental_nuevo" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="inventory_id">ID Inventario</label>
                <select class="form-control inventory_id" id="inventory_id" name="inventory_id">
                
                </select>	
            </div>
            <div class="form-group">
                <label for="customer_id">Cliente</label>
                <select class="form-control customer_id" id="customer_id" name="customer_id">
                
                </select>	
            </div>
            <div class="form-group">
                <label for="f_return_nuevo">Fecha retorno</label>
                <div class="input-group date f_return_nuevo" id="f_return_nuevo" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" name="return_date" data-target="#f_return_nuevo"/>
                    <div class="input-group-append" data-target="#f_return_nuevo" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="staff_id">Empleado</label>
                <select class="form-control staff_id" id="staff_id" name="staff_id">
                
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
          <h4 class="modal-title" id="exampleModalLabel">Editar prestamo</h4>
        </div>
        <div class="modal-body">
        <form id="editarprestamo">
            <div class="form-group">  
                <label for="rental_id">Codigo prestamo</label>
                <input type="text" class="form-control rental_id" id="rental_id" name="rental_id" readonly="true">
            </div>
            <div class="form-group">
                <label for="f_rental_editar">Fecha prestamo</label>
                <div class="input-group date f_rental_editar" id="f_rental_editar" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" name="rental_date" data-target="#f_rental_editar"/>
                    <div class="input-group-append" data-target="#f_rental_editar" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="inventory_id">ID Inventario</label>
                <select class="form-control inventory_id" id="inventory_id" name="inventory_id">
                
                </select>	
            </div>
            <div class="form-group">
                <label for="customer_id">Cliente</label>
                <select class="form-control customer_id" id="customer_id" name="customer_id">
                
                </select>	
            </div>
            <div class="form-group">
                <label for="f_return_editar">Fecha retorno</label>
                <div class="input-group date f_return_editar" id="f_return_editar" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" name="return_date" data-target="#f_return_editar"/>
                    <div class="input-group-append" data-target="#f_return_editar" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="staff_id">Empleado</label>
                <select class="form-control staff_id" id="staff_id" name="staff_id">
                
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