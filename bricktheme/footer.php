		<footer id="site-footer" class="grid">
            <?php if ( is_active_sidebar( 'footer-section-one' ) ) : ?>
                <div class="footer-section-one">
                    <?php dynamic_sidebar( 'footer-section-one' ); ?>
                </div>
            <?php endif; ?>                        
			<div class="copyright-and-menu">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<div class="copyright">
								<p><?php printf( '%s.All right reserved &copy; %s', get_bloginfo(), date( 'Y' ) ); ?></p>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="footer-links">
								<?php
									wp_nav_menu( array(
										'theme_location'    => 'footer',
									) );
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>    
	