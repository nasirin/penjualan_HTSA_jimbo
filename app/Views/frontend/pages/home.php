<?= $this->extend('frontend/layout/home'); ?>

<?= $this->section('content'); ?>
<?= $this->include('frontend/component/header'); ?>
<?= $this->include('frontend/component/promo'); ?>
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Department</h4>
                        <ul>
                            <?php foreach ($department as $data) : ?>
                                <li><a href="#"><?= ucwords($data['nama_department']); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7 border-top">
                <div class="row mt-3">

                    <?php foreach ($produk as $data) : ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/produk/<?= $data['image_produk']; ?>">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="/detail/<?= $data['slug_produk']; ?>"><i class="fa fa-eye"></i></a></li>
                                        <li>
                                            <form action="/tambah/<?= $data['slug_produk']; ?>" method="POST">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" value="<?= session()->get('id'); ?>" name="idPel">
                                                <input type="hidden" value="<?= $data['id_prod']; ?>" name="idProduk">
                                                <input type="hidden" value="<?= $data['id_promo']; ?>" name="promo">
                                                <input type="hidden" value="1" name="qty">
                                                <input type="hidden" value="<?= ($data['id_promo'] != null) ? $data['harga_produk'] - $data['harga_produk'] * $data['potongan'] / 100 :  $data['harga_produk']; ?>" name="total">
                                                <button type="submit"><i class="fa fa-shopping-cart"></i></button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#"><?= ucwords($data['nama_produk']); ?></a></h6>
                                    <?php if ($data['status_promo'] != 'aktif') : ?>
                                        <h5>Rp. <?= number_format($data['harga_produk'], 0, ',', '.'); ?></h5>
                                    <?php else : ?>
                                        <h5>Rp. <?= number_format($data['harga_produk'] - $data['harga_produk'] * $data['potongan'] / 100, 0, ',', '.'); ?></h5>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="product__pagination">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#"><i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>