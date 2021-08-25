<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <!-- Custom styles for this template-->
    <!-- <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-column">
                Invoice
                <strong><?= tgl_Waktu_indo($transaksi->tanggal_transaksi) ?></strong>


            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h6 class="mb-3">Pelanggan:</h6>
                        <div>
                            <strong>Nama Pelanggan:</strong>
                            <p><?= $transaksi->nama_pembeli ?></p>
                        </div>

                    </div>




                </div>

                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>Item</th>
                                <th class="right">Harga</th>
                                <th class="center">Jumlah</th>
                                <th class="right">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($items_transaksi as $item) : ?>
                                <tr>
                                    <td class="center">1</td>
                                    <td class="left strong"><?= $item->nama ?></td>

                                    <td class="right"><?= format_rupiah($item->harga) ?></td>
                                    <td class="center"><?= $item->jumlah ?></td>
                                    <td class="right"><?= format_rupiah($item->sub_total) ?></td>
                                </tr>
                            <?php endforeach; ?>

                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">

                    </div>

                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>

                                <tr>
                                    <td class="left">
                                        <strong>Total</strong>
                                    </td>
                                    <td class="right">
                                        <strong><?= format_rupiah($transaksi->total_harga) ?></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>