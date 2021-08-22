<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Dashboard
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <a href="<?= route_to('obat.index') ?>" class="btn btn-success mr-2 mb-3"><i class="fas fa-arrow-left"></i></a>
    <?php if (!empty(session()->getFlashData('errors'))) :
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Oops!</strong> Cek kembali input data!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    <?php endif; ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Obat</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="<?= route_to('obat.update', $obat->id) ?>">

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Nama Obat :</label>
                            <input value="<?= $obat->nama ?>" name="nama" type="text" class="form-control <?= !empty(session()->getFlashData('errors')['nama']) ? 'is-invalid' : 'valid' ?>">
                            <?php if (!empty(session()->getFlashData('errors')['nama'])) : ?>
                                <div class="invalid-feedback">
                                    <?= session()->getFlashData('errors')['nama'] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="">Berat :</label>
                            <input value="<?= $obat->berat ?>" name="berat" type="text" class="form-control <?= !empty(session()->getFlashData('errors')['berat']) ? 'is-invalid' : 'valid' ?>">
                            <?php if (!empty(session()->getFlashData('errors')['berat'])) : ?>
                                <div class="invalid-feedback">
                                    <?= session()->getFlashData('errors')['berat'] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Kadaluarsa :</label>
                            <input value="<?= $obat->tanggal_exp ?>" name="tanggal_exp" type="date" class="form-control <?= !empty(session()->getFlashData('errors')['tanggal_exp']) ? 'is-invalid' : 'valid' ?>">
                            <?php if (!empty(session()->getFlashData('errors')['tanggal_exp'])) : ?>
                                <div class="invalid-feedback">
                                    <?= session()->getFlashData('errors')['tanggal_exp'] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="button-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Harga :</label>
                            <input value="<?= $obat->harga ?>" name="harga" type="text" class="form-control <?= !empty(session()->getFlashData('errors')['harga']) ? 'is-invalid' : 'valid' ?>">
                            <?php if (!empty(session()->getFlashData('errors')['harga'])) : ?>
                                <div class="invalid-feedback">
                                    <?= session()->getFlashData('errors')['harga'] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="">Stok :</label>
                            <input value="<?= $obat->stok ?>" name="stok" type="text" class="form-control <?= !empty(session()->getFlashData('errors')['stok']) ? 'is-invalid' : 'valid' ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Kategori Obat :</label>
                            <select name="kategori" class="selectpicker form-control" data-live-search="true">
                                <option value="" selected>Pilih Kategori</option>
                                <option <?= $obat->kategori == 'Vitamin' ? 'selected' : '' ?> value="Vitamin">Vitamin</option>
                                <option <?= $obat->kategori == 'Obat Sakit Kepala' ? 'selected' : '' ?> value="Obat Sakit Kepala"> Obat Sakit Kepala</option>
                                <option <?= $obat->kategori == 'Obat Demam' ? 'selected' : '' ?> value="Obat Demam">Obat Demam</option>
                            </select>
                            <?php if (!empty(session()->getFlashData('errors')['kategori'])) : ?>
                                <div class="invalid-feedback">
                                    <?= session()->getFlashData('errors')['kategori'] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>