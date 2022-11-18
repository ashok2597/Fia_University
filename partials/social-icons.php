<?php 
  // $linkedin = get_field('linkedin', 'option');
  $facebook = get_field('facebook', 'option');
  $instagram = get_field('instagram', 'option');
  $twitter = get_field('twitter', 'option');
  $linkedin = get_field('linkedin', 'option');
  $youtube = get_field('youtube', 'option');
?>

<?php if($facebook || $instagram || $twitter): ?>
  <ul class="social-icons" >

  <?php if($facebook): ?>
    <li>
      <a  href="<?php echo $facebook; ?>" title="<?php echo get_bloginfo('name');?> Facebook" target="_blank" rel="">
        <svg width="24" height="25" viewBox="0 0 24 25"><use xlink:href="#logo-facebook" /></svg>
      </a>
    </li>
  <?php endif; ?>

  <?php if($instagram): ?>
    <li>
      <a  href="<?php echo $instagram; ?>" title="<?php echo get_bloginfo('name');?> Instagram" target="_blank" rel="">
        <svg width="24" height="25" viewBox="0 0 24 25"><use xlink:href="#logo-instagram" /></svg>
      </a>
    </li>
  <?php endif; ?>

  <?php if($twitter): ?>
    <li>
      <a  href="<?php echo $twitter; ?>" title="<?php echo get_bloginfo('name');?> Twitter" target="_blank" rel="">
        <svg width="24" height="25" viewBox="0 0 24 25"><use xlink:href="#logo-twitter" /></svg>
      </a>
    </li>
  <?php endif; ?>

  <?php if($linkedin): ?>
    <li>
      <a  href="<?php echo $linkedin; ?>" title="<?php echo get_bloginfo('name');?> LinkedIn" target="_blank" rel="">
        <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#logo-linkedin" /></svg>
      </a>
    </li>
  <?php endif; ?>

  <?php if($youtube): ?>
    <li>
      <a  href="<?php echo $youtube; ?>" title="<?php echo get_bloginfo('name');?> Youtube" target="_blank" rel="">
        <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#logo-youtube" /></svg>
      </a>
    </li>
  <?php endif; ?>

  </ul>
<?php endif; ?>