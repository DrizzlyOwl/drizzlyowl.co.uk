<?php get_header(); ?>
        
    <article>
        <header>
            <h1><?php the_title( ); ?></h1>
            <p class="is-hidden">Published: <time pubdate="pubdate"><?php echo get_the_time('d-m-Y'); ?></time></p>
        </header>
    
        <?php if (have_posts()): while (have_posts()): the_post(); ?>
            <div class="wp-content">
                <?php the_content(); ?>
            </div>
            
        <?php endwhile; endif; ?>

        <footer>
            <?php get_template_part('share-links'); ?>
        </footer>
    </article>

<?php get_footer(); ?>
