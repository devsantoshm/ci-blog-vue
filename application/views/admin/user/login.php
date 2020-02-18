<?php if(isset($error) || $this->session->flashdata('error')): ?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<?php echo validation_errors(); ?>
		<?php echo $this->session->flashdata('error'); ?>
	</div>
<?php endif; ?>

<form action="" method="post" class="user">
  <input type="hidden" name="enviar" value="1" />
  <div class="form-group">
    <input type="email" name="email" class="form-control form-control-user" placeholder="Ingresar Email">
  </div>
  <div class="form-group">
    <input type="password" name="password" class="form-control form-control-user" placeholder="Ingresar Password">
  </div>

  <button type="submit" class="btn btn-primary btn-user btn-block">Entrar</button>
</form>