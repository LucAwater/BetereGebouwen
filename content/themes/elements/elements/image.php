<section class="section section-image container">
    <div class="row">
        <div class="col-md-9 col-md-offset-2">
            <figure>
                <?php $image = get_sub_field('image'); ?>
                <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php $image['alt']; ?>">
                <figcaption>
                    <?php echo get_sub_field('caption'); ?>
                </figcaption>
            </figure>
        </div>
    </div>
</section>