<?php
// Content (variables)
$title = get_the_title();
$category = get_the_category( $post->ID );
$category_link = get_category_link( $category[0]->term_id );
$intro = get_field('intro');
$permalink = get_the_permalink();
$thumb_id = get_post_thumbnail_id();
$thumb = wp_get_attachment_image_src($thumb_id, 'hero', true);
$thumb_url = $thumb[0];
$thumb_alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true);

if (get_field('date')) {
    $date = get_field('date');
} else {
    $date = get_the_date();
}
?>

<li class="post--featured col-md-12">
    <figure>
        <img src="<?php echo $thumb_url; ?>" alt="<?php echo $thumb_alt ?>" />
    </figure>

    <div class="col-md-6 col-lg-5">
        <a href="<?php echo $permalink; ?>">
            <small class="post-meta">
                <p class="post-meta__category link link--category"><?php echo $category[0]->cat_name; ?></p>
                <span class="post-meta__seperator"> / </span>
                <time class="post-meta__date" datetime="<?php echo $date; ?>"><?php echo $date; ?></time>
            </small>

            <h2 class="post-title"><?php echo $title; ?></h2>

            <?php
            if (strlen($intro) > 200) {
                echo substr($intro, 0, 200);
            } else {
                echo $intro;
            }
            ?>

            <div class="post-data">
                <p class="post-data__comments"><i class="fa fa-comment-o" aria-hidden="true"></i> <?php echo comments_number('', '1', '%'); ?></p>
                <p class="post-data__arrow"><i class="fa fa-arrow-right" aria-hidden="true"></i></p>
            </div>
        </a>
    </div>
</li>