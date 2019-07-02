<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package SKT kraft
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(''); ?>>
<div class="header">
   <div class="signin_wrap">
  <div class="container">  
     <div class="left">
	  <div class="social-icons"><span><?php _e('Follow us:','kraft-lite');?></span> 
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
     <div class="right">
	    <?php if( get_theme_mod('header_info') ) { ?>
           <?php echo get_theme_mod('header_info'); ?>
        <?php } else { ?>
        <?php echo '<i class="fa fa-phone"></i><span class="phno"> +11 123 456 7890 </span>  Mon. &ndash; Fri. 10:00 &ndash; 21:00 '; }?>
      <form action="" class="searchbox" method="get" role="search">		
	<input type="search" onKeyUp="buttonUp();" name="s" value="" placeholder="Search..." class="searchbox-input">
	<input type="submit" value="" class="">
     <span class="searchbox-icon"></span>
</form>
     
     </div>
     <div class="clear"></div>
  
  </div>
 </div><!--end signin_wrap-->
        <div class="header-inner">
                <div class="logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                                <h1><?php bloginfo('name'); ?></h1>
                                <span class="tagline"><?php bloginfo( 'description' ); ?></span>                          
                        </a>
                 </div><!-- logo -->                 
                <div class="toggle">
                <a class="toggleMenu" href="#"><?php _e('Menu','kraft-lite'); ?></a>
                </div><!-- toggle -->
                <div class="nav">                   
                    <?php $walker = new Menu_With_Description; wp_nav_menu( array( 'theme_location' => 'primary', 'walker' => $walker ) ); ?>
                </div><!-- nav --><div class="clear"></div>
                    </div><!-- header-inner -->
</div><!-- header -->

