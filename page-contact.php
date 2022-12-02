<?php get_header(); ?>  

<main class="page__main page-contact__main">
  <section class="page-section section-content">
    <div class="container">

      <?php $heading = "Contact"; ?>
      <?php $subheading = "Get in touch with Professor David Hassan"; ?>
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
  
</main>


<?php get_footer(); ?>