<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar web pemula</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Nama Kelompok:
      </h1>
      <ul>
        <li>Alvian</li>
        <li>Hazami</li>
        <li>Rezki</li>
        <li>Dwi</li>
        <li>Sarah</li>
        <li>Fahra</li>
      </ul>

      <a href="http://localhost/PHP/project/Wep-64/WEP64/">

        <img src="../img/WhatsApp Image 2025-08-25 at 11.02.16 AM.jpeg" class="img" alt="">
      </a>

      <div class="card">
        <h1>Biodata : </h1>
        <p>nama :</p>
        <p>kelas :</p>
        <p>hobi :</p>
      </div>

      <?php 
        include '../be/register.php';
      ?>

      <h1>Data :</h1>
      <?php 
        include '../be/data.php';
      ?>
      
      <script src="script.js"></script>
</body>
</html>