<section class="page-section section-banner section-banner-slider">
  <div class="container">
    
    <div class="swiper banner-slider">
      <div class="swiper-wrapper">

        <?php $slider = get_field('slider'); ?>
        <?php if($slider): ?>

          <?php foreach($slider as $slide): ?>
            <?php $image = $slide['image'];?>
            <?php //$image_caption = $slide['image_caption'];?>
            <?php $image_caption = "";?>
            <?php $caption = $slide['caption'];?>
            <?php $content = $slide['content']; ?>
            <?php $link = $slide['button_link']; ?>
            <?php $button_label = $slide['button_label']; ?>
            <?php $secondary_button_link = ""; ?>
            <?php $secondary_button_label = ""; ?>

            <div class="swiper-slide">
              <?php include get_template_directory() . '/partials/figure-banner.php'; ?>
            </div>
      
          <?php endforeach; ?>
        <?php endif; ?>

      </div>
    </div>

  </div>
</section>

<script>
  new Swiper('.banner-slider', {
    // Optional parameters
    // direction: 'vertical',
    // modules: [EffectFade],
    speed: 1000,
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