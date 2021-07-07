<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="header__logo">
                    <a href="/"><img src="/img/logo.jpg" alt="LOGO" width="100"></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="header__cart">
                    <ul>
                        <li><a href="/cart"><i class="fa fa-shopping-bag"></i> <span><?= session()->get('username') ? $total_keranjang : 0; ?></span></a></li>
                    </ul>
                    <!-- <div class="header__cart__price">item: <span>$150.00</span></div> -->
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>