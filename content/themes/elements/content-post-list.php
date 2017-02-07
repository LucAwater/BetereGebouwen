<?php
// Content (variables)
$title = get_the_title();
$category = get_the_category( $post->ID );
$category_link = get_category_link( $category[0]->term_id );
$content = wpautop( get_the_content() );
$permalink = get_the_permalink();
$date = get_the_date();
$thumb = get_the_post_thumbnail( $post->ID, 'thumbnail' );
?>

<li class="post">
    <div class="media media--align-top">
        <div class="media__image">
            <a href="<?php echo $permalink; ?>"><?php echo $thumb; ?></a>
        </div>

        <div class="media__body">
            <small class="post-meta"><a class="link link--category" href="<?php echo $category_link; ?>"><?php echo $category[0]->cat_name; ?></a> / <time datetime="<?php echo $date; ?>"><?php echo $date; ?></time></small>
            <a class="post__title" href="<?php echo $permalink; ?>"><h3><?php echo $title; ?></h3></a>
        </div>
    </div>
</li>