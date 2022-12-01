<?php get_header(); ?>  

<main class="single__main single-research__main">

  <?php $heading = "Research"; ?>
  <?php $subheading = "All about FIA Research"; ?>
  <?php include get_template_directory() . '/partials/section-banner-header.php'; ?>
  
  <section class="page-section section-content">
    <div class="container">

      <div class="section-content__container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <?php the_content(); ?>
          <a href="/contact" class="button">Express interest</a>
        <?php endwhile; else : ?>
          <p><?php esc_html_e( 'Sorry, nothing found.' ); ?></p>
        <?php endif; ?>
      </div>

      <aside class="section-content__aside">
        <article>
          <figure style="background-image: url('<?php echo get_stylesheet_directory_uri();?>/assets/images/scholarship.jpg')"></figure>
          <figcaption>
            <p>Apply for the FIA scholarship for the MSc in Advanced Motorsport Engineering at Cranfield, a leading UK university, and join the world's motorsport engineering family</p>
            <a href="/wp-content/uploads/2022/11/FIAxCranfieldUniversity-english.pdf" class="button">Download brochure</a>
          </figcaption>
        </article>
      </aside>
      
    </div>
  </section>

  <section class="page-section section-content section-content__more">
    <div class="container">
      <h2 class="content__more-title" >See more</h2>

      <?php $research_slider = get_posts(array(
        'posts_per_page' => -1,
        'post_type' => 'research',
        'order' => 'DESC',
        'orderby' => 'menu_order',
        'post_status' => 'publish',
        ));
      ?>

      <?php if($research_slider): ?>
        <div class="content__more-items">
          <?php foreach($research_slider as $slide): ?>

            <?php $image = get_the_post_thumbnail_url($slide);?>
            <?php $image_caption = "";?>
            <?php $caption = "Research";?>
            <?php //$title = get_the_title($slide); ?>
            <?php $content = get_field('homepage_block', $slide); ?>
            <?php $link = get_the_permalink($slide); ?>
            <?php $button_label = "Read more"; ?>
            <?php $secondary_button_link = ""; ?>
            <?php $secondary_button_label = ""; ?>

            <div class="more__item">

              <figure class="banner__figure" style="background-image: url(<?php echo $image;?>)">
                <figcaption class="banner__content">
                  <div>
                    <p class="caption banner__caption"><?php echo $caption; ?></p>
                    <?php if($content): ?>
                      <?php echo $content; ?>
                    <?php endif; ?>

                    <?php if($link && $button_label): ?>
                      <!-- <div class="banner__button-wrapper" > -->
                        <a class="button" href="<?php echo $link; ?>"><?php echo $button_label; ?></a>
                        <!-- <?php //if($secondary_button_link && $secondary_button_label): ?> -->
                        <!-- <a class="button button-secondary" href="<?php echo $secondary_button_link; ?>"><?php echo $secondary_button_label; ?></a> -->
                        <!-- <?php //endif; ?> -->
                      <!-- </div> -->
                    <?php endif; ?>
                  </div>
                </figcaption>
              </figure>

            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

    </div>
  </section>

</main>

<?php get_footer(); ?>