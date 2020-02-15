<div class="" align="center">
  <?= $this->session->flashdata('login') ?>
  <br>


</div>

<!-- Header -->
<header class="bg-primary py-5 mb-5">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-lg-12">
        <h1 class="display-4 text-white mt-5 mb-2">FILE MANAGER</h1>
        <p class="lead mb-5 text-white-50">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non possimus ab labore provident mollitia. Id assumenda voluptate earum corporis facere quibusdam quisquam iste ipsa cumque unde nisi, totam quas ipsam.</p>
      </div>
    </div>
  </div>
</header>

<!-- Page Content -->
<div class="container">

  <div class="row">
    <div class="col-md-12 mb-5">
      <h2>Personal</h2>
      <hr>
      <p>Store, share, and access your files from any device. Your storage are free</p>
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores magnam reprehenderit consequatur atque incidunt adipisci libero quos possimus, quia assumenda ea neque? Natus architecto commodi, veritatis vitae eum repellendus explicabo?</p>
      <?php if ($this->session->userdata('logged_in')) : ?>
        <span>Welcome <?= $this->session->userdata('name'); ?></span>
        <hr>
        <a href="<?= base_url('user/logout') ?>" class="btn btn-primary">Logout</a>
      <?php endif; ?>

      <?php if ($this->session->userdata('logged_in') == 0) : ?>
        <a href="<?= base_url('user/login') ?>"><button class="btn btn-primary">Go to Drive</button></a>
        <br>
        <hr>
        <a href="<?= base_url('user/register') ?>" class="text-decoration-none">Create an Account!</a>
      <?php endif; ?>
    </div>
  </div>
  <!-- /.row -->

  <div class="row">
    <div class="col-md-4 mb-5">
      <div class="card h-100">
        <img class="card-img-top" src="<?= base_url('assets/') ?>/img/fiqup.jpeg" alt="">
        <div class="card-body">
          <h4 class="card-title text-center">Fiqri Upakarti A</h4>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque sequi doloribus.</p>
        </div>
        <div class="card-footer text-center">
          <a href="https://www.instagram.com/fiqup" class=""><i class="fab fa-instagram fa-2x"></i></a>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-5">
      <div class="card h-100">
        <img class="card-img-top" src="<?= base_url('assets/') ?>/img/rahul.jpeg" alt="">
        <div class="card-body">
          <h4 class="card-title text-center">Rahul Subagio</h4>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
        </div>
        <div class="card-footer text-center">
          <a href="https://www.instagram.com/rahulsubagio" class=""><i class="fab fa-instagram fa-2x"></i></a>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-5">
      <div class="card h-100">
        <img class="card-img-top" src="<?= base_url('assets/') ?>/img/afiq.jpg" alt="">
        <div class="card-body">
          <h4 class="card-title text-center">M Afiq Alvadeano</h4>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
        </div>
        <div class="card-footer text-center">
          <a href="https://www.instagram.com/afiqalvadeano" target="_blank" class=""><i class="fab fa-instagram fa-2x"></i></a>
        </div>
      </div>
    </div>
  </div>
  <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
  </div>
  <!-- /.container -->
</footer>