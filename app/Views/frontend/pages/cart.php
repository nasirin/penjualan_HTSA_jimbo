<?= $this->extend('frontend/layout/home'); ?>
<?= $this->section('content'); ?>
<?= $this->include('frontend/component/header'); ?>

<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($keranjang) : ?>
                                <?php foreach ($keranjang as $data) : ?>
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img src="/img/produk/<?= $data['image_produk']; ?>" alt="" width="80px">
                                            <h5><?= ucwords($data['nama_produk']); ?></h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            Rp. <?= number_format($data['subtotal_keranjang'], 0, ',', '.'); ?>
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <?= $data['qty_keranjang']; ?>
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <form action="/hapus/<?= $data['id_detail_keranjang']; ?>" method="POST">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="idker" value="<?= $data['id_ker'] ?>">
                                                <button class="btn" type="submit"> <span class="icon_close"></span></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="5" class="text-muted">Keranjang Kosong</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- metode pembayaran -->
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Metode Pembayaran</h5>
                        <p>A/N PT.Anugerah Abadi HTSA</p>
                        <table class="table table-borderless">
                            <tr>
                                <th>BNI</th>
                                <td>012282302</td>
                            </tr>
                            <tr>
                                <th>BRI</th>
                                <td>012282302</td>
                            </tr>
                            <tr>
                                <th>BCA</th>
                                <td>012282302</td>
                            </tr>
                        </table>
                        <p class="text-muted">Mohon lakukan konfirmasi setelah membayar pesanan anda</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <?php if ($keranjang) : ?>
                        <ul>
                            <li>Total <span>Rp. <?= number_format($subtotal['subtotal_keranjang'], 0, ',', '.'); ?></span></li>
                        </ul>
                        <form action="/checkout" method="POST">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="idPel" value="<?= session()->get('id'); ?>">
                            <input type="hidden" name="totalBayar" value="<?= $subtotal['subtotal_keranjang']; ?>">
                            <?php foreach ($keranjang as $data) : ?>
                                <input type="hidden" name="idKeranjang" value="<?= $data['id_keranjang']; ?>">
                                <input type="hidden" name="idProduk[]" value="<?= $data['id_produk'] ?>">
                                <input type="hidden" name="idPromo[]" value="<?= $data['id_promo'] ?>">
                                <input type="hidden" name="qty[]" value="<?= $data['qty_keranjang'] ?>">

                            <?php endforeach; ?>

                            <button type="submit" class="btn btn-success btn-block rounded-0">PROCEED TO CHECKOUT</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>