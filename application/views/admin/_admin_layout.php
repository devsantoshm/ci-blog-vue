<?php $this->load->view('admin/components/header'); ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
		
		<!-- Sidebar -->
		<?php $this->load->view('admin/components/sidebar'); ?>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

		  <!-- Main Content -->
		  <div id="content">

		    <!-- Topbar -->
		    <?php $this->load->view('admin/components/navbar'); ?>
		    <!-- End of Topbar -->

		    <!-- Begin Page Content -->
		    <div class="container-fluid">

		      <!-- Page Heading -->
		      <div class="d-flex align-items-center justify-content-center mb-4">
		        <h1 class="h5 mb-0 text-gray-800">Examen General para el Egreso de la Escuela Profesional de Ingenieria de Sistemas </h1>
		      </div>

          <!-- Gestionar Contenido-->
          <?php $this->load->view($subview); ?>

		    </div>
		    <!-- /.container-fluid -->

		  </div>
		  <!-- End of Main Content -->

		  <!-- Footer -->
		  <footer class="sticky-footer bg-white">
		    <div class="container my-auto">
		      <div class="copyright text-center my-auto">
		        <span>Copyright &copy; EGE-EPIS <sup>v1</sup> <?php echo date("Y"); ?></span>
		      </div>
		    </div>
		  </footer>
		  <!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
  
<?php $this->load->view('admin/components/footer'); ?>