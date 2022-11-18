<section class="page-section section-banner section-research">
  <div class="container">

    <?php $heading = "Research"; ?>
    <?php $subheading = "All about FIA Research"; ?>
    <?php include get_template_directory() . '/partials/section-header.php'; ?>
    
    <div class="swiper research-slider">
      <div class="swiper-wrapper">

      <?php $research_slider = get_posts(array(
        'posts_per_page' => -1,
        'post_type' => 'research',
        'order' => 'DESC',
        // 'category_name' => 'vets',
        'orderby' => 'menu_order',
        'post_status' => 'publish',
        ));
      ?>

        <?php //$slider = get_field('slider'); ?>
        <?php if($research_slider): ?>
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
            <div class="swiper-slide">
              <?php include get_template_directory() . '/partials/figure-banner.php'; ?>
            </div>
      
          <?php endforeach; ?>
        <?php endif; ?>

        <!-- TODO: If only one slide don't make it a slider -->

      </div>
    </div>

  </div>
</section>

<script>
  new Swiper('.research-slider', {
    // Optional parameters
    // direction: 'vertical',
    // modules: [EffectFade],
    speed: 650,
    effect: 'fade',
    fadeEffect: {
      crossFade: true
    },
    loop: true,
    autoplay: {
      // delay: 5000,
      delay: 2500,
      disableOnInteraction: false,
    },
  
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