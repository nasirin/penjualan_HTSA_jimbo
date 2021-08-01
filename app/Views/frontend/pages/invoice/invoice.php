<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HTSA</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/img/logo 2.png" type="icon">
    <!-- Bootstrap 4 -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/backend/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/backend/dist/css/adminlte.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">

                        <i><img src="/img/logo 2.png" width="50" alt=""></i> Anugerah Abadi HTSA
                        <small class="float-right">Date: <?= date('d F Y') ?></small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong>Anugerah Abadi HTSA </strong><br>
                        Jl Villa Mulawarman Gang II No.3 Semarang<br>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong><?= $pessananHead['nama'] ?></strong><br>
                        <?= $pessananHead['alamat'] ?><br>
                        Phone: <?= $pessananHead['notelp'] ?><br>
                        Email: <?= $pessananHead['email'] ?>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Invoice <?= $pessananHead['id_pesanan'] ?></b><br>
                    <br>
                    <b>Order Date:</b> <?= $pessananHead['created_at'] ?><br>
                    <b>Account:</b> <?= $pessananHead['id_pelanggan'] ?>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Qty</th>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Diskon</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pessananBody as $data) : ?>
                                <tr>
                                    <td><?= $data['qty_pesanan'] ?></td>
                                    <td><?= $data['nama_produk'] ?></td>
                                    <td><?= 'Rp ' . number_format($data['harga_produk'], 0, ',', '.') ?></td>
                                    <td><?= $data['id_promo'] ? 'Rp ' . number_format($data['harga_produk'] * $data['potongan'] / 100, 0, ',', '.') : '' ?></td>
                                    <td><?= $data['id_promo'] ? 'Rp ' . number_format($data['qty_pesanan'] * ($data['harga_produk'] - ($data['harga_produk'] * $data['potongan'] / 100)), 0, ',', '.') : 'Rp ' . number_format($data['qty_pesanan'] * $data['harga_produk'], 0, ',', '.') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                    <!-- <p class="lead">Payment Methods:</p>
                    <img src="/backend/dist/img/credit/visa.png" alt="Visa">
                    <img src="/backend/dist/img/credit/mastercard.png" alt="Mastercard">
                    <img src="/backend/dist/img/credit/american-express.png" alt="American Express">
                    <img src="/backend/dist/img/credit/paypal2.png" alt="Paypal"> -->

                    <!-- <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr
                        jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                    </p> -->
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <p class="lead">Detail Pembayaran</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Total:</th>
                                <td><?= 'Rp ' . number_format($total['total_pesanan'], 0, ',', '.') ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->

    <script type="text/javascript">
        window.addEventListener("load", window.print());
    </script>
</body>

</html>