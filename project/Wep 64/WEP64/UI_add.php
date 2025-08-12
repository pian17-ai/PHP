<?php
    session_start();
    include '../WEP64/UI_con.php'
?>

<?php 
    $success = "";
    $error = "";
?>

<?php 
    if(isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $nip = mysqli_real_escape_string($conn, $_POST['nip']);
        $faculty = mysqli_real_escape_string($conn, $_POST['faculty']);
        $gpa = mysqli_real_escape_string($conn, $_POST['gpa']);

        if ($name && $nip && $faculty && $gpa) {
            $sql = "INSERT into tbl_mhs (name_mhs, nip_mhs, faculty_mhs, gpa_mhs) values ('$name', '$nip', '$faculty', '$gpa')";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                $success = "Add data success";
            } else {
                $error = "Add data failed";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar bg-body-tertiary shadow p-3 mb-4">
        <div class="container-fluid">
            <a class="navbar-brand font-monospace" href="UI.php">
                <img src="img/UI/UI_bg.png" width="30" height="auto" alt="">
                Universitas Indonesia
            </a>
        </div>
    </nav>

    <!-- INPUT -->
     <div class="container">
         <form method="POST" action="">
             <p class="fs-3 fw-medium text-center">Add Mahasiswa</p>
             <?php 
                if ($error) {
             ?>
                <div class="alert alert-success">
                    <?= $error ?>
                </div>
             <?php } ?>
             <?php 
                if ($success) {
             ?>
                <div class="alert alert-success">
                    <?= $success ?>
                </div>
             <?php } ?>
             <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">Name</label>
                 <input class="form-control" name="name" id="name">
             </div>
             <div class="mb-3">
                 <label for="exampleInputPassword1" class="form-label">NIP</label>
                 <input class="form-control" name="nip" id="nip">
             </div>
             <div class="mb-3">
                 <label for="exampleInputPassword1" class="form-label">Faculty</label>
                 <input class="form-control" name="faculty" id="faculty">
             </div>
             <div class="mb-3">
                 <label for="exampleInputPassword1" class="form-label">GPA</label>
                 <input class="form-control" name="gpa" id="gpa">
             </div>
             <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
         </form>
     </div>
</body>

</html>