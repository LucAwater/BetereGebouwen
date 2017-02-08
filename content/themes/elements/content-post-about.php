<?php
// Content (variables)
$title = $post_about[0]->post_title;
$category = get_the_category( $post_about[0]->ID );
$category_link = get_category_link( $category[0]->term_id );
$permalink = get_the_permalink();
$date = DateTime::createFromFormat("Y-m-d H:i:s", $post_about[0]->post_date);
$thumb = get_the_post_thumbnail( $post_about[0]->ID, 'thumbnail' );
?>

<li class="grid-item grid-item--about col-md-4">
    <figure>
        <a href="<?php echo $permalink; ?>"><?php echo $thumb; ?></a>

        <figcaption>
            <small class="post-meta">
                <a class="link link--category" href="<?php echo $category_link; ?>"><?php echo $category[0]->cat_name; ?></a>
                <span> / </span>
                <time datetime="<?php echo $date->format('j F Y'); ?>"><?php echo $date->format('j F Y'); ?></time>
            </small>

            <a href="<?php echo $permalink; ?>"><h3><?php echo $title; ?></h3></a>
        </figcaption>
    </figure>
</li>