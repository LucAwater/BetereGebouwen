<?php
// Content (variables)
$title = get_the_title();
$category = get_the_category( $post->ID );
$category_link = get_category_link( $category[0]->term_id );
$content = wpautop( get_the_content() );
$permalink = get_the_permalink();
$date = get_the_date();
$thumb_id = get_post_thumbnail_id();
$thumb = wp_get_attachment_image_src($thumb_id, 'medium', true);

if ($post_count == 1) {
    $post_class = "post--featured col-md-12";
} else {
    $post_class = "post--featured col-md-4";
}
?>

<li class="<?php echo $post_class; ?>">
    <figure>
        <img src="<?php echo $thumb[0]; ?>" alt="" />
    </figure>

    <div>
        <p><?php echo $date; ?></p>
        <a href="<?php echo $category_link; ?>" class="post-category"><?php echo $category[0]->cat_name; ?></a>
        <a class="post-title" href="<?php echo $permalink; ?>"><h2><?php echo $title; ?></h2></a>
    </div>
</li>