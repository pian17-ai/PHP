<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register - Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #212529;
      color: #fff;
    }
    .form-container {
      max-width: 400px;
      margin: 100px auto;
      background-color: #343a40;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.5);
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h3 class="text-center mb-4">Register Admin</h3>
    <form>
      <div class="mb-3">
        <label for="email" class="form-label">Username</label>
        <input type="email" class="form-control" id="email" required />
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" required />
      </div>
      <button type="submit" class="btn btn-success w-100">Register</button>
      <p class="mt-3 text-center">Sudah punya akun? <a href="login.php" class="text-decoration-none text-info">Login</a></p>
    </form>
  </div>
</body>
</html>