<?php
get_header();
?>
<div class="content-container">
    <?php if ( is_home() ) : ?>
        <h1 class="page-title"><?php single_post_title(); ?></h1>
    <?php endif; ?>
    <div class="container">
        <div class="row">			
            <div class="blog-posts col-md-8">
            <?php if ( have_posts() ): ?>
                <?php while( have_posts() ): ?>
                    <?php the_post(); ?>
                    <?php get_template_part( 'inc/blog', 'index' ); ?>
                <?php endwhile; ?>
				<?php the_posts_pagination( array(
						'prev_text' => __( 'Older Articles', 'textdomain' ),
						'next_text' => __( 'Newer Articles', 'textdomain' ),
				)); ?>
            <?php else: ?>
                <p><?php _e( 'No Blog Posts found', 'bricktheme' ); ?></p>
            <?php endif; ?>
            </div>
            <div id="blog-sidebar" class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
