<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Dashboard
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">


    <?php if (!empty(session()->getFlashData('success'))) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashData('success') ?>
        </div>
    <?php endif; ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Obat</h6>
        </div>
        <div class="card-body">
            <a href="<?= route_to('obat.create') ?>" class="btn btn-success">Tambah Data</a>
            <div class="table-responsive mt-3">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Obat</th>
                            <th>Merk</th>
                            <th>Tanggal Expired</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama Obat</th>
                            <th>Merk</th>
                            <th>Tanggal Expired</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($obat as $item) : ?>
                            <tr>
                                <td><?= $item->nama ?></td>
                                <td><?= $item->merk ?></td>
                                <td><?= $item->tanggal_exp ?></td>
                                <td><?= $item->harga ?></td>
                                <td><?= $item->stok ?></td>
                                <td>
                                    <button class="btn btn-success">Edit</button>
                                    <form method="POST" action="<?= route_to('obat.delete', $item->id)  ?>">
                                        <button class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>