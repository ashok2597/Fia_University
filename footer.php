<?php wp_footer(); ?>

<footer class="page-section site-footer footer">
  <div class="container">

    <div class="footer__logo">
      <svg class="" width="130"  height="25" viewBox="0 0 130 25">
        <use xlink:href="#logo-fia-university" />
      </svg>
    </div>

    <p class="footer__credits">© <?php echo date('Y') ?> <a href="/"><?php echo get_bloginfo('blog_name'); ?> AIT/FIA All rights reserved</a></p>

    <?php
      wp_nav_menu( array(
        // 'menu'              => "Header Menu",
        'theme_location'    => "footer_links_menu",
        'menu_class'        => "footer__menu menu",
        'container'         => "div", // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
        ) );
    ?>

    <?php get_template_part('partials/social-icons'); ?>

  </div>
</footer>

</body>
</html>