<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel"><?php echo empty($area->id) ? 'Nueva Area' : 'Editar Area' ?></h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php echo form_open($form_action);?>
<div class="modal-body">
  <input type="hidden" name="enviar" value="1" />
  <div class="form-group">
    <label for="area" class="col-form-label">Area</label>
    <?php echo form_input('area', set_value('area', $area->name), 'class="form-control" id="area"');?>
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary btn-sm shadow-sm" data-dismiss="modal"><i class="fas fa-times-circle fa-sm"></i> Cancelar</button>
  <button type="submit" class="btn btn-primary btn-sm shadow-sm"><?php echo empty($area->id) ? '<i class="fas fa-plus-circle fa-sm"></i> Registrar Area' : '<i class="fas fa-edit fa-sm"></i> Editar Area'; ?></button>
</div>
<?php echo form_close();?>