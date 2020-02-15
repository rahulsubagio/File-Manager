<body id="page-top" class="bg-primary">
  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h3 class="text-gray-900 mb-4 font-weight-bold">Create an Account!</h3>
              </div>

              <?php if ($this->session->flashdata('failed')) : ?>
                <div class="alert alert-success" role="alert">
                  <?= $this->session->flashdata('failed') ?>
                </div>
              <?php endif; ?>

              <form class="user" action="<?= base_url('user/create'); ?>" method="POST">
                <div class="form-group">
                  <!-- <div class="input-group-prepend">
                    <ion-icon name="contact" size="large" class="input-group-text form-control-user"></ion-icon>
                  </div> -->
                  <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full Name">
                  <?= form_error('name', '<small class="text-danger font-weight-bold pl-3">', ' </small>'); ?>
                </div>
                <div class="form-group">
                  <!-- <div class="input-group-append">
                    <ion-icon name="mail" size="large" class="mx-1 my-auto"></ion-icon>
                  </div> -->
                  <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email Address">
                  <?= form_error('email', '<small class="text-danger font-weight-bold pl-3">', ' </small>'); ?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                    <?= form_error('password', '<small class="text-danger font-weight-bold pl-3">', ' </small>'); ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Repeat Password">
                  </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-user btn-block font-weight-bold">Register Account</button>
              </form>

              <hr>
              <div class="text-center">
                <a class="small text-decoration-none" href="<?= base_url('user/login') ?>">Already have an account? <b>Login!</b></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>