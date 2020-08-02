<?= $this->extend('backend/layout/home'); ?>

<?= $this->section('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Detail Pesanan | <?= $pesanan['id_pes']; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"> <a href="/pesanan">pesanan</a></li>
                    <li class="breadcrumb-item active">Detail pesanan</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="col-12">
                            <img src="/img/produk/<?= $pesanan['image_produk']; ?>" class="product-image" alt="Product Image">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">Detail Pesanan</h3>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th colspan="2">Nama Pelangan</th>
                                    <td>Sulastri</td>
                                </tr>
                                <tr>
                                    <th colspan="2"> Total Pembayaran</th>
                                    <td>Rp.30.000</td>
                                </tr>
                                <tr>
                                    <th colspan="2">Produks</th>
                                </tr>
                                <tr>
                                    <td>produk 1</td>
                                    <td>2x</td>
                                    <td>Rp.10.000</td>
                                </tr>
                                <tr>
                                    <td>produk 1</td>
                                    <td>2x</td>
                                    <td>Rp.10.000</td>
                                </tr>
                                <tr>
                                    <td>produk 1</td>
                                    <td>2x</td>
                                    <td>Rp.10.000</td>
                                </tr>                             
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="/pesanan" class="btn btn-block btn-success">Konfirmasi</a>
                <a href="/pesanan" class="btn btn-block btn-secondary">Back To Page</a>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>