<?php get_header(); ?>  

<?php $image = get_the_post_thumbnail_url();?>
<?php $title = get_the_title(); ?>
<?php $content = ''; ?>
<?php //$link = "/" . $post->slug; ?>
<?php $link = ""; ?>
<?php $button_label = ""; ?>
<?php $secondary_button_link = ""; ?>
  <?php $secondary_button_label = ""; ?>

<?php //include get_template_directory() . '/partials/section-banner-header.php'; ?>

<?php $about_page_repeater = get_field('about_page_repeater'); ?>

<main class="page-main page page-log-in">
  <section class="page-section section-content">
    <div class="container">

      <?php $heading = "Log in"; ?>
      <?php $subheading = "Enter your credentials"; ?>
      <?php include get_template_directory() . '/partials/section-header.php'; ?>

      <div class="section-content__container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>  
        <?php endwhile; else : ?>
          <p><?php esc_html_e( 'Sorry, nothing found.' ); ?></p>
        <?php endif; ?>
      </div>  
      
    </div>
  </section>

  <?php $cta_banner = get_field('cta_banner'); ?>
  <?php if($cta_banner): ?>
    <?php $image = $cta_banner['image'];?>
    <?php $content = $cta_banner['content']; ?>
    <?php $link = $cta_banner['link']; ?>
    <?php $button_label = $cta_banner['button_label']; ?>
    <?php $secondary_button_link = ""; ?>
  <?php $secondary_button_label = ""; ?>
      <?php if($cta_banner['is_visible']): ?>
        <?php include get_template_directory() . '/partials/section-banner-cta.php'; ?>
      <?php endif; ?>
  <?php endif; ?>
</main>


<?php get_footer(); ?>