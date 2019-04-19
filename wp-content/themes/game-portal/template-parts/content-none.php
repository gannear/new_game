<?php

	if ( have_posts() ) :

	/* Start the Loop */
	while ( have_posts() ) : the_post();

		/*
		 * Include the Post-Format-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
		 */
	?>

		<div class="col-lg-15 col-md-4 col-sm-6 mb-5">
                        <div class="game-box h-100">
                             
                                <div class="game-text">
                                    <p class="downloads">100,000+ Downloads</p>
                                </div>
                            </div>
                         
                    </div>

	<?php

	//$i++;

	endwhile;

	else :

		get_template_part( 'template-parts/content', 'none' );

	?>

<?php endif; ?>
 <!-- .content-block -->
 			</div><!-- #main -->
	</div><!-- #primary -->

	</section>