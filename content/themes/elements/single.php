<?php
get_header();

if (have_posts()) :
    while (have_posts()) : the_post();

        // Get featured image
        $image_id = get_post_thumbnail_id();
        $image = wp_get_attachment_image_src($image_id, 'hero', true);
        $image_url = $image[0];
        $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true);

        // Get date
        if (get_field('date')) {
            $date = get_field('date');
        } else {
            $date = get_the_date();
        }

        // Get related posts
        $related = get_field('relatedPosts');

        // Get category properties
        if (get_field('displayCategory')) {
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

        <section class="section section-hero">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
                    </div>
                </div>
            </div>
        </section>

        <article>
            <header class="container">
                <div class="row">
                    <div class="col-md-2">
                        <!-- author -->
                    </div>
                    <div class="col-md-7 col-md-offset-1">
                        <small class="post-meta"><a class="link link--category" href="<?php echo $category_url; ?>"><?php echo $category_name; ?></a> / <time datetime="<?php echo $date; ?>"><?php echo $date; ?></time></small>
                        <h1><?php the_title(); ?></h1>
                        <small>Leestijd: <?php echo get_field('readingTime'); ?></small>
                    </div>
                </div>
            </header>

            <section class="section section-text section-text--intro container">
                <div class="row">
                    <div class="col-md-7 col-md-offset-3">
                        <?php echo get_field('intro'); ?>
                    </div>
                </div>
            </section>

            <?php
            if (have_rows('content')) :
                while (have_rows('content')) : the_row();

                    if (get_row_layout() == 'text') {
                        include 'elements/text.php';
                    } elseif (get_row_layout() == 'quote') {
                        include 'elements/quote.php';
                    } elseif (get_row_layout() == 'image') {
                        include 'elements/image.php';
                    } elseif (get_row_layout() == 'video') {
                        include 'elements/video.php';
                    }

                endwhile;
            endif;
            ?>

            <footer class="container">
                <div class="row">
                    <div class="col-md-7 col-md-offset-3">
                        <p>Vind je dit een interessant artikel? Deel het met je netwerk.</p>
                        <ul class="list list--inline">
                            <li><a class="btn btn--linkedin" href="">Linkedin</a></li>
                            <li><a class="btn btn--twitter" href="">Twitter</a></li>
                            <li><a class="btn btn--facebook" href="">Facebook</a></li>
                        </ul>
                    </div>
                </div>
            </footer>

            <!--
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
            </div>
            -->
        </article>

        <?php if ($related) : ?>
            <section class="section section--bg">
                <div class="container">
                    <div class="section__header row">
                        <div class="col-md-12">
                            <h2>Gerelateerde artikelen</h2>
                        </div>
                    </div>

                    <div class="row">
                        <ul class="grid">
                            <?php
                            foreach ($related as $post) {
                                include 'content-post-grid.php';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </section>
        <?php endif; ?>

    <?php
  endwhile;
endif;

get_footer(); ?>