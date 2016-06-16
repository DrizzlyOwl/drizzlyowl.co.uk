<?php get_header(); ?>

    <article>
        <header>
            <h1 id="start"><?php the_title( ); ?></h1>
        </header>
    
        <?php if (have_posts()): while (have_posts()): the_post(); ?>
            <div class="wp-content">
                <?php the_content(); ?>
            </div>
            
        <?php endwhile; endif; ?>

        <footer>
        
        </footer>
    </article>

<?php get_footer(); ?>
