<div class="container">
    <div class="row">
        <div class="col-6 mt-3">

            <div class="row">
                <?php Flasher::flash(); ?>
            </div>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">
                Add Student
            </button>

            <br></br>
            <h3>Student List</h3>
            <ul class="list-group">
                <?php foreach ($data['students'] as $student) :  ?>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <?= $student['name'] ?>
                        <a href="<?= BASEURL; ?>/Student/detail/<?= $student['id'] ?>" class="badge text-bg-info">Detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>


<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="titleModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="titleModal">Add Student</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/Student/insert" method="post">

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="mb-3">
                        <label for="nrp" class="form-label">Nrp</label>
                        <input type="number" class="form-control" id="nrp" name="nrp">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>

                    <label for="major" class="form-label">Major</label>
                    <select class="form-select" aria-label="Default select example" id="major" name="major">
                        <!-- <option selected>Open this select menu</option> -->
                        <option value="Computer Science">Computer Science</option>
                        <option value="Medicine">Medicine</option>
                        <option value="Cyber Security">Cyber Security</option>
                        <option value="Software Engineer">Software Engineer</option>
                        <option value="Faculty of Law">Faculty of Law</option>
                        <option value="Faculty of Economics">Faculty of Economics</option>
                        <option value="Faculty of Education">Faculty of Education</option>
                        <option value="Faculty of Psychology">Faculty of Psychology</option>
                    </select>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save data</button>
                </form>
            </div>
        </div>
    </div>
</div>