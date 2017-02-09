<li class="comment">
    <?php
    $date_raw = DateTime::createFromFormat("Y-m-d H:i:s", $comment->comment_date);
    $date = $date_raw->format('j F Y');
    ?>
    <p class="comment__meta"><strong><?php echo $comment->comment_author; ?></strong><span class="comment__meta__seperator">&middot;</span><small><time datetime="<?php echo $date; ?>"><?php echo $date; ?></time></small></p>
    <p class="comment__body"><?php echo $comment->comment_content; ?></p>
</li>