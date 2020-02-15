<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container py-2">
    <a class="navbar-brand" href="#">Drive</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">About App</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Download</a>
        </li>
        <li class="nav-item">

          <?php if ($this->session->userdata('logged_in')) : ?>
            <a href="<?= base_url('user/logout') ?>" class="btn btn-primary">Logout</a>
          <?php endif; ?>

          <?php if ($this->session->userdata('logged_in') == 0) : ?>
            <a href="<?= base_url('user/register') ?>">
              <button class="btn btn-primary">Sign Up</button>
            </a>
          <?php endif; ?>

        </li>
      </ul>
    </div>
  </div>
</nav>