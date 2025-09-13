<div class="container mt-3">
  <?php if (!empty($success)) { ?>
    <div class="alert alert-success"><?= $success ?></div>
  <?php } ?>
  <?php if (!empty($error)) { ?>
    <div class="alert alert-danger"><?= $error ?></div>
  <?php } ?>
  <a href="index.php" class="btn btn-primary mt-2">Kembali</a>
</div>
