<?php
/*
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the main tag.
 */
?>

<!DOCTYPE html>
<!--[if IE 9]>    <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  <title>Betere Gebouwen</title>

  <link rel="canonical" href="<?php echo home_url(); ?>">

  <!-- META TAGS -->
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="description" content="">

  <meta property="og:title" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">

  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Stylesheet -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/app.css">

  <!-- WP_HEAD() -->
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <!-- Header -->
  <header>
    <div class="header__body">
      <a class="link-logo" href="<?php echo home_url(); ?>">
        <img src="<?php echo bloginfo( 'template_directory' ); ?>/img/logo.png">
      </a>

      <nav class="filter">
        <ul>
          <li class="is-active"><a href="<?php echo home_url(); ?>">All articles</a></li>

          <?php
          foreach( get_categories(array('hide_empty' => 0)) as $cat ){
            echo '<li><a href="' . get_category_link($cat->cat_ID) . '">' . $cat->name . '</a></li>';
          }
          ?>
        </ul>
      </nav>
    </div>
  </header>

  <!-- Main content -->
  <main role="main">
