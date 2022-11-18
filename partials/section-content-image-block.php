
<?php //$about_page = get_page_by_path('about-us'); ?>
<?php //$image = get_the_post_thumbnail_url($about_page); ?>
<?php //$content = $about_page->post_content; ?>

<section class="page-section section-content-image-block">
  <div class="container">

  <figcaption>
    <div class="content-image-block__content">
      <?php echo $content; ?>
      <a href="<?php echo $link; ?>" class="button"><?php echo $button_label; ?></a>
    </div>
  </figcaption>
  <figure style="background-image: url(<?php echo $image; ?>);"></figure>

  </div>
</section>