<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SKT kraft
 */
?>
<div id="footer-wrapper">
    	<div class="container">
             <div class="cols-3 widget-column-1">            	
               <h5><?php echo get_theme_mod('about_title',__('About Kraft','kraft-lite')); ?></h5>
                <?php echo get_theme_mod('about_description',__('<p>Nam aliquet aliquam ipsum eget volutpat. Duis nec porta purus. Integer adipiscing augue sit amet libero vulputate, et fermentum nibh rutrum. In bibendum nisi sed consequat hendrerit. Aliquam.</p>
<p>Quisque elementum, dolor nec tempus eleifend, nibh mauris aliquet ante, eu tempus sapien nisi non nunc. Nulla facilisi. Suspendisse lobortis laoreet risus, a posuere mauris facilisis at. In viverra euismod velit non cursus. </p>','kraft-lite') ); ?>
               <div class="clear"></div>   
               
              <p class="parastyle"><?php echo get_theme_mod('contact_add',__('100 King St, Melbourne PIC 4000, Australia','kraft-lite')); ?></p>
              <p><?php echo get_theme_mod('contact_no',__('Phone: +123 456 7890','kraft-lite')); ?> 
              <?php _e('Email:','kraft-lite');?> <a href="mailto:<?php echo get_theme_mod('contact_mail','contact@company.com'); ?>"><?php echo get_theme_mod('contact_mail','contact@company.com'); ?></a></p>
              
                
                
                <div class="clear"></div>                
                <div class="social-icons">
					<?php if ( '' !== get_theme_mod('fb_link')) { ?>
                    <a title="facebook" class="fa fa-facebook fa-1x" target="_blank" href="<?php echo esc_url(get_theme_mod('fb_link','#facebook')); ?>"></a> 
                    <?php } ?>
                    
                    <?php if ( '' !== get_theme_mod('twitt_link')) { ?>
                    <a title="twitter" class="fa fa-twitter fa-1x" target="_blank" href="<?php echo esc_url(get_theme_mod('twitt_link','#twitter')); ?>"></a>
                    <?php } ?> 
                    
                    <?php if ( '' !== get_theme_mod('gplus_link')) { ?>
                    <a title="google-plus" class="fa fa-google-plus fa-1x" target="_blank" href="<?php echo esc_url(get_theme_mod('gplus_link','#gplus')); ?>"></a>
                    <?php } ?>
                    
                    <?php if ( '' !== get_theme_mod('linked_link')) { ?> 
                    <a title="linkedin" class="fa fa-linkedin fa-1x" target="_blank" href="<?php echo esc_url(get_theme_mod('linked_link','#linkedin')); ?>"></a>
                    <?php } ?>
                </div>                
              </div>                  
 
             <div class="cols-3 widget-column-2">          
            	<h5><?php _e('Useful Links','kraft-lite');?></h5>
                <div class="menu">
                  <ul>
                   <?php echo get_theme_mod('footer_right', __('<li><a href="#">Home</a></li><li><a href="#">About Us</a></li><li><a href="#">Portfolio</a></li><li><a href="#">Contact Us</a></li>','kraft-lite')); ?>
                  </ul>
                </div>
 
              </div>             
               <div class="cols-3 widget-column-3">
                   <h5><?php _e('Recent Posts','kraft-lite'); ?></h5>
					<?php $args = array( 'posts_per_page' => 2, 'post__not_in' => get_option('sticky_posts'), 'orderby' => 'date', 'order' => 'desc' );
					$postquery = new WP_Query( $args );
					?>
                    <?php while( $postquery->have_posts() ) : $postquery->the_post(); ?>
                        <div class="recent-post">
                         <a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                         <a href="<?php echo esc_url( get_permalink() ); ?>"><h6><?php the_title(); ?></h6></a>
                         <span><?php echo get_the_date(); ?></span>
                         <?php echo kraftlite_content(18); ?>                         
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            <div class="clear"></div>
        </div><!--end .container-->
        
        <div class="copyright-wrapper">
        	<div class="container">
            	<div class="copyright-txt"><?php echo kraftlite_credit(); ?></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
<?php wp_footer(); ?>

</body>
</html>