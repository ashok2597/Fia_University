<section class="page-section section-about">
  <div class="container" style="background-image: url('<?php echo get_stylesheet_directory_uri();?>/assets/images/about-background.jpg');">

    <div class="section-about__heading">
      
      <?php $heading = "About"; ?>
      <?php $subheading = "Committed to a better future"; ?>
      <?php include get_template_directory() . '/partials/section-header.php'; ?>

      <div class="section-about__logos">
        <a href="https://fiafoundation.com">
          <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/fia-foundation.png" alt="">
          <p>fiafoundation.com</p>
        </a>
        <a href="https://fia.com">
          <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/fia.png" alt="">
          <p>fia.com</p>
        </a>
      </div>
    </div>

    <ul class="section-about__content">
      <li>
        <h3>For over 100 years,</h3>
        <p>the FIA has represented the fast-changing worlds of motorsport and mobility</p>
      </li>

      <li>
        <h3>224 member organisations</h3>
        <p>represent over 80 million road users from 146 countries</p>
      </li>

      <li>
        <h3>The FIA Innovation Fund (FIF) acts as a catalyst</h3>
        <p>of the purpose driven movement by supporting new and worthwhile project ideas that can generate lasting benefits for the FIA and its global community</p>
      </li>
    </ul>
  </div>
</section>