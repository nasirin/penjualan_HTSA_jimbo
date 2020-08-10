<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="frontend/#"><img src="frontend/img/logo.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="/cart"><i class="fa fa-shopping-bag"></i> <span><?= session()->get('username') ? $total_keranjang : 0; ?></span></a></li>
        </ul>
        <!-- <div class="header__cart__price">item: <span>$50.00</span></div> -->
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__auth">
            <?php if (session()->get('username')) : ?>
                <a href="/profil"><i class="fa fa-user"></i> <?= ucwords(session()->get('username')); ?></a>
            <?php else : ?>
                <a href="login"><i class="fa fa-user"></i> Login</a>
            <?php endif; ?>
        </div>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> HTSA@gmail.com</li>
            <li>08xx-xxxx-xxxx</li>
        </ul>
    </div>
</div>