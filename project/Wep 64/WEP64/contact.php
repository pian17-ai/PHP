<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SMKN 64 | Contact</title>
  <link rel="stylesheet" href="/WEP64/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>

  <?php include 'navbar.php' ?>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

  <div class="container my-5">
    <h1 class="text-center mb-4">Contact Us</h1>
    <div class="row">
      <div class="col-md-6">
        <div class="col-xs-12 col-md-6" id="contact">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1982.837895957961!2d106.9118575930778!3d-6.30625725867147!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f34a18a336c7%3A0x3a85f62d85e1ba8a!2sSMK%20Negeri%2064%20Jakarta%20Timur!5e0!3m2!1sid!2sid!4v1751390224571!5m2!1sid!2sid"
          width="550px" height="450px" frameborder="0" style="border:0" allowfullscreen=""></iframe>
  
      </div>
        <div class="map-container" id="map"></div>
      </div>
      <div class="col-md-6">
        <form>
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" required>
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" rows="5" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
      var map = L.map('map').setView([40.730610, -73.935242], 12); // Example coordinates

      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);

      L.marker([40.730610, -73.935242]).addTo(map)
        .bindPopup('Your location')
        .openPopup();
    });
  </script> -->

</body>

</html>