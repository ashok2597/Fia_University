
<?php if($cta_boxes): ?>

<section class="page-section section-cta-boxes">
  <div class="container">
    
    <div class="cta-boxes__container">
      <?php foreach($cta_boxes as $cta_box): ?>
      <div class="cta-box <?php echo $cta_box['color']; ?>">
        <figure class="" style="background-image: url(<?php echo $cta_box['image']; ?>);">
        </figure>
        <figcaption>
          <div class="cta-box__content">
            <?php $tag = $cta_box['tag']; ?>
            <?php if($tag): ?>
              <span class="cta-box__tag">
                <?php echo $tag; ?>
              </span>
            <?php endif; ?>
            <?php echo $cta_box['content']; ?>
            <a href="<?php echo $cta_box['link'] ?>" class="button"><?php echo $cta_box['button_label'] ?></a>
          </div>
        </figcaption>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<?php endif; ?>