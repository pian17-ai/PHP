<?php


include 'koneksi.php';

$sql = "SELECT * from users";
$query = mysqli_query($conn, $sql);

?>

<table border="1px">
    <tr>
        <th>id</th>
        <th>nama</th>
        <th>email</th>
        <th>password</th>
    </tr>
    <?php
    $sql = "SELECT * from users";
    $query = mysqli_query($conn, $sql);
    while($data = mysqli_fetch_array($query)){
    ?>
    <tr>
        <td><?= $data['id'] ?></td>
        <td><?= $data['nama'] ?></td>
        <td><?= $data['email'] ?></td>
        <td><?= $data['password'] ?></td>
    </tr>
    <?php } ?>
</table>