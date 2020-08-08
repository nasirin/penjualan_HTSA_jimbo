<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fas fa-envelope"></i> HTSA@gmail.com</li>
                            <li>08xx-xxxx-xxxx</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fab fa-facebook-square"></i></a>
                            <a href="#"><i class="fab fa-instagram-square"></i></a>
                        </div>
                        <div class="header__top__right__auth">
                            <?php if (session()->get('username')) : ?>
                                <a href="/profil"><i class="fa fa-user"></i> <?= ucwords(session()->get('username')); ?></a>
                            <?php else : ?>
                                <a href="login"><i class="fa fa-user"></i> Login</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="/"><img src="frontend/img/logo.png" alt="LOGO"></a>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero__search mt-3">
                    <div class="hero__search__form">
                        <form action="#">
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="header__cart">
                    <ul>
                        <li><a href="cart"><i class="fa fa-shopping-bag"></i> <span><?= $total_keranjang; ?></span></a></li>
                    </ul>
                    <div class="header__cart__price">item: <span>$150.00</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>