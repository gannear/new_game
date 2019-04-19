<?php
/**
 * Template Name: Game Category Page
 *
 */
 ?>
<?php get_header( ); ?>
<!-- category-listing -->
<section class="game-category-wrapper">
	<div class="container">
	<?php if(ICL_LANGUAGE_CODE =='en'){ $param =''; ?>
                <h2 class="">Categories</h2>
               
           <?php } else if(ICL_LANGUAGE_CODE =='ar'){ $param ='?lang=ar';  ?>
                <h2 class="">الاقسام</h2>
               
           <?php } else if(ICL_LANGUAGE_CODE =='kr'){ $param ='?lang=kr';  ?>
                <h2 class="">Kategorî</h2>
                
           <?php } ?>
		
		<?php
	        $args = array('post_type' => 'games');
	        $terms = get_terms( 'gamecategory', ['hide_empty' => false,] , $args );
	       // echo "<pre>";
	       // print_r($terms);
	    ?>
		<div class="row">
			<?php foreach ( $terms as $term ) { ?>
				<div class="col-lg-4 col-sm-6 mb-5">					
			        <div class="game-category">
			        	<div class="game-cat-media">
			        		<?php if( get_field('game_category_image', $term) ): ?>
			        			<a href="<?php echo site_url(); ?>/gamecategory/<?php echo $term->slug;?>/<?php echo $param; ?>">
			        				<img src="<?php the_field('game_category_image', $term); ?>" class="img-fluid" />
			        			</a>
			        		<?php endif; ?>
			        	</div>	
			        	<h4 class="game-cat-title"><a href="<?php echo $term->slug;?>">
			        		<?php echo $term->name;?>
			        	</a></h4>
			        </div>
			    </div>
            <?php }?>
		</div>
	</div>
</section>
<!-- #category-listing -->
<?php get_footer( ); ?>




