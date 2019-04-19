<?php
/**
 * Template Name: Home Page
 *
 */
 
 ?>
<?php get_header( ); ?>
<!-- Main Banner -->
<section>
    <?php if(ICL_LANGUAGE_CODE =='en'){ ?>
    <div id="home-slider" class="owl-carousel">
    <?php } else if(ICL_LANGUAGE_CODE =='ar'){  ?>
    <div id="home-slider-ar" class="owl-carousel">           
    <?php } ?>
    
        <?php
            $args = array(
            'post_type'      => 'homeslider',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
            'order'=> 'ASC'
            );
            $slider_query = new WP_Query( $args );

            if($slider_query->have_posts()) : while($slider_query->have_posts()) : $slider_query->the_post();
            $sliderImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
        ?>
        <div class="item">
            <img src="<?php echo $sliderImg[0]; ?>">
        </div>
        <?php
            endwhile;
            endif;
            wp_reset_postdata();
        ?>
    </div>
</section>
<!-- #Main Banner -->
<!--Premium Games-->
<section class="my-5">
    <div class="container">
        <div class="main-title mb-4 d-sm-flex justify-content-between align-items-center">
           <?php if(ICL_LANGUAGE_CODE =='en'){ ?>
                <h2>Premium Games</h2>
                <a href="<?php echo get_permalink(7);?>">See More <i class="fa fa-angle-right"></i></a>
           <?php } else if(ICL_LANGUAGE_CODE =='ar'){  ?>
                <h2>العاب مميزة</h2>
                <a href="<?php echo get_permalink(303);?>">شاهد المزيد <i class="fa fa-angle-right"></i></a>
           <?php } else if(ICL_LANGUAGE_CODE =='kr'){  ?>
                <h2>Premium Games</h2>
                <a href="<?php echo get_permalink(7);?>">
Zêdetir bibînin <i class="fa fa-angle-right"></i></a>
           <?php } ?>
            
        </div>
        <div class="row">
            <?php       
              $args = array(
			  'post_type'      => 'games',
			  'posts_per_page' => 3,
			  'post_status'    => 'publish',
			  'order'=> 'ASC',
			  'meta_query'     => array(
			    array(
			      'key'     => 'premium',
			      'value'   => '1',
			      'compare' => '='
			      
			    ) 
			  )
			);
              $premium_query = new WP_Query( $args );
             			 
			if($premium_query->have_posts()) : 
              while($premium_query->have_posts()) : 
              $premium_query->the_post();

              $premiumImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
              $terms = wp_get_post_terms( $post->ID, 'gamecategory' );
                            
            ?>
            <div class="hentry col-lg-4 col-sm-6 mb-lg-0 mb-5">
                <div class="game-box h-100">
                   
                        <div class="game-media">
                                <a href="<?php the_permalink();?>">
                                <img clas='loginpost' src="<?php echo $premiumImg[0]; ?>" alt="">
                                </a>
                            
                        </div>
                     
                    <div class="game-box-detail">
                        <div class="d-md-flex align-items-center game-title">
                            <h4><a href="<?php the_permalink();?>">
                                    <?php the_title(); ?></a></h4>
                            <div class="rating ml-md-5">
                            <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                                <!-- <input type="checkbox" name="r1" value="5"><label class="full" for="star5" title="5 stars"></label>
                                <input type="checkbox" name="r1" value="4.5"><label class="half" for="star4half" title="4.5 stars"></label>
                                <input type="checkbox" name="r1" value="4"><label class="full" for="star4" title="4 stars"></label>
                                <input type="checkbox" name="r1" value="3.5"><label class="half" for="star3half" title="3.5 stars"></label>
                                <input type="checkbox" name="r1" value="3" checked=""><label class="full" for="star3" title="3 stars"></label>
                                <input type="checkbox" name="r1" value="2.5"><label class="half" for="star2half" title="2.5 stars"></label>
                                <input type="checkbox" name="r1" value="2"><label class="full" for="star2" title="2 stars"></label>
                                <input type="checkbox" name="r1" value="1.5"><label class="half" for="star1half" title="1.5 stars"></label>
                                <input type="checkbox" name="r1" value="1"><label class="full" for="star1" title="1 star"></label>
                                <input type="checkbox" name="r1" value="half"><label class="half" for="starhalf" title="0.5 stars"></label> -->
                            </div>
                        </div>
                        <div class="d-flex game-text mt-sm-2">
                            <p class="category"><?php echo $terms[0]->name; ?></p>
                            <p class="downloads ml-4">100,000+ <?php  echo __('Downloads', 'game_portal'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
		      endwhile;
		      endif;
		    //wp_reset_postdata();
		    ?>
            <!-- <div class="col-lg-4 col-sm-6 mb-lg-0 mb-5">
		        <div class="game-box h-100">
		            <a href="#">
		            	<div class="game-media">
		            		<img src="<?php echo get_template_directory_uri(); ?>/images/premium-game2.png" alt="">
		            	</div>
		            </a>
		            <div class="game-box-detail">
		            	<div class="d-md-flex align-items-center game-title">
		            		<h4><a href="#">Assassin's Creed Identity</a></h4>
		            		<div class="rating ml-md-5">
                                    <input type="checkbox" name="r2" value="5"><label class="full" for="star5" title="5 stars"></label>
                                    <input type="checkbox" name="r2" value="4.5"><label class="half" for="star4half" title="4.5 stars"></label>
                                    <input type="checkbox" name="r2" value="4"><label class="full" for="star4" title="4 stars"></label>
                                    <input type="checkbox" name="r2" value="3.5"><label class="half" for="star3half" title="3.5 stars"></label>
                                    <input type="checkbox" name="r2" value="3" checked=""><label class="full" for="star3" title="3 stars"></label>
                                    <input type="checkbox" name="r2" value="2.5"><label class="half" for="star2half" title="2.5 stars"></label>
                                    <input type="checkbox" name="r2" value="2"><label class="full" for="star2" title="2 stars"></label>
                                    <input type="checkbox" name="r2" value="1.5"><label class="half" for="star1half" title="1.5 stars"></label>
                                    <input type="checkbox" name="r2" value="1"><label class="full" for="star1" title="1 star"></label>
                                    <input type="checkbox" name="r2" value="half"><label class="half" for="starhalf" title="0.5 stars"></label>
                                </div>
		            	</div>
		            	<div class="d-flex game-text mt-sm-2">
		            		<p class="category">Action</p>
		            		<p class="downloads ml-4">100,000+ Downloads</p>
		            	</div>
		            </div>
		        </div>
		    </div>
		    <div class="col-lg-4 col-sm-6 mb-lg-0 mb-5">
		        <div class="game-box h-100">
		            <a href="#">
		            	<div class="game-media">
		            		<img src="<?php echo get_template_directory_uri(); ?>/images/premium-game3.png" alt="">
		            	</div>
		            </a>
		            <div class="game-box-detail">
		            	<div class="d-md-flex align-items-center game-title">
		            		<h4><a href="#">Assassin's Creed Identity</a></h4>
		            		<div class="rating ml-md-5">
                                    <input type="checkbox" name="r3" value="5"><label class="full" for="star5" title="5 stars"></label>
                                    <input type="checkbox" name="r3" value="4.5"><label class="half" for="star4half" title="4.5 stars"></label>
                                    <input type="checkbox" name="r3" value="4"><label class="full" for="star4" title="4 stars"></label>
                                    <input type="checkbox" name="r3" value="3.5"><label class="half" for="star3half" title="3.5 stars"></label>
                                    <input type="checkbox" name="r3" value="3" checked=""><label class="full" for="star3" title="3 stars"></label>
                                    <input type="checkbox" name="r3" value="2.5"><label class="half" for="star2half" title="2.5 stars"></label>
                                    <input type="checkbox" name="r3" value="2"><label class="full" for="star2" title="2 stars"></label>
                                    <input type="checkbox" name="r3" value="1.5"><label class="half" for="star1half" title="1.5 stars"></label>
                                    <input type="checkbox" name="r3" value="1"><label class="full" for="star1" title="1 star"></label>
                                    <input type="checkbox" name="r3" value="half"><label class="half" for="starhalf" title="0.5 stars"></label>
                                </div>
		            	</div>
		            	<div class="d-flex game-text mt-sm-2">
		            		<p class="category">Action</p>
		            		<p class="downloads ml-4">100,000+ Downloads</p>
		            	</div>
		            </div>
		        </div>
		    </div> -->
        </div>
    </div>
</section>
<!--#Premium Games-->
<!--Action Games-->
<section class="my-5">
    <div class="container">
        <div class="main-title mb-4 d-sm-flex justify-content-between align-items-center">
            
        <?php if(ICL_LANGUAGE_CODE =='en'){ ?>
                <h2>Action Games</h2>

                <?php
                 $action_category_link = get_category_link(3);
                 ?>
                <a href="<?php echo esc_url($action_category_link ); ?>">See More <i class="fa fa-angle-right"></i></a>
           <?php } else if(ICL_LANGUAGE_CODE =='ar'){  ?>
                <h2>العاب اكشن</h2>
                <?php
                 $action_category_link = get_category_link(17);
                 ?>
                <a href="<?php echo esc_url($action_category_link ); ?>">شاهد المزيد <i class="fa fa-angle-right"></i></a>
          

           <?php } else if(ICL_LANGUAGE_CODE =='kr'){  ?>
                <h2>Lîstikên çalakiyê</h2>
                <?php
                 $action_category_link = get_category_link();
                 ?>
                <a href="<?php echo esc_url($action_category_link ); ?>">Zêdetir bibînin <i class="fa fa-angle-right"></i></a>
                
           <?php } ?>

        </div>
        <div class="row">
            <?php

             $args = array(
				'post_type' => 'games',
				'posts_per_page' => 5,
				'order' => DESC,
				'tax_query' => array(
				array(
				'taxonomy' => 'gamecategory',
				'field' => 'slug',
				'terms' => 'action'
				)
				)
				);
              $action_query = new WP_Query( $args );
             // print_r($action_query);
             			 
			if($action_query->have_posts()) : 
              while($action_query->have_posts()) : 
              $action_query->the_post();

              $actionImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
              //echo $actionImg[0];
              
            ?>
            <div class="col-md-15 col-sm-6 mb-lg-0 mb-5">
                <div class="game-box h-100">
                    <a href="#">
                        <div class="game-media">
                            <a href="<?php the_permalink();?>">
                                <img src="<?php echo $actionImg[0]; ?>" alt="">
                            </a>
                        </div>
                    </a>
                    <div class="game-box-detail">
                        <div class="game-title">
                            <h4><a href="<?php the_permalink();?>">
                                    <?php the_title(); ?></a></h4>
                            <div class="rating my-1">
                            <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                                <!-- <input type="checkbox" name="r1" value="5"><label class="full" for="star5" title="5 stars"></label>
                                <input type="checkbox" name="r1" value="4.5"><label class="half" for="star4half" title="4.5 stars"></label>
                                <input type="checkbox" name="r1" value="4"><label class="full" for="star4" title="4 stars"></label>
                                <input type="checkbox" name="r1" value="3.5"><label class="half" for="star3half" title="3.5 stars"></label>
                                <input type="checkbox" name="r1" value="3" checked=""><label class="full" for="star3" title="3 stars"></label>
                                <input type="checkbox" name="r1" value="2.5"><label class="half" for="star2half" title="2.5 stars"></label>
                                <input type="checkbox" name="r1" value="2"><label class="full" for="star2" title="2 stars"></label>
                                <input type="checkbox" name="r1" value="1.5"><label class="half" for="star1half" title="1.5 stars"></label>
                                <input type="checkbox" name="r1" value="1"><label class="full" for="star1" title="1 star"></label>
                                <input type="checkbox" name="r1" value="half"><label class="half" for="starhalf" title="0.5 stars"></label> -->
                            </div>
                        </div>
                        <div class="game-text">
                            <p class="downloads">100,000+ <?php  echo __('Downloads', 'game_portal'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-15 col-sm-6 mb-lg-0 mb-5">
		        <div class="game-box h-100">
		            <a href="#">
		            	<div class="game-media">
		            		<img src="<?php echo get_template_directory_uri(); ?>/images/action-game2.png" alt="">
		            	</div>
		            </a>
		            <div class="game-box-detail">
		            	<div class="game-title">
		            		<h4><a href="#">Assassin's Creed Identity</a></h4>
		            		<div class="rating my-1">
                                    <input type="checkbox" name="r2" value="5"><label class="full" for="star5" title="5 stars"></label>
                                    <input type="checkbox" name="r2" value="4.5"><label class="half" for="star4half" title="4.5 stars"></label>
                                    <input type="checkbox" name="r2" value="4"><label class="full" for="star4" title="4 stars"></label>
                                    <input type="checkbox" name="r2" value="3.5"><label class="half" for="star3half" title="3.5 stars"></label>
                                    <input type="checkbox" name="r2" value="3" checked=""><label class="full" for="star3" title="3 stars"></label>
                                    <input type="checkbox" name="r2" value="2.5"><label class="half" for="star2half" title="2.5 stars"></label>
                                    <input type="checkbox" name="r2" value="2"><label class="full" for="star2" title="2 stars"></label>
                                    <input type="checkbox" name="r2" value="1.5"><label class="half" for="star1half" title="1.5 stars"></label>
                                    <input type="checkbox" name="r2" value="1"><label class="full" for="star1" title="1 star"></label>
                                    <input type="checkbox" name="r2" value="half"><label class="half" for="starhalf" title="0.5 stars"></label>
                                </div>
		            	</div>
		            	<div class="game-text">
		            		<p class="downloads">100,000+ Downloads</p>
		            	</div>
		            </div>
		        </div>
		    </div>
		    <div class="col-md-15 col-sm-6 mb-lg-0 mb-5">
		        <div class="game-box h-100">
		            <a href="#">
		            	<div class="game-media">
		            		<img src="<?php echo get_template_directory_uri(); ?>/images/action-game3.png" alt="">
		            	</div>
		            </a>
		            <div class="game-box-detail">
		            	<div class="game-title">
		            		<h4><a href="#">Assassin's Creed Identity</a></h4>
		            		<div class="rating my-1">
                                    <input type="checkbox" name="r3" value="5"><label class="full" for="star5" title="5 stars"></label>
                                    <input type="checkbox" name="r3" value="4.5"><label class="half" for="star4half" title="4.5 stars"></label>
                                    <input type="checkbox" name="r3" value="4"><label class="full" for="star4" title="4 stars"></label>
                                    <input type="checkbox" name="r3" value="3.5"><label class="half" for="star3half" title="3.5 stars"></label>
                                    <input type="checkbox" name="r3" value="3" checked=""><label class="full" for="star3" title="3 stars"></label>
                                    <input type="checkbox" name="r3" value="2.5"><label class="half" for="star2half" title="2.5 stars"></label>
                                    <input type="checkbox" name="r3" value="2"><label class="full" for="star2" title="2 stars"></label>
                                    <input type="checkbox" name="r3" value="1.5"><label class="half" for="star1half" title="1.5 stars"></label>
                                    <input type="checkbox" name="r3" value="1"><label class="full" for="star1" title="1 star"></label>
                                    <input type="checkbox" name="r3" value="half"><label class="half" for="starhalf" title="0.5 stars"></label>
                                </div>
		            	</div>
		            	<div class="game-text">
		            		<p class="downloads">100,000+ Downloads</p>
		            	</div>
		            </div>
		        </div>
		    </div>
		    <div class="col-md-15 col-sm-6 mb-lg-0 mb-5">
		        <div class="game-box h-100">
		            <a href="#">
		            	<div class="game-media">
		            		<img src="<?php echo get_template_directory_uri(); ?>/images/action-game4.png" alt="">
		            	</div>
		            </a>
		            <div class="game-box-detail">
		            	<div class="game-title">
		            		<h4><a href="#">Assassin's Creed Identity</a></h4>
		            		<div class="rating my-1">
                                    <input type="checkbox" name="r3" value="5"><label class="full" for="star5" title="5 stars"></label>
                                    <input type="checkbox" name="r3" value="4.5"><label class="half" for="star4half" title="4.5 stars"></label>
                                    <input type="checkbox" name="r3" value="4"><label class="full" for="star4" title="4 stars"></label>
                                    <input type="checkbox" name="r3" value="3.5"><label class="half" for="star3half" title="3.5 stars"></label>
                                    <input type="checkbox" name="r3" value="3" checked=""><label class="full" for="star3" title="3 stars"></label>
                                    <input type="checkbox" name="r3" value="2.5"><label class="half" for="star2half" title="2.5 stars"></label>
                                    <input type="checkbox" name="r3" value="2"><label class="full" for="star2" title="2 stars"></label>
                                    <input type="checkbox" name="r3" value="1.5"><label class="half" for="star1half" title="1.5 stars"></label>
                                    <input type="checkbox" name="r3" value="1"><label class="full" for="star1" title="1 star"></label>
                                    <input type="checkbox" name="r3" value="half"><label class="half" for="starhalf" title="0.5 stars"></label>
                                </div>
		            	</div>
		            	<div class="game-text">
		            		<p class="downloads">100,000+ Downloads</p>
		            	</div>
		            </div>
		        </div>
		    </div>
		    <div class="col-md-15 col-sm-6 mb-lg-0 mb-5">
		        <div class="game-box h-100">
		            <a href="#">
		            	<div class="game-media">
		            		<img src="<?php echo get_template_directory_uri(); ?>/images/action-game5.png" alt="">
		            	</div>
		            </a>
		            <div class="game-box-detail">
		            	<div class="game-title">
		            		<h4><a href="#">Assassin's Creed Identity</a></h4>
		            		<div class="rating my-1">
                                    <input type="checkbox" name="r3" value="5"><label class="full" for="star5" title="5 stars"></label>
                                    <input type="checkbox" name="r3" value="4.5"><label class="half" for="star4half" title="4.5 stars"></label>
                                    <input type="checkbox" name="r3" value="4"><label class="full" for="star4" title="4 stars"></label>
                                    <input type="checkbox" name="r3" value="3.5"><label class="half" for="star3half" title="3.5 stars"></label>
                                    <input type="checkbox" name="r3" value="3" checked=""><label class="full" for="star3" title="3 stars"></label>
                                    <input type="checkbox" name="r3" value="2.5"><label class="half" for="star2half" title="2.5 stars"></label>
                                    <input type="checkbox" name="r3" value="2"><label class="full" for="star2" title="2 stars"></label>
                                    <input type="checkbox" name="r3" value="1.5"><label class="half" for="star1half" title="1.5 stars"></label>
                                    <input type="checkbox" name="r3" value="1"><label class="full" for="star1" title="1 star"></label>
                                    <input type="checkbox" name="r3" value="half"><label class="half" for="starhalf" title="0.5 stars"></label>
                                </div>
		            	</div>
		            	<div class="game-text">
		            		<p class="downloads">100,000+ Downloads</p>
		            	</div>
		            </div>
		        </div>
		    </div> -->
            <?php
		      endwhile;
		      endif;
		      wp_reset_postdata();
		    ?>
        </div>
    </div>
</section>
<!--#Action Games-->
<!--Racing Games-->
<section class="my-5">
    <div class="container">
        <div class="main-title mb-4 d-sm-flex justify-content-between align-items-center">

         <?php if(ICL_LANGUAGE_CODE =='en'){ ?>
                <h2>Racing Games</h2>
                <?php
                  $racing_category_link = get_category_link(6);
                ?>
            <a href="<?php echo esc_url($racing_category_link); ?>">See More <i class="fa fa-angle-right"></i></a>
           <?php } else if(ICL_LANGUAGE_CODE =='ar'){  ?>
                <h2>العاب سباق</h2>
                <?php
                 $action_category_link = get_category_link(18);
                 ?>
                <a href="<?php echo esc_url($action_category_link ); ?>">شاهد المزيد <i class="fa fa-angle-right"></i></a>
          

           <?php } else if(ICL_LANGUAGE_CODE =='kr'){  ?>
                <h2>Racing Games</h2>
                <?php
                 $action_category_link = get_category_link();
                 ?>
                <a href="<?php echo esc_url($action_category_link ); ?>">Zêdetir bibînin <i class="fa fa-angle-right"></i></a>
                
           <?php } ?>
             
        </div>
        <div class="row">
            <?php

             $args = array(
				'post_type' => 'games',
				'posts_per_page' => 3,
				'order' => DESC,
				'tax_query' => array(
				array(
				'taxonomy' => 'gamecategory',
				'field' => 'slug',
				'terms' => 'racing'
				)
				)
				);
              $racing_query = new WP_Query( $args );
             // print_r($action_query);
             			 
			if($racing_query->have_posts()) : 
              while($racing_query->have_posts()) : 
              $racing_query->the_post();

              $racingImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
              //echo $actionImg[0];
              $terms_racing = wp_get_post_terms( $post->ID, 'gamecategory' );
              
            ?>
            <div class="col-lg-4 col-sm-6 mb-lg-0 mb-5">
                <div class="game-box h-100">
                    <a href="#">
                        <div class="game-media">
                            <a href="<?php the_permalink();?>">
                                <img src="<?php echo $racingImg[0]; ?>" alt="">
                            </a>
                        </div>
                    </a>
                    <div class="game-box-detail">
                        <div class="d-md-flex align-items-center game-title">
                            <h4><a href="<?php the_permalink();?>">
                                    <?php the_title(); ?></a></h4>
                            <div class="rating ml-md-5">
                            <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                               <!--  <input type="checkbox" name="r1" value="5"><label class="full" for="star5" title="5 stars"></label>
                                <input type="checkbox" name="r1" value="4.5"><label class="half" for="star4half" title="4.5 stars"></label>
                                <input type="checkbox" name="r1" value="4"><label class="full" for="star4" title="4 stars"></label>
                                <input type="checkbox" name="r1" value="3.5"><label class="half" for="star3half" title="3.5 stars"></label>
                                <input type="checkbox" name="r1" value="3" checked=""><label class="full" for="star3" title="3 stars"></label>
                                <input type="checkbox" name="r1" value="2.5"><label class="half" for="star2half" title="2.5 stars"></label>
                                <input type="checkbox" name="r1" value="2"><label class="full" for="star2" title="2 stars"></label>
                                <input type="checkbox" name="r1" value="1.5"><label class="half" for="star1half" title="1.5 stars"></label>
                                <input type="checkbox" name="r1" value="1"><label class="full" for="star1" title="1 star"></label>
                                <input type="checkbox" name="r1" value="half"><label class="half" for="starhalf" title="0.5 stars"></label> -->
                            </div>
                        </div>
                        <div class="d-flex game-text mt-sm-2">
                            <p class="category"><?php echo $terms_racing[0]->name; ?></p>
                            <p class="downloads ml-4">100,000+ <?php  echo __('Downloads', 'game_portal'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
		      endwhile;
		      endif;
		      wp_reset_postdata();
		    ?>
            <!--  <div class="col-lg-4 col-sm-6 mb-lg-0 mb-5">
		        <div class="game-box h-100">
		            <a href="#">
		            	<div class="game-media">
		            		<img src="<?php echo get_template_directory_uri(); ?>/images/racing-game2.png" alt="">
		            	</div>
		            </a>
		            <div class="game-box-detail">
		            	<div class="d-md-flex align-items-center game-title">
		            		<h4><a href="#">Assassin's Creed Identity</a></h4>
		            		<div class="rating ml-md-5">
                                    <input type="checkbox" name="r2" value="5"><label class="full" for="star5" title="5 stars"></label>
                                    <input type="checkbox" name="r2" value="4.5"><label class="half" for="star4half" title="4.5 stars"></label>
                                    <input type="checkbox" name="r2" value="4"><label class="full" for="star4" title="4 stars"></label>
                                    <input type="checkbox" name="r2" value="3.5"><label class="half" for="star3half" title="3.5 stars"></label>
                                    <input type="checkbox" name="r2" value="3" checked=""><label class="full" for="star3" title="3 stars"></label>
                                    <input type="checkbox" name="r2" value="2.5"><label class="half" for="star2half" title="2.5 stars"></label>
                                    <input type="checkbox" name="r2" value="2"><label class="full" for="star2" title="2 stars"></label>
                                    <input type="checkbox" name="r2" value="1.5"><label class="half" for="star1half" title="1.5 stars"></label>
                                    <input type="checkbox" name="r2" value="1"><label class="full" for="star1" title="1 star"></label>
                                    <input type="checkbox" name="r2" value="half"><label class="half" for="starhalf" title="0.5 stars"></label>
                                </div>
		            	</div>
		            	<div class="d-flex game-text mt-sm-2">
		            		<p class="category">Action</p>
		            		<p class="downloads ml-4">100,000+ Downloads</p>
		            	</div>
		            </div>
		        </div>
		    </div>
		    <div class="col-lg-4 col-sm-6 mb-lg-0 mb-5">
		        <div class="game-box h-100">
		            <a href="#">
		            	<div class="game-media">
		            		<img src="<?php echo get_template_directory_uri(); ?>/images/racing-game3.png" alt="">
		            	</div>
		            </a>
		            <div class="game-box-detail">
		            	<div class="d-md-flex align-items-center game-title">
		            		<h4><a href="#">Assassin's Creed Identity</a></h4>
		            		<div class="rating ml-md-5">
                                    <input type="checkbox" name="r3" value="5"><label class="full" for="star5" title="5 stars"></label>
                                    <input type="checkbox" name="r3" value="4.5"><label class="half" for="star4half" title="4.5 stars"></label>
                                    <input type="checkbox" name="r3" value="4"><label class="full" for="star4" title="4 stars"></label>
                                    <input type="checkbox" name="r3" value="3.5"><label class="half" for="star3half" title="3.5 stars"></label>
                                    <input type="checkbox" name="r3" value="3" checked=""><label class="full" for="star3" title="3 stars"></label>
                                    <input type="checkbox" name="r3" value="2.5"><label class="half" for="star2half" title="2.5 stars"></label>
                                    <input type="checkbox" name="r3" value="2"><label class="full" for="star2" title="2 stars"></label>
                                    <input type="checkbox" name="r3" value="1.5"><label class="half" for="star1half" title="1.5 stars"></label>
                                    <input type="checkbox" name="r3" value="1"><label class="full" for="star1" title="1 star"></label>
                                    <input type="checkbox" name="r3" value="half"><label class="half" for="starhalf" title="0.5 stars"></label>
                                </div>
		            	</div>
		            	<div class="d-flex game-text mt-sm-2">
		            		<p class="category">Action</p>
		            		<p class="downloads ml-4">100,000+ Downloads</p>
		            	</div>
		            </div>
		        </div>
		    </div> -->
        </div>
    </div>
</section>
<!--#Racing Games-->
<!--Popular Games-->
<section class="my-5">
    <div class="container">
        <div class="main-title mb-4 d-sm-flex justify-content-between align-items-center">
           <?php if(ICL_LANGUAGE_CODE =='en'){ ?>
                <h2>Popular Games</h2>
                <a href="<?php echo get_permalink(133);?>">See More <i class="fa fa-angle-right"></i></a>
           <?php } else if(ICL_LANGUAGE_CODE =='ar'){  ?>
                <h2>الألعاب الشعبية</h2>
                <a href="<?php echo get_permalink(138);?>">شاهد المزيد <i class="fa fa-angle-right"></i></a>
           <?php } else if(ICL_LANGUAGE_CODE =='kr'){  ?>
                <h2>Lîstikên Popular</h2>
                <a href="<?php echo get_permalink(7);?>">
Zêdetir bibînin <i class="fa fa-angle-right"></i></a>
           <?php } ?>


            
        </div>
        <div class="row">
            <?php
              $args = array(
			  'post_type'      => 'games',
			  'posts_per_page' => 5,
			  'post_status'    => 'publish',
			  'order'=> 'ASC',
			  'meta_query'     => array(
			    array(
			      'key'     => 'popular',
			      'value'   => '1',
			      'compare' => '='
			      
			    ) 
			  )
			);
              $popular_query = new WP_Query( $args );
             			 
			if($popular_query->have_posts()) : 
              while($popular_query->have_posts()) : 
              $popular_query->the_post();

              $popularImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
              
            ?>
            <div class="col-md-15 col-sm-6 mb-lg-0 mb-5">
                <div class="game-box h-100">
                    <a href="#">
                        <div class="game-media">
                            <a href="<?php the_permalink();?>">
                                <img src="<?php echo $popularImg[0]; ?>" alt="">
                            </a>
                        </div>
                    </a>
                    <div class="game-box-detail">
                        <div class="game-title">
                            <h4><a href="<?php the_permalink();?>">
                                    <?php the_title(); ?></a></h4>
                            <div class="rating my-1">
                            <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                                <!-- <input type="checkbox" name="r1" value="5"><label class="full" for="star5" title="5 stars"></label>
                                <input type="checkbox" name="r1" value="4.5"><label class="half" for="star4half" title="4.5 stars"></label>
                                <input type="checkbox" name="r1" value="4"><label class="full" for="star4" title="4 stars"></label>
                                <input type="checkbox" name="r1" value="3.5"><label class="half" for="star3half" title="3.5 stars"></label>
                                <input type="checkbox" name="r1" value="3" checked=""><label class="full" for="star3" title="3 stars"></label>
                                <input type="checkbox" name="r1" value="2.5"><label class="half" for="star2half" title="2.5 stars"></label>
                                <input type="checkbox" name="r1" value="2"><label class="full" for="star2" title="2 stars"></label>
                                <input type="checkbox" name="r1" value="1.5"><label class="half" for="star1half" title="1.5 stars"></label>
                                <input type="checkbox" name="r1" value="1"><label class="full" for="star1" title="1 star"></label>
                                <input type="checkbox" name="r1" value="half"><label class="half" for="starhalf" title="0.5 stars"></label> -->
                            </div>
                        </div>
                        <div class="game-text">
                            <p class="downloads">100,000+ <?php  echo __('Downloads', 'game_portal'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
		      endwhile;
		      endif;
		      wp_reset_postdata();
		    ?>
            <!-- <div class="col-md-15 col-sm-6 mb-lg-0 mb-5">
		        <div class="game-box h-100">
		            <a href="#">
		            	<div class="game-media">
		            		<img src="<?php echo get_template_directory_uri(); ?>/images/popular-game2.png" alt="">
		            	</div>
		            </a>
		            <div class="game-box-detail">
		            	<div class="game-title">
		            		<h4><a href="#">Assassin's Creed Identity</a></h4>
		            		<div class="rating my-1">
                                    <input type="checkbox" name="r2" value="5"><label class="full" for="star5" title="5 stars"></label>
                                    <input type="checkbox" name="r2" value="4.5"><label class="half" for="star4half" title="4.5 stars"></label>
                                    <input type="checkbox" name="r2" value="4"><label class="full" for="star4" title="4 stars"></label>
                                    <input type="checkbox" name="r2" value="3.5"><label class="half" for="star3half" title="3.5 stars"></label>
                                    <input type="checkbox" name="r2" value="3" checked=""><label class="full" for="star3" title="3 stars"></label>
                                    <input type="checkbox" name="r2" value="2.5"><label class="half" for="star2half" title="2.5 stars"></label>
                                    <input type="checkbox" name="r2" value="2"><label class="full" for="star2" title="2 stars"></label>
                                    <input type="checkbox" name="r2" value="1.5"><label class="half" for="star1half" title="1.5 stars"></label>
                                    <input type="checkbox" name="r2" value="1"><label class="full" for="star1" title="1 star"></label>
                                    <input type="checkbox" name="r2" value="half"><label class="half" for="starhalf" title="0.5 stars"></label>
                                </div>
		            	</div>
		            	<div class="game-text">
		            		<p class="downloads">100,000+ Downloads</p>
		            	</div>
		            </div>
		        </div>
		    </div>
		    <div class="col-md-15 col-sm-6 mb-lg-0 mb-5">
		        <div class="game-box h-100">
		            <a href="#">
		            	<div class="game-media">
		            		<img src="<?php echo get_template_directory_uri(); ?>/images/popular-game3.png" alt="">
		            	</div>
		            </a>
		            <div class="game-box-detail">
		            	<div class="game-title">
		            		<h4><a href="#">Assassin's Creed Identity</a></h4>
		            		<div class="rating my-1">
                                    <input type="checkbox" name="r3" value="5"><label class="full" for="star5" title="5 stars"></label>
                                    <input type="checkbox" name="r3" value="4.5"><label class="half" for="star4half" title="4.5 stars"></label>
                                    <input type="checkbox" name="r3" value="4"><label class="full" for="star4" title="4 stars"></label>
                                    <input type="checkbox" name="r3" value="3.5"><label class="half" for="star3half" title="3.5 stars"></label>
                                    <input type="checkbox" name="r3" value="3" checked=""><label class="full" for="star3" title="3 stars"></label>
                                    <input type="checkbox" name="r3" value="2.5"><label class="half" for="star2half" title="2.5 stars"></label>
                                    <input type="checkbox" name="r3" value="2"><label class="full" for="star2" title="2 stars"></label>
                                    <input type="checkbox" name="r3" value="1.5"><label class="half" for="star1half" title="1.5 stars"></label>
                                    <input type="checkbox" name="r3" value="1"><label class="full" for="star1" title="1 star"></label>
                                    <input type="checkbox" name="r3" value="half"><label class="half" for="starhalf" title="0.5 stars"></label>
                                </div>
		            	</div>
		            	<div class="game-text">
		            		<p class="downloads">100,000+ Downloads</p>
		            	</div>
		            </div>
		        </div>
		    </div>
		    <div class="col-md-15 col-sm-6 mb-lg-0 mb-5">
		        <div class="game-box h-100">
		            <a href="#">
		            	<div class="game-media">
		            		<img src="<?php echo get_template_directory_uri(); ?>/images/popular-game4.png" alt="">
		            	</div>
		            </a>
		            <div class="game-box-detail">
		            	<div class="game-title">
		            		<h4><a href="#">Assassin's Creed Identity</a></h4>
		            		<div class="rating my-1">
                                    <input type="checkbox" name="r3" value="5"><label class="full" for="star5" title="5 stars"></label>
                                    <input type="checkbox" name="r3" value="4.5"><label class="half" for="star4half" title="4.5 stars"></label>
                                    <input type="checkbox" name="r3" value="4"><label class="full" for="star4" title="4 stars"></label>
                                    <input type="checkbox" name="r3" value="3.5"><label class="half" for="star3half" title="3.5 stars"></label>
                                    <input type="checkbox" name="r3" value="3" checked=""><label class="full" for="star3" title="3 stars"></label>
                                    <input type="checkbox" name="r3" value="2.5"><label class="half" for="star2half" title="2.5 stars"></label>
                                    <input type="checkbox" name="r3" value="2"><label class="full" for="star2" title="2 stars"></label>
                                    <input type="checkbox" name="r3" value="1.5"><label class="half" for="star1half" title="1.5 stars"></label>
                                    <input type="checkbox" name="r3" value="1"><label class="full" for="star1" title="1 star"></label>
                                    <input type="checkbox" name="r3" value="half"><label class="half" for="starhalf" title="0.5 stars"></label>
                                </div>
		            	</div>
		            	<div class="game-text">
		            		<p class="downloads">100,000+ Downloads</p>
		            	</div>
		            </div>
		        </div>
		    </div>
		    <div class="col-md-15 col-sm-6 mb-lg-0 mb-5">
		        <div class="game-box h-100">
		            <a href="#">
		            	<div class="game-media">
		            		<img src="<?php echo get_template_directory_uri(); ?>/images/popular-game5.png" alt="">
		            	</div>
		            </a>
		            <div class="game-box-detail">
		            	<div class="game-title">
		            		<h4><a href="#">Assassin's Creed Identity</a></h4>
		            		<div class="rating my-1">
                                    <input type="checkbox" name="r3" value="5"><label class="full" for="star5" title="5 stars"></label>
                                    <input type="checkbox" name="r3" value="4.5"><label class="half" for="star4half" title="4.5 stars"></label>
                                    <input type="checkbox" name="r3" value="4"><label class="full" for="star4" title="4 stars"></label>
                                    <input type="checkbox" name="r3" value="3.5"><label class="half" for="star3half" title="3.5 stars"></label>
                                    <input type="checkbox" name="r3" value="3" checked=""><label class="full" for="star3" title="3 stars"></label>
                                    <input type="checkbox" name="r3" value="2.5"><label class="half" for="star2half" title="2.5 stars"></label>
                                    <input type="checkbox" name="r3" value="2"><label class="full" for="star2" title="2 stars"></label>
                                    <input type="checkbox" name="r3" value="1.5"><label class="half" for="star1half" title="1.5 stars"></label>
                                    <input type="checkbox" name="r3" value="1"><label class="full" for="star1" title="1 star"></label>
                                    <input type="checkbox" name="r3" value="half"><label class="half" for="starhalf" title="0.5 stars"></label>
                                </div>
		            	</div>
		            	<div class="game-text">
		            		<p class="downloads">100,000+ Downloads</p>
		            	</div>
		            </div>
		        </div>
		    </div> -->
        </div>
    </div>
</section>
<!--#Popular Games-->
<?php get_footer( ); ?>