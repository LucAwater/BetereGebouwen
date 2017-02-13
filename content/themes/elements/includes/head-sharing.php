<?php
if (is_single()) {
    $image_id = get_post_thumbnail_id();

    echo '
    <meta property="og:title" content="' . get_the_title() . '">
    <meta property="og:type" content="article">
    <meta property="og:description" content="' . get_field('intro') . '">
    <meta property="og:image" content="' . wp_get_attachment_image_src($image_id, 'hero', true)[0] . '">
    <meta property="og:url" content="' . get_permalink() . '">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@stevensvandijck">
    <meta name="twitter:title" content="' . get_the_title() . '">
    <meta name="twitter:description" content="' . get_field('intro') . '">
    <meta name="twitter:image" content="' . wp_get_attachment_image_src($image_id, 'hero', true)[0] . '">';
}