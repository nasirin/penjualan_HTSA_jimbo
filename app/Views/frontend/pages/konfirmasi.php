<?= $this->extend('frontend/layout/home'); ?>

<?= $this->section('content'); ?>
<!-- header -->
<?= $this->include('frontend/component/header3'); ?>
<!-- end header -->

<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Konfirmasi Pembayaran</h4>
            <form action="#">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="checkout__input">
                            <p>Bukti pembayaran<span>*</span></p>
                            <input type="text" placeholder="Masukan bukti pembayaran">
                        </div>
                        <div class="checkout__input">
                            <p>Order notes</p>
                            <textarea name="" id="" cols="100" rows="10"></textarea>
                        </div>
                        <p>Terimakasih atas kepercayaan anda kepada kami.</p>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Your Order</h4>
                            <div class="checkout__order__products">Products <span>Total</span></div>
                            <ul>
                                <li>Vegetable’s Package<span>$75.99</span></li>
                                <li>Fresh Vegetable <span>$151.99</span></li>
                                <li>Organic Bananas <span>$53.99</span></li>
                            </ul>
                            <div class="checkout__order__total">Total <span>$750.99</span></div>
                            <button type="submit" class="site-btn">Konfirmasi</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>