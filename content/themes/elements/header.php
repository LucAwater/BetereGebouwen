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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Stylesheet -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,800" rel="stylesheet">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/app.css">

    <!-- WP_HEAD() -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- Header -->
    <header class="header">
        <div class="header__body">
            <a class="link-logo" href="<?php echo home_url(); ?>">
                <img src="<?php echo bloginfo( 'template_directory' ); ?>/img/logo_payoff.svg">
            </a>

            <nav class="filter">
                <ul>
                <?php
                $nav = array(
                    'theme_location'  => 'menu_primary',
                    'container'       => '',
                    'items_wrap'      => '%3$s'
                );
                wp_nav_menu( $nav );
                ?>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main content -->
    <main role="main">
