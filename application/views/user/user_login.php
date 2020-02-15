<body id="page-top" class="bg-primary">
  <?php if ($this->session->userdata('logged_in')) : ?>
    <div class="container text-center mt-5">
      <h1><b>You are login! <?= $this->session->userdata('name'); ?></b></h1>
      <hr>
      <a href="<?= base_url('user') ?>">
        <button class="btn btn-primary">back</button>
      </a>
    </div>
  <?php endif; ?>

  <?php if ($this->session->userdata('logged_in') == 0) : ?>

    <div class="container">

      <!-- Outer Row -->
      <div class="row justify-content-center">

        <div class="col-lg-6">

          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-lg">
                  <div class="p-5">
                    <div class="text-center">
                      <h3 class="text-gray-900 mb-4 font-weight-bold">Log in</h3>
                      <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success" role="alert">
                          <?= $this->session->flashdata('success') ?>
                        </div>
                      <?php endif; ?>
                    </div>
                    <form class="user" action="<?= base_url('user/auth'); ?>" method="POST">
                      <div class="form-group">
                        <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address...">
                        <?= $this->session->flashdata('email_failed'); ?>
                        <?= form_error('email', '<small class="text-danger font-weight-bold pl-3">', ' </small>'); ?>
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                        <?= $this->session->flashdata('pass_failed'); ?>
                        <?= form_error('password', '<small class="text-danger font-weight-bold pl-3">', ' </small>'); ?>
                      </div>
                      <br>
                      <button type="submit" class="btn btn-primary btn-user btn-block font-weight-bold">Login</button>
                    </form>
                    <hr>
                    <div class="text-center">
                      <a class="small text-decoration-none" href="<?= base_url('user/register') ?>">Create an Account!</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

    </div>

  <?php endif; ?>