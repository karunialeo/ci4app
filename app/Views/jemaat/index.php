<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-6">
            <h1 class="mb-3">Daftar Jemaat</h1>
            <form action="" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search here.." name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                    <?php foreach ($jemaat as $j) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $j['name']; ?></td>
                            <td><?= $j['address']; ?></td>
                            <td>
                                <a href="" class="btn btn-primary">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('jemaat', 'jemaat_pagination'); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>