<?= $this->extend('frontend/layout/home'); ?>

<?= $this->section('content'); ?>
<?= $this->include('frontend/component/header'); ?>
<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large" src="/img/produk/<?= $produk['image_produk']; ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3><?= ucwords($produk['nama_produk']); ?></h3>
                    <?php if ($produk['status_promo'] != 'aktif') : ?>
                        <div class="product__details__price">Rp. <?= number_format($produk['harga_produk'], 0, ',', '.'); ?></div>
                    <?php else : ?>
                        <div class="product__details__price">Rp. <?= number_format($produk['harga_produk'] - $produk['harga_produk'] * $produk['potongan'] / 100, 0, ',', '.'); ?></div>
                    <?php endif; ?>
                    <p><?= ucwords($produk['keterangan_produk']); ?></p>

                    <!-- FORM -->
                    <form action="/tambah/<?= $produk['slug_produk']; ?>" method="POST">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="idProduk" id="idProd" value="<?= $produk['id_prod']; ?>">
                        <input type="hidden" name="idPel" id="idPel" value="<?= session()->get('id'); ?>">
                        <input type="hidden" name="promo" id="idPel" value="<?= $produk['id_promo']; ?>">
                        <input type="hidden" value="<?= ($produk['id_promo'] != null) ? $produk['harga_produk'] - $produk['harga_produk'] * $produk['potongan'] / 100 :  $produk['harga_produk']; ?>" name="total">
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1" name="qty">
                                </div>
                            </div>
                        </div>
                        <a href="#" class="primary-btn">BUY NOW</a>
                        <button class="heart-icon btn rounded-0" type="submit"><span class="fas fa-shopping-cart"></span></button>
                    </form>
                    <!-- END FORM -->

                    <ul>
                        <li><b>Availability</b> <span><?= $produk['qty_produk']; ?> items</span></li>
                        <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                        <li><b>Size</b> <span><?= $produk['ukuran_produk']; ?> ml</span></li>
                        <li><b>Share on</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-whatsapp"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>