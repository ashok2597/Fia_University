<section class="page-section site-nav nav">
  <div class="container">

  <div class="site-nav__content">
    <a class="nav__logo" href="/" title="<?php echo get_bloginfo('blog_name') ;?>">
      <svg class="footer__logo" width="130"  height="25" viewBox="0 0 130 25">
        <use xlink:href="#logo-fia-university" />
      </svg>
    </a>

    <?php
      wp_nav_menu( array(
        // 'menu'              => "Header Menu",
        'theme_location'    => "header_menu",
        'menu_class'        => "nav__menu menu",
        'container'         => "", // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
        ) );
    ?>

    <button id="nav-hamburger" class="nav-hamburger" aria-label="Mobile Nav Menu Toggle">
      <svg width="24" height="24" viewBox="0 0 24 24">
        <use xlink:href="#base-icon-menu"></use>
      </svg>
    </button>

    <?php get_template_part('partials/social-icons'); ?>
  </div>

  </div >
</section>