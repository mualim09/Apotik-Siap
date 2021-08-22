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
            <h6 class="m-0 font-weight-bold text-primary">Pembelian Obat</h6>
        </div>
        <div class="card-body">
            <form action="">
                <div class="row">
                    <div class="col-12 d-flex justify-content-end">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#CartModal">
                            <i class="fas fa-shopping-cart"></i>
                        </button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
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
                                            <td><?= $item->stok ?></td>
                                            <td class="d-flex">
                                                <button data-nama="<?= $item->nama ?>" data-harga="<?= format_rupiah($item->harga) ?>" data-id="<?= $item->id ?>" data-stok="<?= $item->stok ?>" t type="button" class="btn btn-success" data-toggle="modal" data-target="#BeliModal">Beli</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>





            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<div class="modal fade" id="CartModal" tabindex="-1" aria-labelledby="CartModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CartModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="BeliModal" tabindex="-1" aria-labelledby="BeliModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <form method="POST" action="<?= route_to('transaksi.add_to_cart') ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="BeliModalLabel">Beli Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive mt-3">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Obat</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td id="nama-obat">

                                            </td>
                                            <td id="harga-obat">

                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus" data-field="">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </span>
                                                    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="id-obat" type="text">
                    <button type="submit" class="btn btn-primary">Add</button>

                </div>
            </div>

        </form>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $('#BeliModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var nama = button.data('nama')
        var harga = button.data('harga')
        var id = button.data('id')
        var stok = button.data('stok')




        var modal = $(this)
        modal.find('.modal-body #nama-obat').html(nama)
        modal.find('.modal-body #harga-obat').html(harga)
        modal.find('.modal-body #id-obat').val(id)

        console.log(modal.find('.modal-body #quantity'))


    })


    $(document).ready(function() {

        var quantitiy = 0;
        $('.quantity-right-plus').click(function(e) {

            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            $('#quantity').val(quantity + 1);


            // Increment

        });

        $('.quantity-left-minus').click(function(e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            // Increment
            if (quantity > 0) {
                $('#quantity').val(quantity - 1);
            }
        });

    });
</script>
<?= $this->endSection() ?>