
<div class="card shadow mb-4">
	<div class="card-header d-flex align-items-center justify-content-between py-3">
		<h6 class="m-0 font-weight-bold text-primary">Listar Areas</h6>
		<button class="d-sm-inline-block btn btn-sm btn-success shadow-sm" onclick="add_area()"><i class="fas fa-plus-circle fa-sm"></i> Nueva Area</button>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($areas)): foreach($areas as $area): ?>
						<tr>
							<td><?php echo $area->name ?></td>
							<td>
								<button type="button" class="btn btn-sm btn-info shadow-sm" onclick="edit_area(<?php echo $area->id ?>)"><i class="fas fa-edit fa-sm"></i> Editar</button>
								<button type="button" class="btn btn-sm btn-danger shadow-sm" onclick="delete_area(<?php echo $area->id ?>)"><i class="fas fa-trash-alt fa-sm"></i> Eliminar</button>
							</td>
						</tr>
					<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<td colspan="2" class="text-center">No existen areas, agrega una nueva area.</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Modal New Area -->
<div class="modal fade" id="area-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" id="form-modal">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="message">
        </div>
        <form action="#" id="form">
          <div class="form-group">
            <label for="name" class="col-form-label">Area</label>
            <input type="text" name="name" class="form-control" id="name" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm shadow-sm" data-dismiss="modal"><i class="fas fa-times-circle fa-sm"></i> Cancelar</button>
        <button type="button" onclick="save()" class="btn btn-primary btn-sm shadow-sm btn-area"></button>
      </div>
    </div>
  </div>
</div>