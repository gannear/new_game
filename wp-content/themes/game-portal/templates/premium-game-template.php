<?php
/**
 * Template Name: Premium Game Page
 *
 */
 ?>
<?php get_header( ); ?>
<!--Games-->
<section class="games-subcat">
    <div class="container">
        <div class="main-title">
        <?php if(ICL_LANGUAGE_CODE =='en'){ ?>
                <h2>Premium</h2>
               
           <?php } else if(ICL_LANGUAGE_CODE =='ar'){  ?>
                <h2>علاوة</h2>
               
           <?php } else if(ICL_LANGUAGE_CODE =='kr'){  ?>
                <h2>Xelat</h2>
                
           <?php } ?>
            
        </div>
        <div class="row">    
        <?php
            $args = array(
			  'post_type'      => 'games',
			  'posts_per_page' => -1,
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
            $tax_post_qry = new WP_Query($args);

            if($tax_post_qry->have_posts()) :
               while($tax_post_qry->have_posts()) : $tax_post_qry->the_post();?>

                    <div class="col-lg-15 col-md-4 col-sm-6 mb-5">
                        <div class="game-box h-100">
                            <div class="game-media">
                                <a href="<?php the_permalink();?>">
                                    <?php the_post_thumbnail( 'full', array( 'class' => 'img-fluid' ));?>
                                </a>
                            </div>
                            <div class="game-box-detail">
                                <div class="game-title">
                                    <h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
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
            <?php
               endwhile;
            endif; 
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
<!--#Games-->

<?php get_footer( ); ?>