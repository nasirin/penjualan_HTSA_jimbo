<?= $this->extend('backend/layout/home'); ?>

<?= $this->section('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Invoice</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item"> <a href="/pesanan">pesanan</a></li>
                    <li class="breadcrumb-item active">Invoice</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-globe"></i> INVOICE
                                <!-- <small class="float-right">Date: 2/10/2014</small> -->
                            </h4>
                        </div>
                    </div>
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            From
                            <address>
                                <strong>PT. Anugerah Abadi HTSA</strong><br>
                                Jl. Untung Suropati No.12, Bambankerep, Kec. Ngaliyan, Kota Semarang<br>
                                Phone: 0813-2666-8521<br>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <strong><?= $head['nama'] ?></strong><br>
                                <?= $head['alamat'] ?><br>
                                Phone: <?= $head['notelp'] ?><br>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Invoice #<?= $head['id_pes'] ?></b><br>
                            <br>
                            <b>Tanggal Pemesanan:</b> <?= $head['created_at'] ?><br>
                            <b>Account:</b> <?= $head['id_pelanggan'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Qty</th>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Diskon</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($body as $data) : ?>
                                        <tr>
                                            <td><?= $data['qty_pesanan'] ?></td>
                                            <td><?= $data['nama_produk'] ?></td>

                                            <?php if ($data['id_promo']) : ?>
                                                <td><?= 'Rp ' . number_format($data['harga_produk'] - ($data['harga_produk'] * $data['potongan'] / 100), 0, ',', '.') ?></td>
                                            <?php else : ?>
                                                <td><?= 'Rp ' . number_format($data['harga_produk'], 0, ',', '.')  ?></td>
                                            <?php endif; ?>

                                            <td><?= $data['potongan'] . '%' ?></td>

                                            <?php if ($data['id_promo']) : ?>
                                                <td><?= 'Rp ' . number_format($data['qty_pesanan'] * ($data['harga_produk'] - ($data['harga_produk'] * $data['potongan'] / 100)), 0, ',', '.') ?></td>
                                            <?php else : ?>
                                                <td><?= 'Rp ' . number_format($data['qty_pesanan'] * $data['harga_produk'], 0, ',', '.') ?></td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-6">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>Total:</th>
                                        <td>$265.24</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row no-print">
                        <div class="col-12">
                            <a href="/pesanan/print" target="_blank" class="btn btn-default float-right"><i class="fas fa-print"></i> Print</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>