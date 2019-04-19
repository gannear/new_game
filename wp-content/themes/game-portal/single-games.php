<?php get_header( ); ?>
<?php while( have_posts() ): the_post(); ?>
<?php $terms = wp_get_post_terms( $post->ID, 'gamecategory' ); 
?>
<!-- Main Banner -->
<section>
<input type="hidden" name="current_post_id" id="current_post_id" value="<?php echo $post->ID; ?>">
	<div class="container-fluid">
		<div class="row">
			<div class="top-banner" style="background-image:url(<?php if(get_field('game_banner_image') != '') { echo get_field('game_banner_image'); }else { echo get_template_directory_uri() . '/images/game-listing-vertical-banner.png'; }?>);">
                <!-- <img src="<?php //if(get_field('game_banner_image') != '') { echo get_field('game_banner_image'); }else { echo get_template_directory_uri() . '/images/game-listing-vertical-banner.png'; }?>" class="img-fluid"> -->
            </div>
		</div>
	</div>
</section>
<!-- #Main Banner -->

<!-- description -->
<section>
    <div class="container">
        <div class="row">
            <div class="game-list-detail w-100">
                <div class="game-list-title d-md-flex align-items-baseline mb-3">
                    <h2 class="mr-sm-5"><?php echo get_the_title($post->ID); ?></h2>
                    <p class="mr-sm-5"><?php echo $terms[0]->name; ?></p>
                    <div class="rating">
                     <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                    </div>
                </div>
                <div class="game-list-text mb-4">
                    <?php echo the_content(); ?>
                    <!-- <p>In Monument Valley you will manipulate impossible architecture and guide a silent princess through a stunningly beautiful world. Monument Valley is a surreal exploration through fantastical architecture and impossible geometry. Guide the silent princess Ida through mysterious monuments, uncovering hidden paths, unfolding optical illusions and outsmarting the enigmatic Crow People.</p> -->
                </div>
                <div class="game-list-rating d-md-flex justify-content-around align-items-center py-4" style="">
                    <h5><?php  echo __('Rate this game', 'game_portal'); ?></h5>
                    <div class="rating">
                        <input type="checkbox" name="r1" value="5"><label class="full" for="star5" title="5 stars"></label>
                        <input type="checkbox" name="r1" value="4"><label class="full" for="star4" title="4 stars"></label>
                        <input type="checkbox" name="r1" value="3"><label class="full" for="star3" title="3 stars"></label>
                        <input type="checkbox" name="r1" value="2"><label class="full" for="star2" title="2 stars"></label>
                        <input type="checkbox" name="r1" value="1"><label class="full" for="star1" title="1 star"></label>
                    </div>
                    <input type="button" name="download" class="btn btn-danger btn-download" value="<?php  echo __('Download', 'game_portal'); ?>" style="">
                    
                </div>
                <div class="game-status d-md-flex justify-content-around pt-4">
                    <h5>10M+ <span><?php  echo __('Downloads', 'game_portal'); ?></span></h5>
                    <h5>16+ <span><?php  echo __('Rated', 'game_portal'); ?></span></h5>
                    <h5>4.8 <span> 11M <?php  echo __('reviews', 'game_portal'); ?></span></h5>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- #description -->
<!-- Game images-->
<section>
	<div class="container-fluid">
		<div class="row">
            <?php if(ICL_LANGUAGE_CODE =='en'){ ?>
            <div id="gameimage-list-slider" class="owl-carousel">
            <?php } else if(ICL_LANGUAGE_CODE =='ar'){  ?>
            <div id="gameimage-list-slider-ar" class="owl-carousel">
            <?php } ?>			
                <div class="item">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/game-subcategory4.png">
                </div>
                <div class="item">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/racing-game2.png">
                </div>
                <div class="item">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/game-subcategory10.png">
                </div>
                <div class="item">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/action-game2.png">
                </div>
                <div class="item">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/racing-game1.png">
                </div>
                <div class="item">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/popular-game1.png">
                </div>
                <div class="item">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/game-subcategory6.png">
                </div>
			    <!-- <?php 
				$images = get_field('game_images');
				$size = 'full';

				if( $images ): ?>
				        <?php foreach( $images as $image ): ?>
				            <div class="item">
				            	<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
				            </div>
				        <?php endforeach; ?>
				<?php endif; ?> -->
			</div>
		</div>
	</div>
</section>
<!-- #Game images -->
<!-- game rating range -->
<section>
	<div class="container">		
		<div class="rating-range py-5 w-100">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-3 col-md-4 text-center">
                    <p><?php  echo __('Similar games', 'game_portal'); ?></p>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="ratingoutof">
                        <h3>4.8 <span><?php  echo __('Out of', 'game_portal'); ?> 5 </span></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="progressbar">
                        <div class="progress">
                            <div class="progress-bar" style="width:100%;"></div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" style="width:60%;"></div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" style="width:40%;"></div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" style="width:20%;"></div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" style="width:10%;"></div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
</section>
<!-- #game rating range -->
<!--Similar Games-->
<section class="my-5">
    <div class="container">
        <div class="row">
            <?php if(ICL_LANGUAGE_CODE =='en'){ ?>
            <div id="similar-game-slider" class="owl-carousel">
            <?php } else if(ICL_LANGUAGE_CODE =='ar'){  ?>
            <div id="similar-game-slider-ar" class="owl-carousel">           
            <?php }
               $terms= get_the_terms($post->ID,'gamecategory');
                if ($terms) {
                $first_term = $terms[0]->slug;
                $currentID = get_the_ID();
                $tax = array($first_term);
                $args = array(
                            'post_type' => 'games',
                            'posts_per_page' => -1,
                            'order' => DESC,
                            'post__not_in' => array($currentID),
                            'tax_query' => array(
                            array(
                                'taxonomy' => 'gamecategory',
                                'field' => 'slug',
                                'terms' => $first_term
                                )
                             )
                            );
                $my_query = new WP_Query($args);
               // print_r($my_query);
                if( $my_query->have_posts() ) {
                while ($my_query->have_posts()) : $my_query->the_post(); 
                $actionImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
 
                ?>
                <div class="item">
                    <div class="">
                        <div class="game-box h-100 mb-2">
                            <a href="#">
                                <div class="game-media">
                                    <a href="<?php the_permalink();?>">
                                    <img src="<?php echo $actionImg[0]; ?>" alt="">
                                    </a>
                                </div>
                            </a>
                            <div class="game-box-detail">
                                <div class="game-title">
                                    <h4><a href="<?php the_permalink();?>"> <?php the_title(); ?></a></h4>
                                    <div class="rating my-1">
                                    <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                                    </div>
                                </div>
                                <div class="game-text">
                                    <p class="downloads">100,000+ <?php  echo __('Downloads', 'game_portal'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            endwhile;
            }
            wp_reset_query();
            }
            ?>
            </div>
        </div>
    </div>
</section>
<!--#Similar Games-->
<?php endwhile;  ?>

<?php get_footer( ); ?>