<?php
// Content (variables)
$title = get_the_title();
$category = get_the_category( $post->ID );
$category_link = get_category_link( $category[0]->term_id );
$content = wpautop( get_the_content() );
$permalink = get_the_permalink();
$date = get_the_date();
$thumb = get_the_post_thumbnail( $post->ID, 'large' );

if ($post_count == 0) {
  $post_class = "post--featured s-8 column";
} else if ($post_count == 1) {
  $post_class = "post--featured s-5 column";
} else {
  $post_class = "post--featured s-3 column";
}
?>

<li class="<?php echo $post_class; ?>">
  <figure>
    <?php echo $thumb; ?>
  </figure>

  <div>
    <p><?php echo $date; ?></p>
    <a href="<?php echo $category_link; ?>" class="post-category"><?php echo $category[0]->cat_name; ?></a>
    <a class="post-title" href="<?php echo $permalink; ?>"><h3><?php echo $title; ?></h3></a>
  </div>
</li>