<section class="page-section section-programmes">
  <div class="container">

    <div class="section-programmes__heading">
      <header class="section__header">
        <div>
          <h2>Programmes</h2>
          <p class="toggle">
            <span class="toggle-option active">Current</span>
            <span class="toggle-option">Forthcoming</span>
          </p>
          <!-- <p>Committed to a better future</p> -->    
        </div>
      </header>

      <?php $heading = "About"; ?>
      <?php $subheading = "Committed to a better future"; ?>
      <?php //include get_template_directory() . '/partials/section-header.php'; ?>

    </div>

    <ul class="section-programmes__content">
      <li>
        <figure style="background-image: url('<?php echo get_stylesheet_directory_uri();?>/assets/images/programmes-1.jpeg');"></figure>
        <figcaption>
          <p class="caption banner__caption">Columbia University, USA</p>
          <h3>FIA University Senior Executive Programme</h3>
          <p>The FIA has represented the fast-changing worlds of motorsport and mobility</p>
        </figcaption>
      </li>

      <li>
        <figure style="background-image: url('<?php echo get_stylesheet_directory_uri();?>/assets/images/programmes-2.jpeg');"></figure>
        <figcaption>
          <p class="caption banner__caption">Columbia University, USA</p>
          <h3>FIA University Senior Executive Programme</h3>
          <p>The FIA has represented the fast-changing worlds of motorsport and mobility</p>
        </figcaption>
      </li>

      <li>
        <figure style="background-image: url('<?php echo get_stylesheet_directory_uri();?>/assets/images/programmes-3.jpeg');"></figure>
        <figcaption>
          <p class="caption banner__caption">Esade, Spain</p>
          <h3>FIA Emerging Leaders Programme</h3>
          <p>The FIA has represented the fast-changing worlds of motorsport and mobility</p>
        </figcaption>
      </li>

      <?php get_template_part('partials/section-members-only'); ?>

    </ul>
  </div>
</section>