<?php get_header(); ?>

<main class="front-page__main">
  
  <?php get_template_part('partials/section-banner-slider'); ?>
  <?php get_template_part('partials/section-about'); ?>
  <?php get_template_part('partials/section-programmes'); ?>
  <?php get_template_part('partials/section-research'); ?>
  <?php get_template_part('partials/section-scholarship'); ?>
  <?php get_template_part('partials/section-library'); ?>
  <?php get_template_part('partials/section-governance'); ?>
  <?php get_template_part('partials/section-contact'); ?>
  
  <?php //$cta_boxes = get_field('cta_boxes'); ?>
  <?php //include get_template_directory() . '/partials/section-cta-boxes.php'; ?>

</main>

<?php get_footer(); ?>