<?= $this->extend('frontend/layout/home'); ?>

<?= $this->section('content'); ?>
<!-- header -->
<?= $this->include('frontend/component/header3'); ?>
<!-- end header -->

<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Konfirmasi Pembayaran</h4>
            <form action="#" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="checkout__input">
                            <p>Bukti pembayaran<span>*</span></p>
                            <input type="file" placeholder="Masukan bukti pembayaran" accept="image/png, image/jpeg" name="img">
                        </div>
                        <div class="checkout__input">
                            <p>Order notes</p>
                            <textarea name="note" id="" cols="100" rows="10"></textarea>
                        </div>
                        <p>Terimakasih atas kepercayaan anda kepada kami.</p>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Your Order</h4>
                            <div class="checkout__order__products">Products <span>Total</span></div>
                            <ul>
                                <?php foreach ($pesanan as $data) : ?>
                                    <li><?= $data['nama_produk'] ?><span><?= $data['id_promo'] ? 'Rp ' . number_format($data['harga_produk'] - ($data['harga_produk'] * $data['potongan'] / 100), 0, ',', '.') : 'Rp' . number_format($data['harga_produk'], 0, ',', '.') ?></span></li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="checkout__order__total">Total <span><?= 'Rp ' . number_format($total_pesanan['total_pesanan'], 0, ',', '.') ?></span></div>
                            <button type="submit" class="site-btn">Konfirmasi</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>