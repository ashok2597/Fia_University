<section class="page-section section-library">
  <div class="container">

    <div class="section-library__heading">
      <?php $heading = "E-library"; ?>
      <?php $subheading = "A learning resource for the FIA members and a repository of the FIA archives"; ?>
      <?php include get_template_directory() . '/partials/section-header.php'; ?>

      <!-- <div class="section-about__logos">
        <a href="https://fiafoundation.com">
          <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/fia-foundation.png" alt="">
          <p>fiafoundation.com</p>
        </a>
        <a href="https://fia.com">
          <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/fia.png" alt="">
          <p>fia.com</p>
        </a>
      </div> -->
    </div>

    <ul class="section-library__content">
      <li>
        <figure style="background-image: url('<?php echo get_stylesheet_directory_uri();?>/assets/images/programmes-1.jpeg');"></figure>
        <figcaption>
          <h3>E-library resource #1</h3>
          <!-- <p class="caption banner__caption">Columbia University, USA</p> -->
          <p>The FIA has represented the fast-changing worlds of motorsport and mobility</p>
          <p>by <strong>author</strong></p>
        </figcaption>
      </li>

      <li>
        <figure style="background-image: url('<?php echo get_stylesheet_directory_uri();?>/assets/images/programmes-2.jpeg');"></figure>
        <figcaption>
          <h3>E-library resource #2</h3>
          <!-- <p class="caption banner__caption">Columbia University, USA</p> -->
          <p>The FIA has represented the fast-changing worlds of motorsport and mobility</p>
          <p>by <strong>author</strong></p>
        </figcaption>
      </li>

      <!-- <li>
        <figure style="background-image: url('<?php echo get_stylesheet_directory_uri();?>/assets/images/programmes-3.jpeg');"></figure>
        <figcaption>
          <p class="caption banner__caption">Esade, Spain</p>
          <h3>FIA Emerging Leaders Programme</h3>
          <p>The FIA has represented the fast-changing worlds of motorsport and mobility</p>
        </figcaption>
      </li> -->

      <?php get_template_part('partials/section-members-only'); ?>

    </ul>


  


  </div>
</section>