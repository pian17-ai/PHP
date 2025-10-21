<div class="container">
    <div class="row">
        <div class="col-6 mt-4">
            <h3>Student List</h3>
            <ul class="list-group">
                <?php foreach ($data['students'] as $student) :  ?>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <?= $student['name'] ?>
                        <a href="<?= BASEURL; ?>/student/detail/ <?= $student['id'] ?>" class="badge text-bg-info">Detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>