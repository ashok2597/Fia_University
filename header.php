<?php 
  $ua     = htmlentities($_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8');
  $bot    = preg_match('/bot|crawl|slurp|spider|mediapartners/i', $ua);
  $ie     = preg_match('~MSIE|Internet Explorer~i', $ua) || (strpos($ua, 'Trident/7.0; rv:11.0') !== false);
  $safari = strpos($ua, 'Safari') && !strpos($ua, 'Chrome');
  $edge   = strpos($ua, 'Edge');
  $iPod   = stripos($ua,"iPod");
  $iPhone = stripos($ua,"iPhone");
  $iPad   = stripos($ua,"iPad");
  $chrome = preg_match('/(Chrome|CriOS)\//i', $ua)
    && !preg_match('/(Aviator|ChromePlus|coc_|Dragon|Edge|Flock|Iron|Kinza|Maxthon|MxNitro|Nichrome|OPR|Perk|Rockmelt|Seznam|Sleipnir|Spark|UBrowser|Vivaldi|WebExplorer|YaBrowser)/i', $ua);

  // $rootClassList = ['no-grid', 'no-css-var'];
  $rootClassList = [];

  if ($bot) array_push($rootClassList, 'bot');
  if ($iPod || $iPhone || $iPad) array_push($rootClassList, 'ios');
  if ($ie) array_push($rootClassList, 'ie mouse no-grid no-grid-contents no-css-var');
  if ($safari) array_push($rootClassList, 'apple');
  if ($edge) array_push($rootClassList, 'edge');
  if ($chrome) array_push($rootClassList, 'chrome');
  
  $rootClassName = implode(' ', $rootClassList);
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php if ($rootClassName): ?>class="<?php echo $rootClassName; ?>"<?php endif; ?>>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- <link rel='https://api.w.org/' href='<?php //echo get_site_url(); ?>/wp-json/' /> -->

  <!-- Tenon font -->
  <!-- <link rel="stylesheet" href="https://use.typekit.net/nfd8ydl.css"> -->

  <!-- Tenon font -->
  <!-- <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700;800&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Recursive:wght@400;500;700;800&display=swap" rel="stylesheet"> -->

  <!-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" /> -->
    
  <!-- <link rel="apple-touch-icon" sizes="180x180" href="<?php //echo get_template_directory_uri() ?>/assets/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php //echo get_template_directory_uri() ?>/assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php //echo get_template_directory_uri() ?>/assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="<?php //echo get_template_directory_uri() ?>/assets/favicon/site.webmanifest">
  <link rel="mask-icon" href="<?php //echo get_template_directory_uri() ?>/assets/favicon/safari-pinned-tab.svg" color="#db402b">
  <meta name="msapplication-TileColor" content="#db402b">
  <meta name="theme-color" content="#ffffff"> -->

  <?php 
    wp_head();
    global $post;
    global $template;
    $post_slug = $post ? $post->post_name : '';
    $template_name = basename($template);
    
    $queryObject = get_queried_object();

    if (!!$template_name) $template_name = preg_replace('/\.php$/', '', $template_name);
    if (isset($queryObject) && property_exists($queryObject, 'slug')) {
      $queryObject_slug = get_queried_object()->slug;
      $page_name = $queryObject_slug ? $queryObject_slug : 'category';
    } else {
      $page_name = $post_slug;
    }

    if (is_front_page()) $page_name = 'front-page';
    // if (is_shop()) $page_name = 'shop';
    // if (is_search()) $page_name = 'search';
  ?>
<!-- 
<link rel="preload" href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/fonts/AvenirNext/AvenirNext-Regular.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/fonts/AvenirNext/AvenirNext-DemiBold.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/fonts/AvenirNext/AvenirNext-Bold.woff2" as="font" type="font/woff2" crossorigin> -->

<link rel="stylesheet" href="https://use.typekit.net/jvm5lcu.css">

<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
>

<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

<!-- <script src="https://kit.fontawesome.com/29c8d0bb71.js" crossorigin="anonymous"></script> -->

</head>

<body 
  <?php body_class(); ?> 
  data-template="<?php echo $template_name; ?>" 
  data-page="<?php echo $page_name; ?>"
  data-site-title="<?php echo bloginfo('title'); ?>"
  <?php if (isset($queryObject_slug)): ?>data-term="<?php echo $queryObject_slug; ?>"<?php endif; ?>
  id="site-body"
>

<?php include get_template_directory() . '/partials/symbols.php'; ?>

<?php include get_template_directory() . '/partials/nav.php'; ?>