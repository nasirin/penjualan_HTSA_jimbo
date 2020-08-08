<?= $this->extend('frontend/layout/home'); ?>

<?= $this->section('content'); ?>
<?= $this->include('frontend/component/header2'); ?>
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
                    <form action="/tambah/<?= $produk['slug_produk']; ?>" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="idProduk" id="idProd" value="<?= $produk['id_prod']; ?>">
                        <input type="hidden" name="idPel" id="idProd" value="<?= session()->get('id'); ?>">
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1" name="qty">
                                </div>
                                <div class="mt-2">
                                    <select name="varian" id="" class="rounded-0 w-100 bg-light" required>
                                        <option value="">Pilih Varian</option>
                                        <?php foreach ($varian as $data) : ?>
                                            <option value="<?= $data['varian_produk']; ?>"><?= $data['varian_produk']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
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
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Related Product</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="/frontend/img/product/product-1.jpg">
                        <ul class="product__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="/frontend/img/product/product-2.jpg">
                        <ul class="product__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="/frontend/img/product/product-3.jpg">
                        <ul class="product__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="/frontend/img/product/product-7.jpg">
                        <ul class="product__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Related Product Section End -->
<?= $this->endSection(); ?>