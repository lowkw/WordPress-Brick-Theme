<?php
get_header();
?>

<h1 class="page-title"><?php the_title(); ?></h1>
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
get_footer();
?>