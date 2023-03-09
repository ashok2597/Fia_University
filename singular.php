<?php get_header(); ?>  

<?php $heading = ""; ?>
<?php $subheading = ""; ?>
<?php include get_template_directory() . '/partials/section-banner-header.php'; ?>

<section class="page-section section-content">
  <div class="container">

    <div class="section-content__container">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <?php the_content(); ?>
        <!-- <a href="/contact" class="button">Express interest</a> -->

      <?php endwhile; else : ?>
        <p><?php esc_html_e( 'Sorry, nothing found.' ); ?></p>
      <?php endif; ?>

    </div>  

    <aside class="section-content__aside">
      <!-- <article>
        <figure style="background-image: url('<?php echo get_stylesheet_directory_uri();?>/assets/images/scholarship.jpg')"></figure>
        <figcaption>
          <p>Apply for the FIA scholarship for the MSc in Advanced Motorsport Engineering at Cranfield, a leading UK university, and join the world's motorsport engineering family</p>
          <a href="/wp-content/uploads/2022/11/FIAxCranfieldUniversity-english.pdf" class="button">Download brochure</a>
        </figcaption>
      </article> -->
    </aside>
    
  </div>
  </section>

<?php get_footer(); ?>