<?php if ( is_front_page() && is_home() ) { ?>
<!-- Slider Section -->
<?php for($sld=1; $sld<4; $sld++) { ?>
<?php if( get_theme_mod('page-setting'.$sld)) { ?>
<?php $slidequery = new WP_query('page_id='.get_theme_mod('page-setting'.$sld,true)); ?>
<?php while( $slidequery->have_posts() ) : $slidequery->the_post();
$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
$img_arr[] = $image;
$id_arr[] = $post->ID;
endwhile;
}
}
?>
<?php if(!empty($id_arr)){ ?>

<section id="home_slider">
                <div class="slider-wrapper theme-default"><div id="slider" class="nivoSlider">
                	<?php  $i=1; foreach($img_arr as $url){ ?><img src="<?php echo $url; ?>" title="#slidecaption<?php echo $i; ?>" /> <?php $i++; }  ?>
                </div>
				<?php 
                $i=1;
                foreach($id_arr as $id){ 
                $title = get_the_title( $id ); 
                $post = get_post($id); 
                $content = apply_filters('the_content', substr(strip_tags($post->post_content), 0, 380)); 
                ?>   
                <div id="slidecaption<?php echo $i; ?>" class="nivo-html-caption">
                <div class="slide_info">
                            <h2><a href="<?php the_permalink(); ?>"><?php echo $title; ?></a></h2>
                            <p><?php echo $content; ?></p>
                            <a class="button" target="_blank" href="<?php the_permalink(); ?>"><?php _e('Read More','kraft-lite'); ?></a>
                    </div>
                    </div> 
                 <?php $i++; } ?>  
                </div>
                <div class="clear"></div> 
        </section>
<?php 
}
else
{
?>
<!-- Slider Section -->        
<section id="home_slider">
  <div class="slider-wrapper theme-default">
    <div class="nivoSlider" id="slider"><img src="<?php echo get_template_directory_uri(); ?>/images/slides/slider1.jpg" alt="" title="#slidecaption1" /><img src="<?php echo get_template_directory_uri(); ?>/images/slides/slider2.jpg" alt="" title="#slidecaption2" /><img src="<?php echo get_template_directory_uri(); ?>/images/slides/slider3.jpg" alt="" title="#slidecaption3" />
    </div>
    <div class="nivo-html-caption" id="slidecaption1">
      <div class="slide_info">
        <h2><a href="#"><?php echo '"Kraft" is <strong>Fully Responsive</strong> on <span>any</span> device and resolutions';?></a></h2>
        <p><?php echo 'Nunc sed lorem pretium, volutpat tortor id, adipiscing sem. Sed bibendum quis augue nec porta. Ut molestie tortor pulvinar, faucibus justo vitae, interdum nunc.  Vestibulum imperdiet nisl vel condimentum faucibus. Vivamus rutrum ipsum vel luctus.';?></p>
        <a href="#" target="_blank" class="button"><?php echo 'Read More';?></a></div>
    </div>
    <div class="nivo-html-caption" id="slidecaption2">
      <div class="slide_info">
        <h2><a href="#"><?php echo '"Kraft" includes <strong>Solid Animated Divs </strong> <span>Unlimited</span> possibilities';?></a></h2>
        <p><?php echo 'Nunc sed lorem pretium, as volutpat tortor id, adipiscing sem. Sed bibendum quis augue nec porta. Ut molestie tortor pulvinar, faucibus justo vitae, interdum nunc. Vestibulum imperdiet nisl vel condimentum faucibus. Vivamus rutrum ipsum vel luctus.';?></p>
        <a href="#" target="_blank" class="button"><?php echo 'Read More';?></a></div>
    </div>
    <div class="nivo-html-caption" id="slidecaption3">
      <div class="slide_info">
        <h2><a href="#"><?php echo '"Kraft" is <strong>Fully Responsive</strong> on <span>any</span> device and resolutions';?></a></h2>
        <p><?php echo 'Nunc sed lorem pretium, volutpat tortor id, adipiscing sem. Sed bibendum quis augue nec porta. Ut molestie tortor pulvinar, faucibus justo vitae, interdum nunc. Vestibulum imperdiet nisl vel condimentum faucibus. Vivamus rutrum ipsum vel luctus.';?></p>
        <a href="#link3" target="_blank" class="button"><?php echo 'Read More';?></a></div>
    </div>
  </div>
  <div class="clear"></div>
</section>
<?php } ?>

<section id="wrapone">
            	<div class="container">
                    <div class="wrap_one">
                    <?php if( get_theme_mod('first_section') ) { ?>
                           <?php echo get_theme_mod('first_section'); ?>
                      <?php } else { ?>                      
                      <?php echo '<p><i class="fa fa-pencil"></i><br />
<h2>Hey people! We are SKT and let us introduce our new Theme - "Kraft"</h2>
<p> Nunc sed lorem pretium, volutpat tortor id, adipiscing sem. Sed bibendum quis augue nec porta. Ut molestie tortor pulvinar, faucibus justo vitae</p>'; } ?>
        	
             </div><!-- wrap_one-->
              <div class="clear"></div>
            </div><!-- container -->
       </section><div class="clear"></div>

        <section id="wrapsecond">
            	<div class="container">
                    <div class="services-wrap">
                      <?php if( get_theme_mod('column_one') ) { ?>
                           <?php echo get_theme_mod('column_one'); ?>
                      <?php } else { ?>                      
                      <?php echo '<div class="one_third "><a href="#"><i class="fa fa-desktop"></i></p>
<h4>Cool Animated Columns <span>Animated Columns</span></h4>
<p></a>Lorem ipsum dolor sit amet, consectetur adipiscinr sed gravida tortor, sed ullamcorper tellus. Cras id magna tempor, porta nunc quis.<a class="rdmore" href="#">Read More ></a></div>'; } ?>

<?php if( get_theme_mod('column_two') ) { ?>
                           <?php echo get_theme_mod('column_two'); ?>
                      <?php } else { ?>                      
                      <?php echo '<div class="one_third "><a href="#"><i class="fa fa-gears"></i></p>
<h4>Rich Customization Abilities <span>Color Change</span></h4>
<p></a> Lorem ipsum dolor sit amet, consectetur adipiscinr sed gravida tortor, sed ullamcorper tellus. Cras id magna tempor, porta nunc quis.<a class="rdmore" href="#">Read More ></a></div>'; } ?>


<?php if( get_theme_mod('column_three') ) { ?>
                           <?php echo get_theme_mod('column_three'); ?>
                      <?php } else { ?>                      
                      <?php echo '<div class="one_third  last_column"><a href="#"><i class="fa fa-cloud-download"></i></p>
<h4>Gallery Plugin Compatibility <span>Nextgen Gallery</span></h4>
<p></a> Lorem ipsum dolor sit amet, consectetur adipiscinr sed gravida tortor, sed ullamcorper tellus. Cras id magna tempor, porta nunc quis.<a class="rdmore" href="#">Read More ></a></div> '; } ?>
                      
               </div><!-- services-wrap-->
              <div class="clear"></div>
            </div><!-- container -->
       </section><div class="space40"></div> 
<?php
}
elseif ( is_front_page() ) { 
?>

<!-- Slider Section -->
<?php for($sld=1; $sld<4; $sld++) { ?>
<?php if( get_theme_mod('page-setting'.$sld)) { ?>
<?php $slidequery = new WP_query('page_id='.get_theme_mod('page-setting'.$sld,true)); ?>
<?php while( $slidequery->have_posts() ) : $slidequery->the_post();
$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
$img_arr[] = $image;
$id_arr[] = $post->ID;
endwhile;
}
}
?>
<?php if(!empty($id_arr)){ ?>

<section id="home_slider">
                <div class="slider-wrapper theme-default"><div id="slider" class="nivoSlider">
                	<?php  $i=1; foreach($img_arr as $url){ ?><img src="<?php echo $url; ?>" title="#slidecaption<?php echo $i; ?>" /> <?php $i++; }  ?>
                </div>
				<?php 
                $i=1;
                foreach($id_arr as $id){ 
                $title = get_the_title( $id ); 
                $post = get_post($id); 
                $content = apply_filters('the_content', substr(strip_tags($post->post_content), 0, 380)); 
                ?>   
                <div id="slidecaption<?php echo $i; ?>" class="nivo-html-caption">
                <div class="slide_info">
                            <h2><a href="<?php the_permalink(); ?>"><?php echo $title; ?></a></h2>
                            <p><?php echo $content; ?></p>
                            <a class="button" target="_blank" href="<?php the_permalink(); ?>"><?php _e('Read More','kraft-lite'); ?></a>
                    </div>
                    </div> 
                 <?php $i++; } ?>  
                </div>
                <div class="clear"></div> 
        </section>
<?php 
}
else
{
?>
<!-- Slider Section -->        
<section id="home_slider">
  <div class="slider-wrapper theme-default">
    <div class="nivoSlider" id="slider"><img src="<?php echo get_template_directory_uri(); ?>/images/slides/slider1.jpg" alt="" title="#slidecaption1" /><img src="<?php echo get_template_directory_uri(); ?>/images/slides/slider2.jpg" alt="" title="#slidecaption2" /><img src="<?php echo get_template_directory_uri(); ?>/images/slides/slider3.jpg" alt="" title="#slidecaption3" />
    </div>
    <div class="nivo-html-caption" id="slidecaption1">
      <div class="slide_info">
        <h2><a href="#"><?php echo '"Kraft" is <strong>Fully Responsive</strong> on <span>any</span> device and resolutions';?></a></h2>
        <p><?php echo 'Nunc sed lorem pretium, volutpat tortor id, adipiscing sem. Sed bibendum quis augue nec porta. Ut molestie tortor pulvinar, faucibus justo vitae, interdum nunc.  Vestibulum imperdiet nisl vel condimentum faucibus. Vivamus rutrum ipsum vel luctus.';?></p>
        <a href="#" target="_blank" class="button"><?php echo 'Read More';?></a></div>
    </div>
    <div class="nivo-html-caption" id="slidecaption2">
      <div class="slide_info">
        <h2><a href="#"><?php echo '"Kraft" includes <strong>Solid Animated Divs </strong> <span>Unlimited</span> possibilities';?></a></h2>
        <p><?php echo 'Nunc sed lorem pretium, as volutpat tortor id, adipiscing sem. Sed bibendum quis augue nec porta. Ut molestie tortor pulvinar, faucibus justo vitae, interdum nunc. Vestibulum imperdiet nisl vel condimentum faucibus. Vivamus rutrum ipsum vel luctus.';?></p>
        <a href="#" target="_blank" class="button"><?php echo 'Read More';?></a></div>
    </div>
    <div class="nivo-html-caption" id="slidecaption3">
      <div class="slide_info">
        <h2><a href="#"><?php echo '"Kraft" is <strong>Fully Responsive</strong> on <span>any</span> device and resolutions';?></a></h2>
        <p><?php echo 'Nunc sed lorem pretium, volutpat tortor id, adipiscing sem. Sed bibendum quis augue nec porta. Ut molestie tortor pulvinar, faucibus justo vitae, interdum nunc. Vestibulum imperdiet nisl vel condimentum faucibus. Vivamus rutrum ipsum vel luctus.';?></p>
        <a href="#link3" target="_blank" class="button"><?php echo 'Read More';?></a></div>
    </div>
  </div>
  <div class="clear"></div>
</section>
<?php } ?>

<section id="wrapone">
            	<div class="container">
                    <div class="wrap_one">
                    <?php if( get_theme_mod('first_section') ) { ?>
                           <?php echo get_theme_mod('first_section'); ?>
                      <?php } else { ?>                      
                      <?php echo '<p><i class="fa fa-pencil"></i><br />
<h2>Hey people! We are SKT and let us introduce our new Theme - "Kraft"</h2>
<p> Nunc sed lorem pretium, volutpat tortor id, adipiscing sem. Sed bibendum quis augue nec porta. Ut molestie tortor pulvinar, faucibus justo vitae</p>'; } ?>
        	
             </div><!-- wrap_one-->
              <div class="clear"></div>
            </div><!-- container -->
       </section><div class="clear"></div>

        <section id="wrapsecond">
            	<div class="container">
                    <div class="services-wrap">
                      <?php if( get_theme_mod('column_one') ) { ?>
                           <?php echo get_theme_mod('column_one'); ?>
                      <?php } else { ?>                      
                      <?php echo '<div class="one_third "><a href="#"><i class="fa fa-desktop"></i></p>
<h4>Cool Animated Columns <span>Animated Columns</span></h4>
<p></a>Lorem ipsum dolor sit amet, consectetur adipiscinr sed gravida tortor, sed ullamcorper tellus. Cras id magna tempor, porta nunc quis.<a class="rdmore" href="#">Read More ></a></div>'; } ?>

<?php if( get_theme_mod('column_two') ) { ?>
                           <?php echo get_theme_mod('column_two'); ?>
                      <?php } else { ?>                      
                      <?php echo '<div class="one_third "><a href="#"><i class="fa fa-gears"></i></p>
<h4>Rich Customization Abilities <span>Color Change</span></h4>
<p></a> Lorem ipsum dolor sit amet, consectetur adipiscinr sed gravida tortor, sed ullamcorper tellus. Cras id magna tempor, porta nunc quis.<a class="rdmore" href="#">Read More ></a></div>'; } ?>


<?php if( get_theme_mod('column_three') ) { ?>
                           <?php echo get_theme_mod('column_three'); ?>
                      <?php } else { ?>                      
                      <?php echo '<div class="one_third  last_column"><a href="#"><i class="fa fa-cloud-download"></i></p>
<h4>Gallery Plugin Compatibility <span>Nextgen Gallery</span></h4>
<p></a> Lorem ipsum dolor sit amet, consectetur adipiscinr sed gravida tortor, sed ullamcorper tellus. Cras id magna tempor, porta nunc quis.<a class="rdmore" href="#">Read More ></a></div> '; } ?>
                      
               </div><!-- services-wrap-->
              <div class="clear"></div>
            </div><!-- container -->
       </section><div class="clear"></div>        
<?php
}
elseif ( is_home() ) {
?>
<section id="home_slider" style="display:none;"></section>
<?php
}
?>		