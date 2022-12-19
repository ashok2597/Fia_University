<section class="page-section section-governance">
  <div class="container">

    <div class="section-governance__heading">
      <?php $heading = "Governance"; ?>
      <?php $subheading = "Who makes the FIA University"; ?>
      <?php include get_template_directory() . '/partials/section-header.php'; ?>
    </div>

    <?php $governance_team = get_posts(array(
      'posts_per_page' => -1,
      'post_type' => 'team',
      'order' => 'DESC',
      'category_name' => 'board',
      'orderby' => 'menu_order',
      'post_status' => 'publish',
      ));
    ?>

    <div class="section-governance__content">

      <?php if($governance_team): ?>

      <h3>FIA University Board 2022–2025</h3>
      <p>Elected at the 03 February 2022 WCAMT meeting</p>

      <ul class="section-governance__content-list">
        <?php foreach($governance_team as $member): ?>

        <li>
            <div>
              <?php $member_categories = get_the_category($member); ?>
              <?php //print_r($member_categories); ?>
              <?php //foreach($member_categories as $member_category): ?>
                <?php //echo $member_category['name']; ?>
                <?php //endforeach; ?>
                <div class="governance__content-list-item-wrapper">
                  
                  <!-- <?php if($member_categories): ?>
                    <p class="caption banner__caption"><?php echo $member_categories[0]->cat_name; ?></p>
                  <?php endif; ?> -->
                <h4><?php echo get_the_title($member) ?></h4>
                <?php echo get_post_field('post_content', $member); ?>
                <!-- <p>The FIA has represented the fast-changing worlds of motorsport and mobility</p> -->
                
                </div>
            </div>
        </li>
        <?php endforeach; ?>

      </ul>

      <?php endif; ?>

      <?php $scientific_team = get_posts(array(
      'posts_per_page' => -1,
      'post_type' => 'team',
      'order' => 'DESC',
      'category_name' => 'scientific-panel',
      'orderby' => 'menu_order',
      'post_status' => 'publish',
      ));
    ?>

      <?php if($scientific_team): ?>

      <h3>Scientific Panel</h3>

      <ul class="section-governance__content-list">
      <?php foreach($scientific_team as $member): ?>

      <li>
          <div>
            <?php $member_categories = get_the_category($member); ?>
            <?php //print_r($member_categories); ?>
            <?php //foreach($member_categories as $member_category): ?>
              <?php //echo $member_category['name']; ?>
              <?php //endforeach; ?>
              <div class="governance__content-list-item-wrapper">
                
                <!-- <?php if($member_categories): ?>
                  <p class="caption banner__caption"><?php echo $member_categories[0]->cat_name; ?></p>
                <?php endif; ?> -->
              <h4><?php echo get_the_title($member) ?></h4>
              <?php echo get_post_field('post_content', $member); ?>
              <!-- <p>The FIA has represented the fast-changing worlds of motorsport and mobility</p> -->
              
              </div>
          </div>
      </li>
      <?php endforeach; ?>

      </ul>

      <?php endif; ?>

    </div>

  </div>
</section>