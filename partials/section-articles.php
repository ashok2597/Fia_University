<section class="page-section section-articles">
  <div class="container">

  <?php $heading = "Articles"; ?>
  <?php $subheading = "FIA University Articles"; ?>
  <?php include get_template_directory() . '/partials/section-header.php'; ?>

  <section class="swiper section-related-posts">
    <div class="swiper-wrapper">

  <?php $latest_posts = get_posts(array(
  'posts_per_page' => 6,
  'order' => 'DESC',
  'post_status' => 'publish',
  // 'exclude' => $current_post, 
  ));
?>

<?php foreach($latest_posts as $post): ?>

  <article class="post-item swiper-slide">
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

<?php endforeach;?>

  </div>
</section>

<a href="/articles" class="button">See all Articles</a>

</div>
</section>

<script>
  new Swiper('.section-related-posts', {
    // Optional parameters
    // direction: 'vertical',
    // modules: [EffectFade],
    centeredSlides: true,
    slidesPerView: 1,
    spaceBetween: 16,
    // speed: 1000,
    // effect: 'fade',
    // fadeEffect: {
    //   crossFade: true
    // },
    loop: true,
    autoplay: {
      // delay: 5000,
      delay: 2500,
      disableOnInteraction: false,
    },

    breakpoints: {
    // when window width is >= 320px
    // 320: {
    //   slidesPerView: 2,
    //   spaceBetween: 20
    // },
    // // when window width is >= 480px
    // 480: {
    //   slidesPerView: 3,
    //   spaceBetween: 30
    // },
    // when window width is >= 640px
    640: {
      slidesPerView: 3,
      // spaceBetween: 40
    }
  }
  
    // If we need pagination
    // pagination: {
    //   el: '.swiper-pagination',
    // },
  
    // Navigation arrows
    // navigation: {
    //   nextEl: '.swiper-button-next',
    //   prevEl: '.swiper-button-prev',
    // },
  
    // And if we need scrollbar
    // scrollbar: {
    //   el: '.swiper-scrollbar',
    // },
  });
</script>