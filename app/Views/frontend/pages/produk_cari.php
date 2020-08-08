<?= $this->extend('frontend/layout/home'); ?>

<?= $this->section('content'); ?>
<?= $this->include('frontend/component/header'); ?>
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
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <h6><span>Short By: </span> Department</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><span>16</span> Products found</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">

                    <?php foreach ($produk as $data) : ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/produk/<?= $data['image_produk']; ?>">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="/detail"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="/cart"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#"><?= $data['nama_produk']; ?></a></h6>
                                    <h5>Rp. <?= $data['harga_produk']; ?></h5>
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