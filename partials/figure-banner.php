<figure class="banner__figure" style="background-image: url(<?php echo $image;?>)">
  <?php if($image_caption): ?>
    <figcaption>
      <p><?php echo $image_caption; ?></p>
    </figcaption>
  <?php endif; ?>
</figure>

<article class="banner__content">
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
</article>