
<div class="card shadow mb-4">
	<div class="card-header d-flex align-items-center justify-content-between py-3">
		<h6 class="m-0 font-weight-bold text-primary">Listar Usuarios</h6>
		<button class="d-sm-inline-block btn btn-sm btn-success shadow-sm" onclick="add_user()"><i class="fas fa-plus-circle fa-sm"></i> Nuevo Usuario</button>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Nombre(s)</th>
            <th>Apellido(s)</th>
            <th>Fecha Nac.</th>
            <th>Correo Elec.</th>
            <th>Rol de Usuario</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
         <?php if(count($users)): foreach($users as $user): ?>
          <tr>
           <td><?php echo $user->first_name ?></td>
           <td><?php echo $user->last_name ?></td>
           <td><?php echo date('d/m/Y', strtotime($user->birthday)) ?></td>
           <td><?php echo $user->email ?></td>
           <td><?php echo $user->role ?></td>
           <td>
            <button type="button" class="btn btn-sm btn-info shadow-sm" onclick="edit_user(<?php echo $user->id ?>)"><i class="fas fa-edit fa-sm"></i> Editar</button>
            <button type="button" class="btn btn-sm btn-danger shadow-sm" onclick="delete_user(<?php echo $user->id ?>)"><i class="fas fa-trash-alt fa-sm"></i> Eliminar</button>
          </td>
        </tr>
      <?php endforeach; ?>
      <?php else: ?>
        <tr>
         <td colspan="2" class="text-center">No existen usuarios, agregue un nuev usuario.</td>
       </tr>
     <?php endif; ?>
   </tbody>
 </table>
</div>
</div>
</div>

<!-- Modal New user -->
<div class="modal fade" id="user-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="first_name" class="col-form-label">Nombre(s)</label>
              <input type="text" name="first_name" class="form-control" id="first_name" required>
            </div>
            <div class="form-group col-md-6">
              <label for="last_name" class="col-form-label">Apellido(s)</label>
              <input type="text" name="last_name" class="form-control" id="last_name" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="birthday" class="col-form-label">Fecha Nacimiento</label>
              <input type="date" name="birthday" class="form-control" id="birthday" required>
            </div>
            <div class="form-group col-md-6">
              <label for="email" class="col-form-label">Correo Electrónico</label>
              <input type="text" name="email" class="form-control" id="email" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="password" class="col-form-label">Contraseña</label>
              <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <div class="form-group col-md-6">
              <label for="password_confirm" class="col-form-label">Confirmar Contraseña</label>
              <input type="password" name="password_confirm" class="form-control" id="password_confirm" required>
            </div>
          </div>
          <div class="form-group">
              <label for="role" class="col-form-label">Rol</label>
              <select name="role" class="form-control" id="role">
                <option value="Administrador">Administrador</option>
                <option value="Egresado">Egresado</option>
              </select>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm shadow-sm" data-dismiss="modal"><i class="fas fa-times-circle fa-sm"></i> Cancelar</button>
        <button type="button" onclick="save()" class="btn btn-primary btn-sm shadow-sm btn-user"></button>
      </div>
    </div>
  </div>
</div>