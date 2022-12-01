<section class="page-section section-programmes">
  <div class="container">

    <div class="section-programmes__heading">
      <!-- <header class="section-header">
        <div>
          <h2>Programmes</h2>
          <p class="toggle">
            <span class="toggle-option active">Current</span>
            <span class="toggle-option">Forthcoming</span>
          </p>
        </div>
      </header> -->

      <?php $heading = "Education Programmes"; ?>
      <?php $subheading = "FIA University Education Programmes"; ?>
      <?php include get_template_directory() . '/partials/section-header.php'; ?>

    </div>

    <ul class="section-programmes__content">
      <li>
        <figure style="background-image: url('<?php echo get_stylesheet_directory_uri();?>/assets/images/columbia.jpg');"></figure>
        <figcaption>
          <p class="caption banner__caption">Columbia University, USA</p>
          <h3>FIA University Senior Executive Programme</h3>
          <p>Available annually, Fall</p>
          <p>Collaborating with one of the World’s Leading Institutions, FIA University has enjoyed a mutually beneficial relationship with Columbia University dating back over a decade. The immersive nature of the Senior Executive Programme, where leading managerial figures from across the FIA Federation converge upon New York each Fall, supports and develops the organisation’s foremost strategic decision makers and is consistently rated as amongst the best experiences for CEOs and similar senior management figures across the FIA family.</p>
        </figcaption>
      </li>

      <li>
        <figure style="background-image: url('<?php echo get_stylesheet_directory_uri();?>/assets/images/esade-2.jpg');"></figure>
        <figcaption>
          <p class="caption banner__caption">ESADE Business School, Spain</p>
          <h3>FIA EMERGING LEADERS PROGRAMME</h3>
          <p>Available annually, Sp</p>
          <p>Developing the next generation of global leaders is a key priority of the FIA University and its collaboration with Esade, recently ranked by the Financial Times newspaper as amongst the Top 5 Business Schools for Executive Education in the world, is central to achieving this. The formation of Communities of Practice, in which key personnel share ideas and adopt innovative solutions to stubborn challenges, is just one outcome of a profitable and affirming experience for members from many parts of the world who participate in this annual programme.</p>
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