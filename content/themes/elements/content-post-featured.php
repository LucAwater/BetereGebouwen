<?php
// Content (variables)
$title = get_the_title();
$category = get_the_category( $post->ID );
$category_link = get_category_link( $category[0]->term_id );
$intro = get_field('intro');
$permalink = get_the_permalink();
$date = get_the_date();
$thumb_id = get_post_thumbnail_id();
$thumb = wp_get_attachment_image_src($thumb_id, 'hero', true);
$thumb_url = $thumb[0];
$thumb_alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true);


?>

<li class="post--featured col-md-12">
    <figure>
        <img src="<?php echo $thumb_url; ?>" alt="<?php echo $thumb_alt ?>" />
    </figure>

    <div class="col-md-5">
        <small class="post-meta">
            <a class="link link--category" href="<?php echo $category_link; ?>"><?php echo $category[0]->cat_name; ?></a>
            <span> / </span>
            <time datetime="<?php echo $date; ?>"><?php echo $date; ?></time>
        </small>

        <a class="post-title" href="<?php echo $permalink; ?>"><h2><?php echo $title; ?></h2></a>

        <?php
        if (strlen($intro) > 200) {
            echo substr($intro, 0, 200);
        } else {
            echo $intro;
        }
        ?>

        <div class="post-data">
            <p class="post-data__likes"><i class="fa fa-heart-o" aria-hidden="true"></i></p>
            <p class="post-data__comments"><i class="fa fa-comment-o" aria-hidden="true"></i> <?php echo comments_number('', '1', '%'); ?></p>
            <p class="post-data__arrow"><i class="fa fa-arrow-right" aria-hidden="true"></i></p>
        </div>
    </div>
</li>