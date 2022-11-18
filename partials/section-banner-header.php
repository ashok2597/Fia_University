<section class="page-section section-banner-header">
  <div class="container">
    <?php if(empty($image)): ?>
      <?php $image = "/wp-content/uploads/2022/10/IMG_6983-1024x768-1.jpeg"; ?>
    <?php endif; ?>
    <?php include get_template_directory() . '/partials/figure-banner.php'; ?>
  </div>
</section>