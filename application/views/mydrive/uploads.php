<!-- Begin Page Content -->
<div class="container-fluid">

  <?php foreach ($folder as $folder) : ?>
    <?= form_open_multipart('mydrive/create/' . $folder['id_folder']) ?>

    <div class="card text-center mt-5 mx-auto" style="width: 75vw;">
      <i class="fas fa-file-upload mt-5 mb-2" style="font-size: 15vw"></i>
      <div class="card-body">
        <hr>
        <div class="custom-file col-5">
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
<!-- End of container-fluid -->