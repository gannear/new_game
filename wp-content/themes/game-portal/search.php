<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package fastvideo
 */

get_header(); ?>

<?php  /*if ( !have_posts() ) { ?>
	<div class="inner-wrap">
<?php } */ ?>

	<?php //dynamic_sidebar( 'header-ad' ); ?>

	 
	<section class="games-subcat">
		<div class="container">
        <div class="main-title">
            <h2><?php printf( esc_html__( 'Search Results for %s', 'game_portal' ), '"' . get_search_query() . '"' ); ?></h2>
        </div>
			
		<div class="row"> 

		<?php
			if ( have_posts() ) :
				get_template_part( 'template-parts/content', 'search');
			else :
			   echo'<div class="col-lg-15 col-md-4 col-sm-6 mb-5">
                        <div class="">                             
                            <div>
                                <p>No Results Found.</p>
                            </div>
                        </div>                         
                    </div>';
		?>
		<?php endif; ?>
		</div>		
		<?php

			echo '<div class="clear"></div>';

			global $wp_version;
			echo '<div class="content-block mb-5">';
			if ( $wp_version >= 4.1 ) :

				the_posts_pagination( 
					array( 	'prev_text' => _x( '&laquo;', 'previous post', 'game_portal' ) , 
							'next_text' => _x( '&raquo;', 'previous post', 'game_portal'  )   ) );
			
			endif;
			echo '</div>';


		?>		
	</div>
</section>

<?php get_footer(); ?>
