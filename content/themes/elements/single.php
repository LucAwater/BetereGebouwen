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
            $category_link = get_category_link( get_field('displayCategory') );
        } else {
            $category = get_the_category();
            $category_name = $category[0]->cat_name;
            $category_link = get_category_link( get_cat_ID($category_name) );
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
                        <div class="author">
                            <?php if (get_field('author_photo')) : ?>
                                <img class="author__image" src="<?php echo get_field('author_photo')['sizes']['author']; ?>">
                            <?php endif; ?>

                            <?php if (get_field('author_name')) : ?>
                                <small class="author__name"><?php echo get_field('author_name'); ?></small>
                            <?php endif; ?>

                            <?php if (get_field('author_function')) : ?>
                                <small class="author__function"><?php echo get_field('author_function'); ?></small>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-7 col-md-offset-1">
                        <small class="post-meta">
                            <a class="link link--category" href="<?php echo $category_link; ?>"><?php echo $category_name; ?></a>
                            <span> / </span>
                            <time datetime="<?php echo $date; ?>"><?php echo $date; ?></time>
                        </small>

                        <h1><?php the_title(); ?></h1>

                        <div class="post-data">
                            <small class="post-data__likes"><?php echo do_shortcode('[dot_recommends]'); ?></small>
                            <small class="post-data__comments"><i class="fa fa-comment-o" aria-hidden="true"></i> <?php echo comments_number('0', '1', '%'); ?></small>
                            <?php
                            if (get_field('readingTime')) {
                                echo '<span class="post-data__seperator">&middot;</span>';
                                echo '<small>Leestijd: ' . get_field('readingTime') . '</small>';
                            }
                            ?>
                        </div>

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
                        <?php echo do_shortcode('[Sassy_Social_Share]'); ?>
                    </div>
                </div>
            </footer>
        </article>

        <?php
        //Get only the approved comments
        $commenter = wp_get_current_commenter();
        $req = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );

        $fields =  array(
          'author' =>
            '<p class="comment-form-author"><label for="author">' . __( 'Naam', 'domainreference' ) . '</label><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
            '" size="30"' . $aria_req . ' /></p>',

          'email' =>
            '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
            '" size="30"' . $aria_req . ' /></p>'
        );

        $args = array(
            'status' => 'approve',
            'post_id' => $post->ID
        );

        // The comment Query
        $comments_query = new WP_Comment_Query;
        $comments = $comments_query->query( $args );

        // Comment Loop
        if ( $comments ) :
            ?>
            <section class="section section--border-top">
                <div class="container">
                    <div class="section__header row">
                        <div class="col-md-7 col-md-offset-3">
                            <h2>Reacties</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7 col-md-offset-3">
                            <?php
                            foreach ( $comments as $comment ) {
                                include 'comment.php';
                            }

                            $args_form = array(
                                'comment_notes_after' => '',
                                'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
                                'fields' => apply_filters( 'comment_form_default_fields', $fields ),
                                'label_submit' => 'Versturen',
                                'title_reply' => 'Schrijf een reactie',
                                'comment_notes_before' => '<p class="comment-notes">Uw emailadres wordt niet getoond</p>',
                            );
                            comment_form($args_form);
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

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