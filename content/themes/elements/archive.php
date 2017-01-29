<?php
get_header();

$post_count = 0;

if( have_posts() ):
  ?>

  <section class="posts">
    <?php
    while( have_posts() ): the_post();
      if ($post_count < 3) {
        include 'content-post-featured.php';
      } else {
        include 'content-post.php';
      }

      $post_count++;
    endwhile;
    ?>
  </section>

<?php
else:
  get_template_part( 'content', 'none' );
endif;

get_footer();
?>