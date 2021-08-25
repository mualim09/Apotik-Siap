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
            <h6 class="m-0 font-weight-bold text-primary">Data Penjualan</h6>
        </div>
        <div class="card-body">

            <div class="table-responsive mt-3">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Pembeli</th>
                            <th>Tanggal Transaksi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama Pembeli</th>
                            <th>Tanggal Transaksi</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($transaksi as $item) : ?>
                            <tr>
                                <td><?= $item->nama_pembeli ?></td>
                                <td><?= tgl_Waktu_indo($item->tanggal_transaksi) ?></td>
                                <td>
                                    <a href="<?= route_to('transaksi.invoice', $item->id) ?>
                                    " class="btn btn-info"><i class="fas fa-file-invoice"></i></a>
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