<nav class="nav-page">
    <button class="nav-toggler">
        <span class="container">
            <span class="nav-toggler-label">Dutchtown </span>
            <span class="nav-toggler-bars"><i class="fas fa-bars"></i></span>
        </span>
    </button>

    <section class="nav-main nav-collapse">
        <div class="container">
            <div class="nav-page-home">
                <a href="/">Dutchtown</a>
            </div>

            <ul>
                <li><a href="/news/">News</a></li>
                <li><a href="/calendar/">Calendar</a></li>
                <li><a href="/resources/">Resources</a></li>
                <li><a href="/contact/">Contact</a></li>
                <li><a href="/more/" class="modal-trigger" data-target="navMore">More&hellip;</a></li>
                <li><a href="/search/" class="modal-trigger" data-target="navSearch"><i class="fas fa-search"></i> <span class="sr-nav"">Search</span></a></li>
            </ul>
        </div>
    </section>

    <section class="nav-top-banner nav-collapse">
        <div class="container">
            <ul class="nav-top-left-banner">
                <li><a href="/dt2/">DT2</a></li>
                <li><a href="/cid/">Dutchtown CID</a></li>
                <li><a href="/marquette-park/">Marquette Park</a></li>
                <li><a href="/blocks/">Blocks</a></li>
                <li><a href-="/shop/">Shop</a></li>
            </ul>

            <ul class="nav-top-right-banner">
                <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"><a title="Facebook" target="_blank" rel="noopener" href="https://facebook.com/dutchtownstl"><i class="fab fa-facebook-square"></i> <span class="sr-nav">Facebook</span></a></li>
                <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"><a title="Twitter" target="_blank" rel="noopener" href="https://twitter.com/dutchtownstl"><i class="fab fa-twitter"></i> <span class="sr-nav">Twitter</span></a></li>
                <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"><a title="YouTube" rel="noopener" href="https://www.youtube.com/channel/UCCDNIn7LYXXzpKubjRujXTA"><i class="fab fa-youtube"></i> <span class="sr-nav"> YouTube</span></a></li>
                <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"><a title="Instagram" target="_blank" rel="noopener" href="https://instagram.com/dutchtownstlouis"><i class="fab fa-instagram"></i> <span class="sr-nav">Instagram</span></a></li>
                <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"><a title="Translate" data-toggle="modal" data-target="navTranslate" href="/translate/" class="modal-trigger" data-target="navTranslate"><i class="fas fa-globe-asia"></i> Translate</a></li>
            </ul>
        </div>
    </section>

    <?php
        if ( get_current_blog_id() !== 1  && have_rows( 'subsite_menu_item', 'option' ) ) :
    ?>
    <section class="nav-subsite nav-collapse">
        <div class="container">
            <ul>
                <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement">
                    <a href="<?php bloginfo( 'url' ); ?>">
                        <?php bloginfo( 'name' ); ?>
                    </a>
                </li>
    <?php
            while( have_rows( 'subsite_menu_item', 'option' ) ) :
                the_row();
    ?>
                <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement">
                    <a href="<?php the_sub_field( 'subsite_menu_item_link', 'option' ); ?>">
                        <?php the_sub_field( 'subsite_menu_item_label', 'option' ); ?>
                    </a>
                </li>
    <?php
            endwhile;
    ?>
            </ul>
        </div>
    </section>
    <?php
        endif;
    ?>
    <section class="nav-close nav-collapse">
        <div class="container">
            <button class="nav-toggler nav-toggler-close">
                <span class="nav-toggler-label">Close Menu </span>
                <span class="nav-toggler-bars"><i class="fas fa-bars"></i></span>
            </button>
        </div>
    </section>
</nav>