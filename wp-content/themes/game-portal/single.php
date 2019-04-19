<?php get_header(); ?>
 
    <div id="content">
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
         
        <article>
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="entry">   
                <?php the_post_thumbnail(); ?>
                <?php the_content(); ?>
 
                <div class="postmetadata">
                <p><?php _e('Written by:'); ?> <?php  the_author(); ?> <?php _e('On:'); ?> <?php the_date() ?> </p>
                <p><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php edit_post_link('Edit', ' &#124; ', ''); ?></p>
                </div>
 
            </div>
 
            <div class="comments-template">
                <?php comments_template(); ?>
            </div>
    </article>
 
<?php endwhile; ?>
     
    <div class="navigation">  
        <?php previous_post_link('< %link') ?> <?php next_post_link(' %link >') ?>
    </div>
 
<?php endif; ?>
</div>
 
<?php get_sidebar(); ?>   
<?php get_footer(); ?>