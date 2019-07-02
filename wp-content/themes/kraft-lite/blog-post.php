<?php
/* Template Name: Blog */
get_header(); ?>

<div class="container"> 
   <div class="page_content"> 
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	          <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php endwhile; else: endif; ?>        
        <section class="site-main">
				<?php 
				if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
				elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
				else { $paged = 1; }
				$query = new WP_Query( array( 'paged' => $paged ) ); ?>
                <?php if( $query->have_posts() ) : ?>
					<?php while( $query->have_posts() ) : $query->the_post(); ?>
	                	<?php get_template_part( 'content', get_post_format() ); ?>
	                <?php endwhile; ?>
					<?php kraftlite_custom_blogpost_pagination( $query ); ?>
                    <?php wp_reset_postdata(); ?>
                <?php else : ?>
	                <?php get_template_part( 'no-results', 'index' ); ?>
                <?php endif; ?>         
        </section>      
        <?php get_sidebar();?>      
   <div class="clear"></div> 
       </div><!-- .page_content -->  
</div><!-- container -->	
<?php get_footer(); ?>