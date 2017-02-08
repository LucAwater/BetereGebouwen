<?php
// Content (variables)
$title = $post_about[0]->post_title;
$category = get_the_category( $post_about[0]->ID );
$category_link = get_category_link( $category[0]->term_id );
$permalink = get_the_permalink();
$date = DateTime::createFromFormat("Y-m-d H:i:s", $post_about[0]->post_date);
$thumb_id = get_post_thumbnail_id();
$thumb = wp_get_attachment_image_src($thumb_id, 'medium', true);
?>

<li class="grid-item grid-item--about col-md-4">
    <figure style="background-image:url(<?php echo $thumb[0]; ?>)">
        <figcaption>
            <h3><?php echo $title; ?></h3>
            <a class="btn text--uppercase" href="<?php echo $permalink; ?>">Ons idee <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
        </figcaption>
    </figure>
</li>