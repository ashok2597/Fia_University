<section class="page-section section-banner section-scholarship">
  <div class="container">

    <?php $heading = "Global Talent Search"; ?>
    <?php $subheading = "Become a motorsport engineer"; ?>
    <?php include get_template_directory() . '/partials/section-header.php'; ?>

            <?php $image = get_stylesheet_directory_uri()."/assets/images/scholarship.jpg";?>
            <?php $image_caption = "";?>
            <?php $caption = "FIA Engineering Scholarship";?>
            <?php //$title = get_the_title($slide); ?>
            <?php $content = get_field('scholarship_content'); ?>
            <?php $link = "https://www.cranfield.ac.uk/" ?>
            <?php $button_label = "Apply now"; ?>
            <?php $secondary_button_link = ""; ?>
            <?php $secondary_button_label = ""; ?>
            <div class="swiper-slide">
              <?php include get_template_directory() . '/partials/figure-banner.php'; ?>
            </div>

      </div>
    </div>

  </div>
</section>