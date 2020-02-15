<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="dropdown">
    <table>
      <tr>
        <td>
          <h5 class="">
            <?php foreach ($getfolder as $getfolder) : ?>
              <a href="<?= base_url('mydrive/index/' . $getfolder['id_folder']) ?>" class="text-decoration-none text-secondary">My Drive</a>
            <?php endforeach; ?>
          </h5>
        </td>
        <td><i class="fas fa-angle-right fa-lg mx-2"></td>
        <?php foreach ($folder as $folder) : ?>
          <td>
            <h5 class="dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown">
              <a href="#" class="text-decoration-none text-secondary"><?= $folder['folder_name'] ?><a>
            </h5>
            <div class="dropdown-menu shadow-sm" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item font-weight-bold text-secondary" href="" data-toggle="modal" data-target="#upload">
                <i class="fas fa-upload mr-3"></i>Upload File
              </a>
              <a class="dropdown-item font-weight-bold text-secondary" href="<?= base_url('mydrive/delete_folder/' . $folder['id_folder']); ?>">
                <i class="fas fa-trash mr-3"></i>Delete Folder
              </a>
            </div>
          </td>
        <?php endforeach; ?>
      </tr>
    </table>
  </div>
  <hr class="mb-4 mt-2">

  <!-- jika file masih kosong -->
  <?php if ($file == null) : ?>
    <div class="text-center">
      <i class="fas fa-file-upload m-5" style="font-size: 15vw"></i>
      <h3>add files using the button below</h3>
      <hr>
      <a href="<?= base_url('mydrive/uploads/' . $folder['id_folder']) ?>">
        <button class="btn btn-primary"><i class="fas fa-plus"></i> Add</button>
      </a>
    </div>
  <?php endif;
  $i = 0;
  ?>

  <!-- jika file ada -->
  <?php if ($file != null) : ?>
    <h6 class="font-weight-bold ml-3">File</h6>
    <div class="card-deck">
      <?php foreach ($file as $file) : ?>

        <!-- Buka Modal Detail -->
        <div class="modal" id="myModal<?= $i ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                <h5 class="font-weight-bold mt-2 mx-2"><?= $file['file_name']; ?></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body container col-11">

                <!-- <a id="switch" href="">
                  <div class="custom-control custom-switch text-right">
                    <input type="checkbox" class="custom-control-input" id="customSwitch1" onclick="myFunction()">
                    <label class="custom-control-label" for="customSwitch1">Share</label>
                  </div>
                </a> -->

                <?php if ($file['share'] == 0) : ?>
                  <a href="<?= base_url('mydrive/share/' . $file['id_file']) ?>" class="text-decoration-none text-secondary float-right">
                    Share : <button class="btn btn-sm btn-outline-primary">OFF</button>
                  </a>
                  <br><br>
                <?php endif; ?>
                <?php if ($file['share'] == 1) : ?>
                  <a href="<?= base_url('mydrive/notshare/' . $file['id_file']) ?>" class="text-decoration-none text-secondary float-right">
                    Share : <button class="btn btn-sm btn-primary">ON</button>
                  </a>
                  <br><br>
                <?php endif; ?>

                <h5 class="text-center"><i class="fas fa-info-circle"></i> Details</h5>
                <table>
                  <tr>
                    <td>
                      <h6 class="">Type</h6>
                    </td>
                    <td>
                      <h6 class="">:</h6>
                    </td>
                    <td>
                      <h6 class=""><?= "(" . $file['file_type'] . ")"; ?></h6>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h6 class="">Size</h6>
                    </td>
                    <td>
                      <h6 class="">:</h6>
                    </td>
                    <td>
                      <h6 class=""><?= $file['file_size']; ?> KB</h6>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h6 class="">Location</h6>
                    </td>
                    <td>
                      <h6 class="">:</h6>
                    </td>
                    <td>
                      <h6 class=""><?= $file['location']; ?></h6>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h6 class="">Already Made</h6>
                    </td>
                    <td>
                      <h6 class="">:</h6>
                    </td>
                    <td>
                      <h6 class=""><?= date('d M Y | H:i', strtotime($file['upload_time'])) ?></h6>
                    </td>
                  </tr>
                </table>
              </div>
              <!-- <script>
                function myFunction() {
                  var checkBox = document.getElementById("customSwitch1");
                  var text = document.getElementById("switch");
                  if (checkBox.checked == true) {
                    switch.href = "<?= base_url('mydrive/share/' . $file['id_file']) ?>";
                  } else {
                    switch.href = "<?= base_url('mydrive/notshare/' . $file['id_file']) ?>";
                  }
                }
              </script> -->

              <!-- Modal footer -->
              <div class="modal-footer">
                <a class="text-decoration-none" href="<?= base_url('mydrive/delete/' . $file['id_file']); ?>">
                  <button class="btn btn-outline-danger btn-block"><i class="fas fa-trash-alt"></i> Delete</button>
                </a>
                <a class="text-decoration-none" href="<?= base_url('./' . $file['email'] . '/' . $file['file_name']); ?>" download>
                  <button class="btn btn-success btn-block">Download</button>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- Tutup Modal Detail -->

        <?php if ($file['file_type'] == '.png' || $file['file_type'] == '.jpeg' || $file['file_type'] == '.svg' || $file['file_type'] == '.gif') : ?>
          <div class="row ml-2 mt-1 mb-3">
            <div class="card shadow-sm" style="width: 15rem;">
              <div>
                <div class="btn-group float-right">
                  <a href="#">
                    <h5 class="text-center mr-2 mt-2 text-primary" data-toggle="modal" data-target="#myModal<?= $i ?>"><i class="fas fa-info-circle"></i></h5>
                  </a>
                </div>
              </div>
              <div class="text-center">
                <a href="<?= base_url('./' . $file['email'] . '/' . $file['file_name']); ?>" target="_blank" class="text-center">
                  <i class="fas fa-file-image" style="font-size: 10vh"></i>
                </a>
                <div class="card-body text-center">
                  <hr>
                  <?php $text = $file['file_name']; ?>
                  <?php if (strlen($text) > 20) { ?>
                    <p class="card-text text-secondary" data-toggle="tooltip" title="<?= $text ?>"><?= substr($text, 0, 20) . ' ...'; ?></p>
                  <?php } else { ?>
                    <p class="card-text text-secondary"><?= $text; ?></p>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>

        <?php if ($file['file_type'] == '.docx' || $file['file_type'] == '.doc') : ?>
          <div class="row ml-2 mt-1 mb-3">
            <div class="card shadow-sm" style="width: 15rem;">
              <div>
                <div class="btn-group float-right">
                  <a href="#">
                    <h5 class="text-center mr-2 mt-2 text-primary" data-toggle="modal" data-target="#myModal<?= $i ?>"><i class="fas fa-info-circle"></i></h5>
                  </a>
                </div>
              </div>
              <div class="text-center">
                <a href="<?= base_url('./' . $file['email'] . '/' . $file['file_name']); ?>" target="_blank">
                  <i class="fas fa-file-word" style="font-size: 10vh"></i>
                </a>
                <div class="card-body">
                  <hr>
                  <?php $text = $file['file_name']; ?>
                  <?php if (strlen($text) > 20) { ?>
                    <p class="card-text text-secondary" data-toggle="tooltip" title="<?= $text ?>"><?= substr($text, 0, 20) . ' ...'; ?></p>
                  <?php } else { ?>
                    <p class="card-text text-secondary"><?= $text; ?></p>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>

        <?php if ($file['file_type'] == '.xls' || $file['file_type'] == '.xlsx') : ?>
          <div class="row ml-2 mt-1 mb-3">
            <div class="card shadow-sm" style="width: 15rem;">
              <div>
                <div class="btn-group float-right">
                  <a href="#">
                    <h5 class="text-center mr-2 mt-2 text-primary" data-toggle="modal" data-target="#myModal<?= $i ?>"><i class="fas fa-info-circle"></i></h5>
                  </a>
                </div>
              </div>
              <div class="text-center">
                <a href="<?= base_url('./' . $file['email'] . '/' . $file['file_name']); ?>" target="_blank">
                  <i class="fas fa-file-excel" style="font-size: 10vh"></i>
                </a>
                <div class="card-body">
                  <hr>
                  <?php $text = $file['file_name']; ?>
                  <?php if (strlen($text) > 20) { ?>
                    <p class="card-text text-secondary" data-toggle="tooltip" title="<?= $text ?>"><?= substr($text, 0, 20) . ' ...'; ?></p>
                  <?php } else { ?>
                    <p class="card-text text-secondary"><?= $text; ?></p>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>

        <?php if ($file['file_type'] == '.ppt' || $file['file_type'] == '.pptx') : ?>
          <div class="row ml-2 mt-1 mb-3">
            <div class="card shadow-sm" style="width: 15rem;">
              <div>
                <div class="btn-group float-right">
                  <a href="#">
                    <h5 class="text-center mr-2 mt-2 text-primary" data-toggle="modal" data-target="#myModal<?= $i ?>"><i class="fas fa-info-circle"></i></h5>
                  </a>
                </div>
              </div>
              <div class="text-center">
                <a href="<?= base_url('./' . $file['email'] . '/' . $file['file_name']); ?>" target="_blank">
                  <i class="fas fa-file-powerpoint" style="font-size: 10vh"></i>
                </a>
                <div class="card-body">
                  <hr>
                  <?php $text = $file['file_name']; ?>
                  <?php if (strlen($text) > 20) { ?>
                    <p class="card-text text-secondary" data-toggle="tooltip" title="<?= $text ?>"><?= substr($text, 0, 20) . ' ...'; ?></p>
                  <?php } else { ?>
                    <p class="card-text text-secondary"><?= $text; ?></p>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>

        <?php if ($file['file_type'] == '.pdf') : ?>
          <div class="row ml-2 mt-1 mb-3">
            <div class="card shadow-sm" style="width: 15rem;">
              <div>
                <div class="btn-group float-right">
                  <a href="#">
                    <h5 class="text-center mr-2 mt-2 text-primary" data-toggle="modal" data-target="#myModal<?= $i ?>"><i class="fas fa-info-circle"></i></h5>
                  </a>
                </div>
              </div>
              <div class="text-center">
                <a href="<?= base_url('./' . $file['email'] . '/' . $file['file_name']); ?>" target="_blank">
                  <i class="fas fa-file-pdf" style="font-size: 10vh"></i>
                </a>
                <div class="card-body">
                  <hr>
                  <?php $text = $file['file_name']; ?>
                  <?php if (strlen($text) > 20) { ?>
                    <p class="card-text text-secondary" data-toggle="tooltip" title="<?= $text ?>"><?= substr($text, 0, 20) . ' ...'; ?></p>
                  <?php } else { ?>
                    <p class="card-text text-secondary"><?= $text; ?></p>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>

        <?php if ($file['file_type'] == '.mp4') : ?>
          <div class="row ml-2 mt-1 mb-3">
            <div class="card shadow-sm" style="width: 15rem;">
              <div>
                <div class="btn-group float-right">
                  <a href="#">
                    <h5 class="text-center mr-2 mt-2 text-primary" data-toggle="modal" data-target="#myModal<?= $i ?>"><i class="fas fa-info-circle"></i></h5>
                  </a>
                </div>
              </div>
              <div class="text-center">
                <a href="<?= base_url('./' . $file['email'] . '/' . $file['file_name']); ?>" target="_blank">
                  <i class="fas fa-file-video" style="font-size: 10vh"></i>
                </a>
                <div class="card-body">
                  <hr>
                  <?php $text = $file['file_name']; ?>
                  <?php if (strlen($text) > 20) { ?>
                    <p class="card-text text-secondary" data-toggle="tooltip" title="<?= $text ?>"><?= substr($text, 0, 20) . ' ...'; ?></p>
                  <?php } else { ?>
                    <p class="card-text text-secondary"><?= $text; ?></p>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>

        <?php if ($file['file_type'] == '.mp3') : ?>
          <div class="row ml-2 mt-1 mb-3">
            <div class="card shadow-sm" style="width: 15rem;">
              <div>
                <div class="btn-group float-right">
                  <a href="#">
                    <h5 class="text-center mr-2 mt-2 text-primary" data-toggle="modal" data-target="#myModal<?= $i ?>"><i class="fas fa-info-circle"></i></h5>
                  </a>
                </div>
              </div>
              <div class="text-center">
                <a href="<?= base_url('./' . $file['email'] . '/' . $file['file_name']); ?>" target="_blank">
                  <i class="fas fa-file-audio" style="font-size: 10vh"></i>
                </a>
                <div class="card-body">
                  <hr>
                  <?php $text = $file['file_name']; ?>
                  <?php if (strlen($text) > 20) { ?>
                    <p class="card-text text-secondary" data-toggle="tooltip" title="<?= $text ?>"><?= substr($text, 0, 20) . ' ...'; ?></p>
                  <?php } else { ?>
                    <p class="card-text text-secondary"><?= $text; ?></p>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>

        <?php if ($file['file_type'] == '.rar' || $file['file_type'] == '.zip') : ?>
          <div class="row ml-2 mt-1 mb-3">
            <div class="card shadow-sm" style="width: 15rem;">
              <div>
                <div class="btn-group float-right">
                  <a href="#">
                    <h5 class="text-center mr-2 mt-2 text-primary" data-toggle="modal" data-target="#myModal<?= $i ?>"><i class="fas fa-info-circle"></i></h5>
                  </a>
                </div>
              </div>
              <div class="text-center">
                <a href="<?= base_url('./' . $file['email'] . '/' . $file['file_name']); ?>" target="_blank">
                  <i class="fas fa-file-archive" style="font-size: 10vh"></i>
                </a>
                <div class="card-body">
                  <hr>
                  <?php $text = $file['file_name']; ?>
                  <?php if (strlen($text) > 20) { ?>
                    <p class="card-text text-secondary" data-toggle="tooltip" title="<?= $text ?>"><?= substr($text, 0, 20) . ' ...'; ?></p>
                  <?php } else { ?>
                    <p class="card-text text-secondary"><?= $text; ?></p>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>

        <?php if ($file['file_type'] == '.php' || $file['file_type'] == '.html') : ?>
          <div class="row ml-2 mt-1 mb-3">
            <div class="card shadow-sm" style="width: 15rem;">
              <div>
                <div class="btn-group float-right">
                  <a href="#">
                    <h5 class="text-center mr-2 mt-2 text-primary" data-toggle="modal" data-target="#myModal<?= $i ?>"><i class="fas fa-info-circle"></i></h5>
                  </a>
                </div>
              </div>
              <div class="text-center">
                <a href="<?= base_url('./' . $file['email'] . '/' . $file['file_name']); ?>" target="_blank">
                  <i class="fas fa-file-code" style="font-size: 10vh"></i>
                </a>
                <div class="card-body">
                  <hr>
                  <?php $text = $file['file_name']; ?>
                  <?php if (strlen($text) > 20) { ?>
                    <p class="card-text text-secondary" data-toggle="tooltip" title="<?= $text ?>"><?= substr($text, 0, 20) . ' ...'; ?></p>
                  <?php } else { ?>
                    <p class="card-text text-secondary"><?= $text; ?></p>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
      <?php endif;
          $i++;
        endforeach; ?>
    </div>
  <?php endif; ?>

</div>
<!-- End of container-fluid -->