<?php get_header(); ?>  

<?php $heading = "Articles"; ?>
<?php $subheading = "FIA University Articles"; ?>
<?php include get_template_directory() . '/partials/section-banner-header.php'; ?>

<section class="page-section section-content">
  <div class="container">

    <div class="section-content__container">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <?php if(get_field('subtitle')): ?>
          <p><strong><?php echo get_field('subtitle'); ?></strong></p>
        <?php endif; ?>

        <?php if(get_the_post_thumbnail_url()): ?>
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
        <?php endif; ?>

        <?php the_content(); ?>

        <?php if(get_field('file')): ?>
          <a href="<?php echo get_field('file');?>" class="button">Download</a>
        <?php endif; ?>

      <?php endwhile; else : ?>
        <p><?php esc_html_e( 'Sorry, nothing found.' ); ?></p>
      <?php endif; ?>

    </div>

    <aside class="section-content__aside">
      
      <article class="fixed-card">
        <figure style="background-image: url('<?php echo get_stylesheet_directory_uri();?>/assets/images/scholarship.jpg')"></figure>
        <figcaption>
          <p>Apply for the FIA scholarship for the MSc in Advanced Motorsport Engineering at Cranfield, a leading UK university, and join the world's motorsport engineering family</p>
          <a href="/wp-content/uploads/2022/11/FIAxCranfieldUniversity-english.pdf" class="button">Download brochure</a>
        </figcaption>
      </article>

      <!-- <?php $current_post = $post->ID; ?> -->

        <?php $posts = get_posts(array(
          'posts_per_page' => 3,
          'order' => 'DESC',
          'post_status' => 'publish',
          'exclude' => $current_post, 
          ));
        ?>

        <?php if($posts): ?>

        <section class="section-related-posts">
          <h2>Related</h2>

          <?php foreach($posts as $post): ?>

          <article class="post-item">
            <a href="<?php echo get_the_permalink($post);?>">
            <?php $post_thumbnail = get_the_post_thumbnail_url(); ?>
            <?php if($post_thumbnail): ?>

              <figure class="post-item__figure" style="background-image: url(<?php echo $post_thumbnail;?>);">
              </figure>
              <?php else:?>
                <figure class="post-item__figure">
                  <div class="post-item__figure-placeholder">
                    <svg class="" width="130"  height="25" viewBox="0 0 130 25">
                      <use xlink:href="#logo-fia-university" />
                    </svg>
                  </div>
                </figure>
              <?php endif; ?>

              <figcaption class="post-item__content">
                <?php $post_tags = get_the_tags($post);?>
                  <?php if($post_tags):?>
                    <p class="post-item__tags">
                  
                      <?php foreach($post_tags as $tag):?>
                        <?php $home_url = get_home_url() ?>
                        <!-- <a href="<?php echo $home_url . "/tag/" . $tag->slug;?>" class="post-item__tag"><?php echo $tag->name;?></a> -->
                        <span class="post-item__tag"><?php echo $tag->name;?></span>
                      <?php endforeach;?>

                    </p>
                  <?php endif?>

                <h3 class="post-item__title"><?php echo get_the_title($post);?></h3>
                <p class="post-item__meta">
                  <time class="post-item__date" datetime="<?php echo get_the_date('d F Y', $post); ?>"><?php echo get_the_date('d F Y', $post); ?></time>
                </p>
                <p>
                  <span class="button">Read more</span>
                </p>
              </figcaption>
            </a>
          </article>

        <?php endforeach; ?>
        </section>
        <?php endif; ?>
    </aside>
    
  </div>
</section>

<?php get_footer(); ?>