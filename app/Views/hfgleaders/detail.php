<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-4">Details</h2>
            <div class="card mb-3 mt-4" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/<?= $hfgleaders['photo']; ?>" alt="<?= $hfgleaders['name']; ?>" width="180">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $hfgleaders['name']; ?></h5>
                            <p class="card-text"><?= $hfgleaders['division']; ?></p>
                            <p class="card-text">Date of Birth : <?= $hfgleaders['dob']; ?></p>
                            <p class="card-text"><a href="http://instagram.com/<?= $hfgleaders['insta']; ?>" class="alert-link">@<?= $hfgleaders['insta']; ?></a></p>

                            <a href="/hfgleaders/edit/<?= $hfgleaders['slug']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/hfgleaders/<?= $hfgleaders['id']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</button>
                            </form>
                            <br><br>
                            <a href="/hfgleaders">Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>