<?php
get_header();

$posts = new WP_Query( array('posts_per_page' => 10) );

$post_count = 1;

if ($posts->have_posts()) :
    echo '<section>';
        while ($posts->have_posts()) : $posts->the_post();
            if ($post_count == 4) {
                echo '</section><section>';
            }

            if( $post_count < 4) {
                include 'content-post-featured.php';
            } else {
                include 'content-post.php';
            }

            $post_count++;

            wp_reset_postdata();
        endwhile;
    echo '</section>';
else:
  get_template_part( 'content', 'none' );
endif;

get_footer();
?>