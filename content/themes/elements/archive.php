<?php
get_header();

echo '
<section class="section section--bg">
    <div class="container">
        <div class="row">';
            $post_featured = new WP_Query( array('posts_per_page' => 1, 'ignore_sticky_posts' => true) );

            if ($post_featured->have_posts()) :
                while ($post_featured->have_posts()) : $post_featured->the_post();
                    include 'content-post-featured.php';
                    break;
                endwhile;
            else:
              get_template_part( 'content', 'none' );
            endif;

            $post_semi_max = 3;
            if (get_field('post_about')) {
                $post_semi_max = 2;
            }
            $post_semi = new WP_Query( array('posts_per_page' => $post_semi_max, 'offset' => 1, 'ignore_sticky_posts' => true) );

            if ($post_semi->have_posts()) :
                echo '
                </div>
                <div class="row">
                    <ul class="grid">';
                        while ($post_semi->have_posts()) : $post_semi->the_post();
                            include 'content-post-grid.php';
                        endwhile;
                    echo '
                    </ul>
                </div>';
            else:
              get_template_part( 'content', 'none' );
            endif;
            echo '
        </div>
    </div>
</section>';

echo '
<section class="section">
    <div class="container">
        <div class="row">';
            $posts_offset = 4;
            if (get_field('post_about')) {
                $posts_offset = 3;
            }
            $posts = new WP_Query( array('posts_per_page' => 10, 'offset' => $posts_offset, 'ignore_sticky_posts' => true) );

            if ($posts->have_posts()) :
                while ($posts->have_posts()) : $posts->the_post();
                    include 'content-post-list.php';
                endwhile;
            else:
                get_template_part( 'content', 'none' );
            endif;
            echo '
        </div>
    </div>
</section>';

get_footer();
?>