<section class="pb-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 overflow-hidden">
                    <h2 class="pb-5">Latest Sets</h2>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    <!-- JustOneBrick sets custom query loop -->
                    <?php     
                    	$recent_sets = wp_get_recent_posts(
                            array(
                                'numberposts' => 3,
                                'post_status' => 'publish',
                                'post_type' => 'job_sets'
                            )
                        );	
                    ?>
                    <?php if (!empty($recent_sets)) {
                        foreach ($recent_sets as $set) {
                            ?>
                            <article id="post-<?php echo $set['ID']; ?>" <?php post_class('col'); ?>>
                                <div class="card bg-info">
                                    <img src="<?php echo get_the_post_thumbnail_url($set['ID'], 'large'); ?>" class="p-4"
                                        alt="<?php echo get_post_meta(get_post_thumbnail_id($set['ID']), '_wp_attachment_image_alt', TRUE); ?>">
                                    <div class="card-body">
                                        <h3 class=""><a href="<?php the_permalink($set['ID']); ?>"><?php echo $set['post_title']; ?></a></h3>
                                        <p class="excerpt">
                                            <?php echo get_post_meta($set['ID'], 'brick_set_number', true); ?> |
                                            <?php echo implode(",", wp_get_post_terms($set['ID'], 'brick_theme', array('fields' => 'names'))); ?>
                                        </p>
                                        <a href="<?php the_permalink($set['ID']); ?>" class="btn btn-primary"><?php esc_html_e('View set ->', 'bricktheme'); ?></a>
                                    </div>
                                </div>
                            </article>
                            <?php
                        }
                    }?>
                    <!-- end of JustOneBrick sets custom query loop -->
                    </div>                    
                </div>
            </div>
        </div>
    </section>