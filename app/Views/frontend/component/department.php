<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All departments</span>
                    </div>
                    <ul>
                        <?php foreach ($department as $data) : ?>
                            <li><a href="#"><?= $data['nama_department']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <!-- hero banner -->
            <div class="col-lg-9">
                <div class="hero__item set-bg" data-setbg="frontend/img/hero/banner2.jpg">
                    <div class="hero__text">
                        <!-- <span>FRUIT FRESH</span> -->
                        <h2>CV. Anugerah Abadi <br />HTSA</h2>
                        <p>kami menyediakan berbagai macam kebutuhan <br> kebersihan rumah tangga anda</p>
                        <a href="/detail" class="primary-btn">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>