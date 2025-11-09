<div class="container mt-5">
  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><?= $data['student']['name'] ?></h5>
      <h6 class="card-subtitle mb-2 text-body-secondary"><?= $data['student']['nrp'] ?></h6>
      <p class="card-text"><?= $data['student']['email'] ?></p>
      <p class="card-text"><?= $data['student']['major'] ?></p>
      <a href="<?= BASEURL; ?>/Student" class="card-link">Kembali</a>
    </div>
  </div>
</div>