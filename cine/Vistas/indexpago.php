<!-- Index -->
<div id="pago">
    <div class="float-right">
        <button class="btn btn-primary btn-sm" id="nuevo" title="Nuevo pago"><i class="fa fa-plus" aria-hidden="true"></i></button> 
        <button class="btn btn-danger btn-sm btncerrar" data-toggle="tooltip" title="Ocultar"><i class="fa fa-times"></i></button>
    </div>
    <div class="card-body">
        <table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Empleado</th>
                    <th>ID Prestamo</th>
                    <th>Precio</th>
                    <th>Fecha pago</th>
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
    <script src="Funciones/funcionesPago.js"></script>
    </div><!-- /.pago -->

<!-- Modal Nuevo -->
<div class="modal fade" id="modalnuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Agregar nuevo pago</h4>	
      </div>
      <div class="modal-body">
        <form id="nuevoform">
            <fieldset>
                <input type="hidden" class="payment_id" id="payment_id" value="" name="payment_id"/>
            </fieldset>
            <div class="form-group">
                <label for="customer_id">Cliente</label>
                <select class="form-control customer_id" id="customer_id" name="customer_id">
                
                </select>	
            </div>
            <div class="form-group">
                <label for="staff_id">Empleado</label>
                <select class="form-control staff_id" id="staff_id" name="staff_id">
                
                </select>	
            </div>
            <div class="form-group">
                <label for="rental_id">ID Prestamo</label>
                <select class="form-control rental_id" id="rental_id" name="rental_id">
                
                </select>	
            </div>
            <div class="form-group">  
                <label for="amount">Precio</label>
                <input type="text" class="form-control amount" id="amount" name="amount">
            </div>
            <div class="form-group">
                <label for="f_pago_nuevo">Fecha pago</label>
                <div class="input-group date f_pago_nuevo" id="f_pago_nuevo" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" name="payment_date" data-target="#f_pago_nuevo"/>
                    <div class="input-group-append" data-target="#f_pago_nuevo" data-toggle="datetimepicker">
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
          <h4 class="modal-title" id="exampleModalLabel">Editar prestamo</h4>
        </div>
        <div class="modal-body">
        <form id="editarform">
            <div class="form-group">  
                <label for="payment_id">Codigo prestamo</label>
                <input type="text" class="form-control payment_id" id="payment_id" name="payment_id" readonly="true">
            </div>
            <div class="form-group">
                <label for="customer_id">Cliente</label>
                <select class="form-control customer_id" id="customer_id" name="customer_id">
                
                </select>	
            </div>
            <div class="form-group">
                <label for="staff_id">Empleado</label>
                <select class="form-control staff_id" id="staff_id" name="staff_id">
                
                </select>	
            </div>
            <div class="form-group">
                <label for="rental_id">ID Prestamo</label>
                <select class="form-control rental_id" id="rental_id" name="rental_id">
                
                </select>	
            </div>
            <div class="form-group">  
                <label for="amount">Precio</label>
                <input type="text" class="form-control amount" id="amount" name="amount">
            </div>
            <div class="form-group">
                <label for="f_pago_editar">Fecha pago</label>
                <div class="input-group date f_pago_editar" id="f_pago_editar" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" name="payment_date" data-target="#f_pago_editar"/>
                    <div class="input-group-append" data-target="#f_pago_editar" data-toggle="datetimepicker">
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