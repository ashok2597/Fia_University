<?php get_header(); ?>  

<?php $heading = "Articles"; ?>
<?php $subheading = "FIA University Articles"; ?>
<?php //include get_template_directory() . '/partials/section-banner-header.php'; ?>

<?php if ( have_posts() ):?>
<?php while ( have_posts() ) : the_post(); ?>
<?php //echo get_the_permalink($post);?>
<?php endwhile;?>
<?php endif; ?>

<?php $latest_post = get_posts(array(
  'posts_per_page' => 1,
  'order' => 'DESC',
  'post_status' => 'publish',
  // 'exclude' => $current_post, 
  ));
?>

<?php //echo get_the_permalink($latest_post[0]);?>
<?php $post = $latest_post[0];?>
<?php $latest_post_id = $post->ID; ?>

<section class="page-section section-banner-header">
  <?php  $latest_post_image = get_the_post_thumbnail_url($latest_post[0]);?>
  
  <?php if($latest_post_image):?>
  <?php $articles_featured_image = $latest_post_image;?>
  <?php else: ?>
    <?php $articles_archive_page = get_page_by_path('/articles');?>
    <?php $articles_featured_image = get_the_post_thumbnail_url($articles_archive_page); ?>
  <?php endif; ?>
  
 
  <div class="container" style="background-image: url('<?php echo $articles_featured_image;?>');">
    
    <?php if($heading && $subheading): ?>
    <?php include get_template_directory() . '/partials/section-header.php'; ?>
    <?php endif; ?>

    <!-- <div class="banner-header__title">
      <h1><?php the_title(); ?></h1>
    </div> -->
  </div>
</section>

<section class="page-section section-content">
  <div class="container">

    <div class="section-content__container">

      <?php if ( have_posts() ) :?>
        <section class="section-related-posts">

        <article class="post-item">
            <a href="<?php echo get_the_permalink($post);?>">
            <?php $post_thumbnail = get_the_post_thumbnail_url(); ?>
            <?php if($post_thumbnail): ?>

              <figure class="post-item__figure" style="background-image: url(<?php echo $post_thumbnail;?>);">
              </figure>
              <?php else:?>
                <figure class="post-item__figure" style="background-image: url(<?php echo $articles_featured_image;?>);">
                  <!-- <div class="post-item__figure-placeholder">
                    <svg class="" width="130"  height="25" viewBox="0 0 130 25">
                      <use xlink:href="#logo-fia-university" />
                    </svg>
                  </div> -->
                </figure>
              <?php endif; ?>

              <figcaption class="post-item__content">
                <?php $post_tags = get_the_tags($post);?>
                <p class="post-item__tags">
                  <span class="post-item__tag post-item__tag--pink">Latest</span>
                  <?php if($post_tags):?>
                  
                      <?php foreach($post_tags as $tag):?>
                        <?php $home_url = get_home_url() ?>
                        <!-- <a href="<?php echo $home_url . "/tag/" . $tag->slug;?>" class="post-item__tag"><?php echo $tag->name;?></a> -->
                        <span class="post-item__tag"><?php echo $tag->name;?></span>
                      <?php endforeach;?>

                      <?php endif?>
                  </p>

                <h3 class="post-item__title"><?php echo get_the_title($post);?></h3>
                <p class="post-item__meta">
                  <time class="post-item__date" datetime="<?php echo get_the_date('d F Y', $post); ?>"><?php echo get_the_date('d F Y', $post); ?></time>
                </p>
                <?php $post_excerpt = wp_trim_words(get_field('subtitle', $post), 20 ,'…');
                ?>
                <?php
                if(!$post_excerpt):
                  $post_excerpt = wp_trim_words(get_the_excerpt($post), 20 ,'…');
                endif;
                ?>
                <p class="post-item__excerpt"><?php echo $post_excerpt;?></p>
                <p>
                  <span class="button">Read more</span>
                </p>
              </figcaption>
            </a>
          </article>

      <?php while ( have_posts() ) : the_post(); ?>
      <?php if($post->ID != $latest_post_id): ?>

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
        
        <?php endif; ?>
        <?php endwhile;?>
      </section>
      <?php else : ?>
        <section>
          <p><?php esc_html_e( 'Sorry, nothing found.' ); ?></p>
        </section>
      <?php endif; ?>

    </div>
    
  </div>
</section>

<?php get_footer(); ?>