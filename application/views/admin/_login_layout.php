<?php $this->load->view('admin/components/header'); ?>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-6 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Iniciar Sesión</h1>
                  </div>
                  <?php $this->load->view($subview); ?>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
  
<?php $this->load->view('admin/components/footer'); ?>