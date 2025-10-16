<div class="container">
    <div class="row">
        <div class="col-6 mt-4">
            <h3>Student List</h3>
            <?php foreach ($data['students'] as $stds) :  ?>
                <ul>
                    <li><?= $stds['name'] ?></li>
                    <li><?= $stds['nrp'] ?></li>
                    <li><?= $stds['email'] ?></li>
                    <li><?= $stds['major'] ?></li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>