<?php get_header(); ?>
        
    <h1><?php single_cat_title( ); ?></h1>
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
        
        <article <?php post_class( ); ?>>
            <header>
                <h2><?php the_title() ?></h2>
                <p>Published: <time pubdate="pubdate"><?php echo get_the_time('d-m-Y'); ?></time></p>
            </header>
            <?php the_excerpt(); ?>
            <footer>
                
            </footer>
        </article>
        
    <?php endwhile; endif; ?>

<?php get_footer(); ?>
