<?php
// Content (variables)
$title = get_the_title();
$category = get_the_category( $post->ID );
$category_link = get_category_link( $category[0]->term_id );
$content = wpautop( get_the_content() );
$permalink = get_the_permalink();
$thumb = get_the_post_thumbnail( $post->ID, 'thumbnail' );
$author = get_field('author_name');

if (get_field('date')) {
    $date = get_field('date');
} else {
    $date = get_the_date();
}
?>

<li class="grid-item col-md-4">
    <figure>
        <a href="<?php echo $permalink; ?>"><?php echo $thumb; ?></a>

        <figcaption>
            <small class="post-meta">
                <a class="link link--category" href="<?php echo $category_link; ?>"><?php echo $category[0]->cat_name; ?></a>
                <span> / </span>
                <time datetime="<?php echo $date; ?>"><?php echo $date; ?></time>
                <em class="post-meta__author">door <?php echo $author; ?></em>
            </small>

            <a class="post-title" href="<?php echo $permalink; ?>"><h3><?php echo $title; ?></h3></a>
        </figcaption>

        <div class="post-data">
            <p class="post-data__likes"><?php echo do_shortcode('[dot_recommends]'); ?></p>
            <p class="post-data__comments"><i class="fa fa-comment-o" aria-hidden="true"></i> <?php echo comments_number('0', '1', '%'); ?></p>
        </div>
    </figure>
</li>
