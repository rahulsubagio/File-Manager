<!-- Page Wrapper -->
<div id="wrapper">

  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <?php foreach ($getfolder as $getfolder) : ?>
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('mydrive/index/' . $getfolder['id_folder']) ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fab fa-google-drive"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Drive <sup>RS</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - My Drive -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('mydrive/index/' . $getfolder['id_folder']) ?>">
          <i class="fas fa-hdd"></i>
          <span>My Drive</span>
        </a>
      </li>
    <?php endforeach; ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Upload
    </div>

    <!-- Nav Item - My Drive -->
    <!-- Create Folder -->
    <li class="nav-item">
      <a class="nav-link" href="" data-toggle="modal" data-target="#folder">
        <i class="fas fa-folder"></i>
        <span>Create Folder</span>
      </a>

      <!-- Modal -->
      <div class="modal fade" id="folder" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <form action="<?= base_url('mydrive/create_folder') ?>" method="POST">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create Folder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Folder Name" name="folder_name" value="untitled">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Create</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- End Create Folder -->

      <!-- Upload File -->
      <a class="nav-link" href="" data-toggle="modal" data-target="#upload">
        <i class="fas fa-upload"></i>
        <span>Upload File</span>
      </a>

      <!-- The Modal -->
      <div class="modal fade" id="upload" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Upload File</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <!-- <?php print_r($folder); ?> -->
              <?php foreach ($folder as $folder) : ?>
                <?= form_open_multipart('mydrive/create/' . $folder['id_folder']) ?>
                <div class="text-center mx-auto">
                  <i class="fas fa-file-upload mt-3" style="font-size: 10vw"></i>
                  <div class="card-body">
                    <hr>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="file_name">
                      <label class="custom-file-label text-left">Choose file</label>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary mt-3"><i class="fas fa-upload"></i> Upload</button>
                  </div>
                </div>
                <?= form_close() ?>
              <?php endforeach; ?>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>
      <!-- End Upload File -->
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Sharing
    </div>

    <!-- Nav Item - Sharing -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('mydrive/sharing/' . $folder['id_folder']); ?>">
        <i class="fas fa-fw fa-share-alt"></i>
        <span>Sharing File</span>
      </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Account
    </div>

    <!-- Nav Item - Logout -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('user/logout'); ?>">
        <i class="fas fa-fw fa-sign-out-alt"></i>
        <span>Logout</span>
      </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column bg-white">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      <nav class="navbar navbar-expand navbar-light mb-4 bg-white topbar static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

          <!-- Nav Item - Search Dropdown (Visible Only XS) -->
          <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
              <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                  <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                      <i class="fas fa-search fa-sm"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li>

          <div class="topbar-divider d-none d-sm-block"></div>

          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <h3 class="mr-1 my-auto d-none d-lg-inline text-gray-600"><?= $this->session->userdata('name'); ?></h3>
              <ion-icon name="contact" size="large" class="text-gray-600"></ion-icon>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="#">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
              </a>
              <a class="dropdown-item" href="#">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Settings
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?= base_url('user/logout'); ?>">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </div>
          </li>

        </ul>

      </nav>
      <!-- End of Topbar -->