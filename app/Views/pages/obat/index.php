<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Dashboard
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">


    <?php if (!empty(session()->getFlashData('success'))) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> <?= session()->getFlashData('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Obat</h6>
        </div>
        <div class="card-body">
            <a href="<?= route_to('obat.create') ?>" class="btn btn-success"><i class="fas fa-pencil-alt"></i> Tambah</a>
            <div class="table-responsive mt-3">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Obat</th>
                            <th>Berat</th>
                            <th>Kategori</th>
                            <th>Tanggal Kadaluarsa</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama Obat</th>
                            <th>Berat</th>
                            <th>Kategori</th>
                            <th>Tanggal Kadaluarsa</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($obat as $item) : ?>
                            <tr>
                                <td><?= $item->nama ?></td>
                                <td><?= $item->berat ?></td>
                                <td><?= $item->kategori ?></td>

                                <td><?= tgl_indo($item->tanggal_exp) ?></td>
                                <td><?= format_rupiah($item->harga) ?></td>
                                <td> <?php if ($item->stok == 0) : ?>
                                        <button type="button" class="btn btn-warning"> Habis</button>
                                    <?php else : ?>
                                        <?= $item->stok ?>
                                    <?php endif; ?>
                                </td>
                                <td class="d-flex">
                                    <a href="<?= route_to('obat.edit', $item->id) ?>" class="btn btn-success mr-2"><i class="fas fa-pencil-alt"></i></a>
                                    <form method="POST" action="<?= route_to('obat.delete', $item->id)  ?>">
                                        <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
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