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
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item"> <a href="/admin/produk">Produk</a></li>
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
                        <!-- <h6>Deskripsi:</h6> -->
                        <p class="text-justify"><?= ucfirst($produk['keterangan_produk']); ?></p>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-3">
                                <h4>Varian</h4>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <h5><span class="badge badge-pill badge-info"><?= $produk['varian_produk']; ?></span></h5>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-3">
                                <h4>Ukuran</h4>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <h5> <span class="badge badge-pill badge-info"><?= $produk['ukuran_produk']; ?> (ml)</span></h5>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-3">
                                <h4>Quantity</h4> <!-- kalo habis badge-warning-->
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <h5> <span class="badge badge-pill badge-info"><?= $produk['qty_produk']; ?></span></h5>                                    
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-3">
                                <h4>Promo</h4> <!-- kalo habis badge-warning-->
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <h5> <span class="badge badge-pill badge-info"><?= $produk['nama_promo']; ?></span></h5>                                    
                                </div>
                            </div>
                        </div>

                        <div class="bg-info py-2 px-3 mt-4 rounded">
                            <h2 class="mb-0">
                                Rp.<?= number_format($produk['harga_produk'], 0, ',', '.'); ?>
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