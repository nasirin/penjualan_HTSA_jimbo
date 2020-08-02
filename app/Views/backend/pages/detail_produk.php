<?= $this->extend('backend/layout/home'); ?>

<?= $this->section('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Detail Produk | <?= $produk['id_prod']; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"> <a href="/produk">Produk</a></li>
                    <li class="breadcrumb-item active">Detail produk</li>
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
                        <h3 class="d-inline-block d-sm-none"><?= ucwords($produk['nama_department']); ?></h3>
                        <div class="col-12">
                            <img src="/img/produk/<?= $produk['image_produk']; ?>" class="product-image" alt="Product Image">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3"><?= ucwords($produk['nama_produk']); ?></h3>
                        <h6>Deskripsi:</h6>
                        <p><?= ucwords($produk['keterangan_produk']); ?></p>

                        <hr>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <h4>Varian</h4>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-default text-center active">
                                        <input type="radio" name="color_option" id="color_option1" autocomplete="off" checked="">
                                        <?= $produk['varian_produk']; ?>
                                        <br>
                                        <!-- <i class="fas fa-circle fa-2x text-green"></i> -->
                                    </label>
                                </div>
                            </div>
                            <div class="col md-6 col-sm-6 col-xs-6">
                                <h4>Size</h4>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-default text-center">
                                        <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                                        <span class="text-xl"><?= $produk['ukuran_produk']; ?></span>
                                        <br>
                                        ml
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray py-2 px-3 mt-4">
                            <h2 class="mb-0">
                                Rp.<?= $produk['harga_produk']; ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="/produk" class="btn btn-block btn-success">Back To Page</a>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>