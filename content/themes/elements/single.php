<?php
get_header();

if( have_posts() ):
    while( have_posts() ): the_post();

        // Content (variables)
        $title = get_the_title();
        $content = wpautop( get_the_content() );
        $readingTime = get_field('readingTime');

        if( get_field('date') ){
            $date = get_field('date');
        } else {
            $date = get_the_date();
        }

        if( get_field('displayCategory') ){
            $categoryField = get_field('displayCategory');
            $category = get_term_by('id', $categoryField, 'category');
            $category_name = $category->name;
            $category_url = get_category_link( get_field('displayCategory') );
        } else {
            $category = get_the_category();
            $category_name = $category[0]->cat_name;
            $category_url = get_category_link( get_cat_ID($category_name) );
        }
        ?>

        <article>
            <header>
                <p><a href="<?php echo $category_url; ?>"><?php echo $category_name; ?></a> / <?php echo $date; ?></p>
                <h1><?php echo $title; ?></h1>
                <p>Leestijd: <?php echo $readingTime; ?></p>
            </header>

            <section class="section section-text">
                <div class="section__body">
                    <p><?php echo get_field('intro'); ?></p>
                </div>
            </section>

            <?php
            if( have_rows('content') ):
                while( have_rows('content') ): the_row();
                    if( get_row_layout() == 'text' ):
                        get_template_part( 'elements/text' );
                    elseif( get_row_layout() == 'image' ):
                        get_template_part( 'elements/image' );
                    endif;
                endwhile;
            endif;
            ?>

          <div id="comments" class="comments-area">

            <?php
            //Get only the approved comments
            $args = array(
                'status' => 'approve'
            );

            // The comment Query
            $comments_query = new WP_Comment_Query;
            $comments = $comments_query->query( $args );

            // Comment Loop
            if ( $comments ) {
                foreach ( $comments as $comment ) {
                    echo '<p>' . $comment->comment_content . '</p>';
                }
            } else {
                echo 'No comments found.';
            }
            ?>

            <?php comment_form(); ?>
          </div><!-- .comments-area -->
        </article>

    <?php
  endwhile;
endif;

get_footer(); ?>