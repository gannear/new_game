<?php
    get_header();

    $cat_slug = get_queried_object()->slug;
    $cat_name = get_queried_object()->name;
?>
<!--Games-->
<section class="games-subcat">
    <div class="container">
        <div class="main-title">
            <h2><?php echo $cat_name; ?></h2>
        </div>
        <div class="row">    
        <?php
            $tax_post_args = array(
                'post_type' => 'games', 
                'posts_per_page' => -1,
                'order' => 'ASC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'gamecategory',
                        'field' => 'slug',
                        'terms' => $cat_slug
                    )
                )
            );
            $tax_post_qry = new WP_Query($tax_post_args);

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
               endwhile; else: ?>
               <div class="col-lg-15 col-md-4 col-sm-6 mb-5">
                 <p>No Data Found..</p>
               </div>
            <?php
            endif; 
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
<!--#Games-->
<? get_footer(); ?>