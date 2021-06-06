<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-8">
            <h2>Edit : <?= $hfgleaders['name']; ?></h2>
            <form action="/hfgleaders/update/<?= $hfgleaders['id']; ?>" method="POST">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $hfgleaders['slug']; ?>">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" id="name" name="name" autofocus value="<?= (old('name')) ? old('name') : $hfgleaders['name']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('name') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="dob" class="col-sm-2 col-form-label">Date of Birth</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('dob')) ? 'is-invalid' : ''; ?>" id="dob" name="dob" value="<?= (old('dob')) ? old('dob') : $hfgleaders['dob']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('dob') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="insta" class="col-sm-2 col-form-label">Instagram</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('insta')) ? 'is-invalid' : ''; ?>" id="insta" name="insta" value="<?= (old('insta')) ? old('insta') : $hfgleaders['insta']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('insta') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('photo')) ? 'is-invalid' : ''; ?>" id="photo" name="photo" value="<?= (old('photo')) ? old('photo') : $hfgleaders['photo']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('photo') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="division" class="col-sm-2 col-form-label">Division</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('division')) ? 'is-invalid' : ''; ?>" id="division" name="division" value="<?= (old('division')) ? old('division') : $hfgleaders['division']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('division') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Confirm Changes</button>
                    </div>
                </div>
                <a href="/hfgleaders" class="btn btn-warning mb-3">Cancel</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>