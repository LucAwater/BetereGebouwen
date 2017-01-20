<?php
get_header();

if( have_posts() ):
  ?>

  <div class="filter">
    <nav>
      <ul>
        <?php
        foreach( get_categories(array('hide_empty' => 0)) as $cat ){
          echo '<li><a data="' . $cat->slug . '">' . $cat->name . '</a></li>';
        }
        ?>
      </ul>
    </nav>
  </div>

  <?php
  elements_posts_start();

    while( have_posts() ): the_post();
      get_template_part( 'content', 'post' );
    endwhile;

  elements_posts_end();

else:
  get_template_part( 'content', 'none' );
endif;

get_footer();
?>