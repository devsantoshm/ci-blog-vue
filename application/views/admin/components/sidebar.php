
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

		  <!-- Sidebar - Brand -->
		  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('admin/dashboard') ?>">
		    <div class="sidebar-brand-icon rotate-n-15">
		      <i class="fas fa-laugh-wink"></i>
		    </div>
		    <div class="sidebar-brand-text mx-3">EGE-EPIS <sup>v1</sup></div>
		  </a>

		  <!-- Divider -->
		  <hr class="sidebar-divider my-0">

		  <!-- Nav Item - Dashboard -->
		  <li class="nav-item active">
		    <a class="nav-link" href="<?php echo site_url('admin/dashboard') ?>">
		      <i class="fas fa-fw fa-tachometer-alt"></i>
		      <span>Inicio</span></a>
		  </li>

		  <!-- Divider -->
		  <hr class="sidebar-divider">

		  <!-- Heading -->
		  <div class="sidebar-heading">
		    Módulos
		  </div>

		  <!-- Nav Item - Usuarios -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/user') ?>">
          <i class="fas fa-fw fa-user-tie"></i>
          <span>Usuarios</span></a>
      </li>

      <!-- Nav Item - Areas -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/area') ?>">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Areas</span></a>
      </li>

      <!-- Nav Item - Preguntas -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/question') ?>">
          <i class="fas fa-fw fa-question"></i>
          <span>Preguntas</span></a>
      </li>

      <!-- Nav Item - Resultados -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/result') ?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Resultados</span></a>
      </li>

		  <!-- Divider -->
		  <hr class="sidebar-divider d-none d-md-block">

		  <!-- Sidebar Toggler (Sidebar) -->
		  <div class="text-center d-none d-md-inline">
		    <button class="rounded-circle border-0" id="sidebarToggle"></button>
		  </div>

		</ul>
		