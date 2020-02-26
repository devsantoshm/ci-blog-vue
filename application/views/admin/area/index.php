
<div class="card shadow mb-4">
	<div class="card-header d-flex align-items-center justify-content-between py-3">
		<h6 class="m-0 font-weight-bold text-primary">Listar Areas</h6>
		<a href="#" class="d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus-circle fa-sm"></i> Nueva Area</a>
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
								<button type="button" class="btn btn-sm btn-info shadow-sm"><i class="fas fa-edit fa-sm"></i> Editar</button>
								<button type="button" class="btn btn-sm btn-danger shadow-sm"><i class="fas fa-trash-alt fa-sm"></i> Eliminar</button>
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