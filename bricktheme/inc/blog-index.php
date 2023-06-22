<div class="blog-post">
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php if ( has_post_thumbnail() ) :
             $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'blog-thumbnail' );?>
                <div class="blog-post-thumb">
					<a href="<?php the_permalink(); ?>"><img src="<?php echo $featured_image[0]; ?>" alt='' /></a>
                </div>
        <?php endif; ?>
		
		<?php if ( is_singular('post') ) :
				echo $post->post_content;
			  else: 
		?>
				<?php the_excerpt(); ?>
				<a class="read-more-link" href="<?php the_permalink(); ?>"><?php _e( 'Read More', 'bricktheme' ); ?></a>
				<?php $categories = get_the_category(); ?>
				<?php if ( ! empty( $categories ) ) : ?>
					<div class="posted-in">
						<span><?php _e( 'Posted In', 'bricktheme' ); ?></span>
							<a href="<?php echo get_category_link( $categories[0]->term_id ); ?>"> 
							<?php echo $categories[0]->name; ?>
							</a>
					</div>
				<?php endif; ?>
		<?php endif; ?>
</div>