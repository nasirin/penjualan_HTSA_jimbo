<div class="container">
    <div class="col-lg-12 col-md-7">
        <div class="product__discount">
            <div class="section-title product__discount__title">
                <h4>Promo Diskon %</h4>
            </div>
            <div class="row">
                <div class="product__discount__slider owl-carousel">
                    <?php foreach ($promo as $data) : ?>
                        <div class="col-lg-4">
                            <div class="product__discount__item">
                                <div class="product__discount__item__pic set-bg" data-setbg="img/produk/<?= $data['image_produk']; ?>">
                                    <div class="product__discount__percent"><?= $data['potongan']; ?> %</div>
                                    <ul class="product__item__pic__hover">
                                        <li><a href="/detail/<?= $data['slug_produk']; ?>"><i class="fa fa-eye"></i></a></li>
                                        <li>
                                            <form action="/tambah/<?= $data['slug_produk']; ?>" method="POST">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" value="<?= session()->get('id'); ?>" name="idPel">
                                                <input type="hidden" value="<?= $data['id_prod']; ?>" name="idProduk">
                                                <input type="hidden" value="<?= $data['id_promo']; ?>" name="promo">
                                                <input type="hidden" value="1" name="qty">
                                                <button type="submit"><i class="fa fa-shopping-cart"></i></button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product__discount__item__text">
                                    <span><?= ucwords($data['nama_department']); ?></span>
                                    <h5><a href="/detail/<?= $data['slug_produk']; ?>"><?= ucwords($data['nama_produk']); ?></a></h5>
                                    <div class="product__item__price">Rp. <?= number_format($data['harga_produk'] - $data['harga_produk'] * $data['potongan'] / 100, 0, ',', '.'); ?> <span>Rp. <?= number_format($data['harga_produk'], 0, ',', '.'); ?></span></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>