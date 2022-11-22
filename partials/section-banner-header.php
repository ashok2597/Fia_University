<section class="page-section section-banner-header">
  <div class="container" style="background-image: url('<?php echo get_the_post_thumbnail_url();?>');">
    <?php $heading = "Research"; ?>
    <?php $subheading = "All about FIA Research"; ?>
    <?php include get_template_directory() . '/partials/section-header.php'; ?>

    <div class="banner-header__title">
      <h1><?php the_title(); ?></h1>
    </div>
  </div>
</section>