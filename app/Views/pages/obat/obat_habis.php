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
            <h6 class="m-0 font-weight-bold text-primary">Obat Habis</h6>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Obat</th>
                            <th>Berat</th>
                            <th>Kategori</th>
                            <th>Tanggal Kadaluarsa</th>
                            <th>Harga</th>
                            <th>Stok</th>
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
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php if (!empty($obat)) : ?>
                            <?php foreach ($obat as $item) : ?>
                                <tr>
                                    <td><?= $item->nama ?></td>
                                    <td><?= $item->berat ?></td>
                                    <td><?= $item->kategori ?></td>

                                    <td><?= tgl_indo($item->tanggal_exp) ?></td>
                                    <td><?= format_rupiah($item->harga) ?></td>
                                    <td><?= $item->stok ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr class="text-center">
                                <td colspan="7">
                                    Data Kosong...
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>