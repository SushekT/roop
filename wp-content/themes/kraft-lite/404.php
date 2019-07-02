<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package SKT kraft
 */

get_header(); ?>

<div class="container">
    <div class="page_content">
        <section class="site-main" id="sitemain">
                <h1 class="entry-title"><?php _e( '404 Not Found', 'kraft-lite' ); ?></h1>
            <div class="page-content">
                <p class="text-404"><?php _e( 'Looks like you have taken a wrong turn..... Don\'t worry... it happens to the best of us. Maybe try a search?', 'kraft-lite' ); ?></p>
               <div class="clear"></div>
               <div><?php get_search_form(); ?></div>
               <div class="space20 clear"></div>
               <div><h2><strong><?php _e('Recent Posts','kraft-lite');?></strong></h2><?php wp_get_archives( array( 'type' => 'postbypost', 'limit' => 10, 'format' => 'custom', 'before' => '', 'after' => '<br />' ) ); ?></div>
            </div><!-- .page-content -->
        </section>
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>