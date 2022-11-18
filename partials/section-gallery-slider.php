<section class="page-section section-gallery-slider">
  <div class="container">

    <div class="gallery-slider__wrapper">

      <div class="gallery-slider__content">
        <h2>Explore <strong>our hospital</strong></h2>
        <?php $front_page_gallery = get_field('front_page_gallery');?>
        <?php if($front_page_gallery): ?>
          <div class="swiper gallery-slider">
            <div class="swiper-wrapper">
  
            <?php foreach($front_page_gallery as $gallery_item): ?>
              <figure class="swiper-slide" style="background-image: url(<?php echo $gallery_item['url'];?>)">
                <img src="<?php echo $gallery_item['url'];?>" alt="<?php echo $gallery_item['alt'];?>">
              </figure>
            <?php endforeach; ?>
  
            </div>
            <div class="swiper-pagination"></div>
          </div>
        <?php endif; ?>
      </div>
      <aside class="gallery-slider__aside">
        <a href="https://www.shophumm.com/ie/store/veterinary-specialists-ireland/">
          <figure style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/assets/images/humm.jpg);"></figure>
        </a>
      </aside>

    </div>
    
  </div>
</section>