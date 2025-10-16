<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
    <title>Page <?= $data['title'] ?></title>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold text-primary" href="<?= BASEURL; ?>">MyMVC</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="<?= BASEURL; ?>">Home</a></li>
        <li class="nav-item"><a class="nav-link active" href="<?= BASEURL; ?>/About">About</a></li>
        <li class="nav-item"><a class="nav-link active" href="<?= BASEURL; ?>/Student">Students</a></li>
      </ul>
    </div>
  </div>
</nav>