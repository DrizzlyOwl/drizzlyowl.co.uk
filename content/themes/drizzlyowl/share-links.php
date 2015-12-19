<div class="share-links">
    <p>Share this article</p>
    <ul>
        <li class="share-links__link  share-links__link--facebook"><a target="_blank" href="//www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-fw fa-facebook"></i>Facebook</a></li>
        <li class="share-links__link  share-links__link--twitter"><a target="_blank" href="//twitter.com/home?status=<?php echo utf8_uri_encode(get_the_title()); ?>%20-%20<?php echo utf8_uri_encode(get_bloginfo('name') . "%20-%20@" . get_bloginfo('description')); ?>%20<?php the_permalink(); ?>"><i class="fa fa-fw fa-twitter"></i>Twitter</a></li>
        <li class="share-links__link  share-links__link--email"><a href="mailto:?&amp;subject=<?php the_title(); ?>&amp;body=<?php the_title(); ?>%0A%0A<?php echo strip_tags(get_the_excerpt()); ?>%0A%0A<?php the_permalink(); ?>"><i class="fa fa-fw fa-envelope"></i>Email</a></li>
    </ul>
</div>