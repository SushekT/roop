<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package SKT kraft
 */
?>
<header>
<h1 class="entry-title"><?php _e( 'Nothing Found', 'kraft-lite' ); ?></h1>
</header>
<div class="blog-post">
<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'kraft-lite' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
<?php elseif ( is_search() ) : ?>
<p><?php _e( 'Sorry, nothing found result for ', 'kraft-lite' ); echo '<strong>'.get_search_query().'</strong>'; ?></p>
<p><?php _e( 'Please try again with some different keywords.', 'kraft-lite' ); ?></p>
<?php get_search_form(); ?>
<?php else : ?>
<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'kraft-lite' ); ?></p>
<?php get_search_form(); ?>
<?php endif; ?>