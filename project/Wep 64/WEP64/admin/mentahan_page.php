<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SMKN 64 | Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      min-height: 100vh;
    }

    .sidebar {
      min-height: 100vh;
      background-color: #343a40;
    }

    .sidebar a {
      color: white;
    }

    .sidebar a:hover {
      background-color: #495057;
      color: #fff;
    }

    .card {
      margin-top: 10px;
    }

    .border {
      margin: 5px;
    }

    .img {
      width: 108px;
      height: auto;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->

      <!-- Main Content -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
        <h2>Gallery</h2>

        <div class="max-auto mb-4">
          <div class="card">
            <div class="card-header">
              Create or Edit Gallery
            </div>
            <div class="card-body">
              <form action="" method="POST">
                <div class="mb-3 row">
                  <label for="title" class="col-sm-2 col-form-label">Gallery Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" id="title" value="">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="deskripsi" class="col-sm-2 col-form-label">Gallery Deskripsi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="logo" class="col-sm-2 col-form-label">Gallery Iamge</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="image" id="image" value="">
                  </div>
                </div>
                <div class="col-12">
                  <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- DATA -->

        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Title</th>
              <th scope="col">Deskripsi</th>
              <th scope="col">Image</th>
              <th scope="col">created_at</th>
              <th scope="col">updated_at</th>
              <th scope="col">Edit or Delete</th>
            </tr>
          </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Catur</td>
                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, veritatis tempore. Similique suscipit beatae enim ex omnis eum rem veritatis.</td>
                <td>
                  <img class="img rounded" src="../img/gallery/madison.JPG" alt="">
                </td>
                <td>12.32</td>
                <td>14.56</td>
                <td>
                  <a href="berita.php?op=edit&id=">
                    <div class="btn btn-warning mb-2">Edit</div>
                  </a>
                  <a href="berita.php?op=delete&id=" onclick="return confirm('Yakin Mau Hapus Data?')">
                    <div class="btn btn-danger">Delete</div>
                  </a>
                </td>
              </tr>
            </tbody>
        </table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>