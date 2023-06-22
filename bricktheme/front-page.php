<?php
get_header();
?>

<?php while( have_posts() ): ?>
    <?php the_post(); ?>
    <div class="actual-content above-the-fold">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; ?> 

<?php
get_template_part( 'inc/sets', 'front' ); 
get_footer();
?>