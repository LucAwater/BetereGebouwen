<?php
get_header();

$query_list = new WP_Query( array( 'posts_per_page' => 3, 'offset' => 3 ) );

if( $query_list->have_posts() ):
  echo '<section class="list">';
    while( $query_list->have_posts() ): $query_list->the_post();
      include 'content-post.php';

      wp_reset_postdata();
    endwhile;
  echo '</section>';
else:
  get_template_part( 'content', 'none' );
endif;

get_footer();
?>